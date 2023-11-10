<?php
require_once __DIR__ . '/../helpers/database.php';

class Galleries
{

    private int $id_galleries;
    private string $image;
    private ?DateTime $archived_at;
    private int $id_product;
    private string $name_img;

    public function get_id_galleries(): int
    {
        return $this->id_galleries;
    }
    public function set_id_galleries(int $id_galleries)
    {
        $this->id_galleries = $id_galleries;
    }

    public function get_image(): string
    {
        return $this->image;
    }
    public function set_image(string $image)
    {
        $this->image = $image;
    }

    public function get_archived_at(): DateTime
    {
        return $this->archived_at;
    }
    public function set_archived_at(string $archived_at)
    {
        $this->archived_at = new DateTime($archived_at);
    }

    public function get_id_product(): int
    {
        return $this->id_product;
    }
    public function set_id_product(int $id_product)
    {
        $this->id_product = $id_product;
    }

    public function get_name_img(): string
    {
        return $this->name_img;
    }
    public function set_name_img(string $name_img)
    {
        $this->name_img = $name_img;
    }

    // fonction qui permet de recuperer une catégorie précise
    public static function get(int $id_galleries): object|bool
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `nadia`.`galleries` 
        WHERE `id_galleries` = :id_galleries;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_galleries', $id_galleries, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }

    public function insert()
    {
        $pdo = connect();
        $sql = 'INSERT INTO `galleries` ( `name_img`, `image` )  VALUES ( :name_img, :image ) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name_img', $this->get_name_img(), PDO::PARAM_STR);
        $sth->bindValue(':image', $this->get_image(), PDO::PARAM_STR);
        $result = $sth->execute();
        return $result;
    }

    public static function get_all(): array
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `nadia`.`galleries`
        WHERE `galleries`.`archived_at` IS NULL
        ORDER BY `name_img` ASC, `image` ASC;';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }

    public static function get_all_archived(): array
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `nadia`.`galleries`
        ORDER BY `name_img` ASC , `image` ASC;';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }

    //fonction pour archiver une image et lui attribué une date
    public static function archived(int $id_galleries): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `galleries` SET `archived_at`= NOW() WHERE `id_galleries` = :id_galleries ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_galleries', $id_galleries, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //fonction pour retirer de l'archive une image et lui attribué une date
    public static function restored(int $id_galleries): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `galleries` SET `archived_at`= NULL WHERE `id_galleries` = :id_galleries ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_galleries', $id_galleries, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

    //fonction pour modifier
    public function update(): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `galleries` SET `name_img` = :name_img, `image` = :image, `archived_at` = :archived_at,
            `id_galleries` = :id_galleries, `picture` = :picture  
            WHERE `id_galleries` = :id_galleries ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name_img', $this->get_name_img(), PDO::PARAM_STR);
        $sth->bindValue(':image', $this->get_image(), PDO::PARAM_STR);
        $sth->bindValue(':id_galleries', $this->get_id_galleries(), PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }
}
