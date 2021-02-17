<?php

namespace App\Model;

use  App\Model\Exception\NotFoundException;
use \PDO;

abstract class Manager
{
    protected $pdo;
    protected $manager = null;
    protected $class = null;


    public function __construct(PDO $pdo)
    {
        if ($this->manager === null) {
            throw new \Exception("La class " . get_class($this) . "n'a pas de propriété \$manager");
        }
        if ($this->class === null) {
            throw new \Exception("La class " . get_class($this) . "n'a pas de propriété \$manager");
        }
        $this->pdo = $pdo;
    }

    public function find(int $id)
    {
        $query = $this->pdo->prepare('SELECT * FROM ' . $this->manager . ' WHERE id = :id');
        $query->execute(['id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result = $query->fetch();

        if ($result === false) {
            throw new NotFoundException($this->manager, $id);
        }
        return $result;
    }

    /** verifie valeur si existe bdd
     * @params string $field champs à chercher
     */

    public function exists(string $field, $value, ?int $except = null): bool
    {
        $sql = "SELECT COUNT(id) FROM {$this->manager} WHERE $field = ?";
        $params = [$value];
        if ($except !== null) {
            $sql .= "AND id != ?";
            $params[] = $except;
        }
        $query = $this->pdo->prepare($sql);
        $query->execute($params);
        return (int)$query->fetch(PDO::FETCH_NUM)[0]  > 0;
    }

    public function all(): array
    {
        $sql = "SELECT * FROM {$this->manager}";
        return $this->pdo->query($sql, PDO::FETCH_CLASS, $this->class)->fetchAll();
    }

    public function delete(int $id)
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->manager} WHERE id = ?");
        $ok = $query->execute([$id]);
        if ($ok === false) {
            throw new \Exception("Impossible de supprimer l'enregistrement $id dans le dossier model {$this->manager}");
        }
    }

    public function create(array $data): int
    {
        $sqlFields = [];
        foreach ($data as $key => $value) {
            $sqlFields[] = "$key = :$key";
        }
        $query = $this->pdo->prepare("INSERT INTO {$this->manager} SET " . implode(', ', $sqlFields));
        $ok = $query->execute($data);

        if ($ok === false) {
            throw new \Exception("Impossible de CREER l'enregistrement  dans le dossier model {$this->manager}");
        }
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $data, int $id)
    {
        $sqlFields = [];
        foreach ($data as $key => $value) {
            $sqlFields[] = "$key = :$key";
        }
        $query = $this->pdo->prepare("UPDATE {$this->manager} SET " . implode(', ', $sqlFields) . " WHERE id = :id");
        $ok = $query->execute(array_merge($data, ['id' => $id]));
        if ($ok === false) {
            throw new \Exception("Impossible de modifier l'enregistrement  dans le dossier model {$this->manager}");
        }
    }

    public function queryAndFetchAll(string $sql): array
    {
        return $this->pdo->query($sql, PDO::FETCH_CLASS, $this->class)->fetchAll();
    }
}