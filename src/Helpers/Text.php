<?php

namespace App\Helpers;

class Text
{
    // verifier la longueur de chaine de caracter  là j'ai mis 60
    public static function excerpt(string $content, int $limit = 60)
    {
        // si ma chaine de caracter :  contenu  est inferieur ou =
        if (mb_strlen($content) <= $limit) {
            return $content;
        }
        $lastSpace = mb_strpos($content, ' ', $limit); // commencera à partir du caracter 60 et cherchera la coupure
        //  pour eviter que le mot  soit coupé n'importe ou : on usite strpos
        return \substr($content, 0, $limit)  . '...';
    }
}
