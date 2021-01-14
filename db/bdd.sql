CREATE TABLE post (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    chapo TEXT(65000) NOT NULL,
    content TEXT(65000) NOT NULL,
    image VARCHAR(27)  NULL,
    author VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE comment (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    author VARCHAR(255) NOT NULL,
    content TEXT(65000) NOT NULL,
    created_at DATETIME NOT NULL,
    post_id INT UNSIGNED NOT NULL,
    is_valid TINY INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_post_comment
        FOREIGN KEY (post_id)
        REFERENCES post (id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
)ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE user (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

CREATE TABLE user_member (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username_member VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=UTF8MB4;

