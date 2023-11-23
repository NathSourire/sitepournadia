<?php
require_once __DIR__ . '/../helpers/database.php';

class Galleries
{

    private int $id_galleries;
    private string $image;
    private int $id_product;
    private string $name_img;
    private ?DateTime $archived_at;

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

    public function get_archived_at(): DateTime
    {
        return $this->archived_at;
    }
    public function set_archived_at(string $archived_at)
    {
        $this->archived_at = new DateTime($archived_at);
    }

    // fonction qui permet de recuperer une catégorie précise
    public static function get(int $id_galleries): object|bool
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `galleries` 
        WHERE `id_galleries` = :id_galleries;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_galleries', $id_galleries, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }

    public function insert()
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `galleries` ( `name_img`, `image`, `id_product` )  VALUES ( :name_img, :image, :id_product ) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name_img', $this->get_name_img(), PDO::PARAM_STR);
        $sth->bindValue(':image', $this->get_image(), PDO::PARAM_STR);
        $sth->bindValue(':id_product', $this->get_id_product(), PDO::PARAM_INT);
        $result = $sth->execute();
        return $result;
    }

    public static function get_all(): array
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `galleries`
        JOIN `product` ON `product`.`id_product` = `galleries`.`id_product`
        WHERE `galleries`.`archived_at` IS NULL
        ORDER BY `name_img` ASC, `image` ASC;';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }

    public static function get_all_archived(): array
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `galleries`
        ORDER BY `name_img` ASC , `image` ASC;';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }

    //fonction pour archiver une image et lui attribué une date
    public static function archived(int $id_galleries): bool
    {
        $pdo = Database::connect();
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
        $pdo = Database::connect();
        $sql = 'UPDATE `galleries` SET `archived_at`= NULL WHERE `id_galleries` = :id_galleries ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_galleries', $id_galleries, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

    //fonction pour modifier
    public function update(): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `galleries` SET `name_img` = :name_img, `image` = :image, `id_galleries` = :id_galleries
            WHERE `id_galleries` = :id_galleries ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name_img', $this->get_name_img(), PDO::PARAM_STR);
        $sth->bindValue(':image', $this->get_image(), PDO::PARAM_STR);
        $sth->bindValue(':id_galleries', $this->get_id_galleries(), PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

    public static function count(int $id_galleries = NULL, string $search = ''): int
    {
        $pdo = Database::connect();
        $sql = "SELECT count(*) as `count` from `product`
            JOIN `product` ON `product`.`id_product` = `galleries`.`id_product`
            WHERE 1 = 1";
        $sql .= " AND (
                    `galleries`.`name_img` LIKE :search OR
                    `product`.`name_product` LIKE :search OR
                    )";
        if (!is_null($id_galleries)) {
            $sql .= " AND `product`.`id_product` = :id_product";
        }
        $sql .= ";";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        if (!is_null($id_galleries)) {
            $sth->bindValue(':id_galleries', $id_galleries, PDO::PARAM_INT);
        }
        $sth->execute();
        $result = $sth->fetchColumn();
        return $result;
    }

    // fonction pour supprimer les fiches produit
    // public static function delete(int $id_galleries): bool
    // {
    //     $pdo = Database::connect();
    //     $sql = 'DELETE FROM `galleries` 
    //     JOIN `product` ON `product`.`id_product` = `galleries`.`id_product`
    //     WHERE `galleries`.`id_galleries` = :id_galleries ;';
    //     $sth = $pdo->prepare($sql);
    //     $sth->bindValue(':id_galleries', $id_galleries, PDO::PARAM_INT);
    //     $sth->execute();
    //     return (bool) $sth->rowCount();
    // }

    public static function delete(int $id_galleries): bool
    {
        $pdo = Database::connect();

        // Étape 1 : Sélection des identifiants des fiches produit liées à la galerie
        $sql = 'SELECT `galleries`.`id_product`
        FROM `galleries`
        JOIN `product` ON `product`.`id_product` = `galleries`.`id_product`
        WHERE `galleries`.`id_galleries` = :id_galleries';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_galleries', $id_galleries, PDO::PARAM_INT);
        $sth->execute();
        // Récupération des identifiants des fiches produit
        $id_product = $sth->fetchAll(PDO::FETCH_COLUMN);
        // Étape 2 : Suppression des fiches produit liées à la galerie
        if (!empty($id_product)) {
            // Suppression des fiches produit en utilisant IN pour spécifier les identifiants
            $sqlDelete = 'DELETE FROM `product` WHERE `id_product` IN (' . implode(',', $id_product) . ')';
            $sthDelete = $pdo->prepare($sqlDelete);
            $sthDelete->execute();

            // Suppression de la fiche de galerie une fois que les fiches produit liées ont été supprimées
            $sqlGalleryDelete = 'DELETE FROM `galleries` WHERE `id_galleries` = :id_galleries';
            $sthGalleryDelete = $pdo->prepare($sqlGalleryDelete);
            $sthGalleryDelete->bindValue(':id_galleries', $id_galleries, PDO::PARAM_INT);
            $sthGalleryDelete->execute();

            return true;
        }

        return false;
    }
}
