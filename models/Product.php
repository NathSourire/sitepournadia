<?php
require_once __DIR__ . '/../helpers/database.php';

class Product
{

    private int $id_product;
    private string $name_product;
    private string $price;
    private string $description;
    private ?DateTime $archived_product_at;

    public function get_id_product(): int
    {
        return $this->id_product;
    }
    public function set_id_product(int $id_product)
    {
        $this->id_product = $id_product;
    }

    public function get_name_product(): string
    {
        return $this->name_product;
    }
    public function set_name_product(string $name_product)
    {
        $this->name_product = $name_product;
    }

    public function get_price(): string
    {
        return $this->price;
    }
    public function set_price(string $price)
    {
        $this->price = $price;
    }

    public function get_description(): string
    {
        return $this->description;
    }
    public function set_description(string $description)
    {
        $this->description = $description;
    }

    public function get_archived_at(): DateTime
    {
        return $this->archived_product_at;
    }
    public function set_archived_at(string $archived_product_at)
    {
        $this->archived_product_at = new DateTime($archived_product_at);
    }

    // fonction qui permet de recuperer une catégorie précise
    public static function get(int $id_product): object|bool
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `product` 
            WHERE `product`.`id_product` = :id_product;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_product', $id_product, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }

    // fonction pour l'incertion
    public function insert()
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `product` (`name_product`, `price`, `description`) VALUES (:name_product, :price, :description);';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name_product', $this->get_name_product(), PDO::PARAM_STR);
        $sth->bindValue(':price', $this->get_price(), PDO::PARAM_STR);
        $sth->bindValue(':description', $this->get_description(), PDO::PARAM_STR);
        $result = $sth->execute();
        return $result;
    }
    // fonction pour tout afficher
    public static function get_all(): array
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `product`
            ORDER BY `name_product` ASC;';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }

    //fonction pour modifier
    public function update(): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `product` SET `name_product` = :name_product, `price` = :price, `description`= :description 
        WHERE `id_product` = :id_product;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name_product', $this->get_name_product(), PDO::PARAM_STR);
        $sth->bindValue(':price', $this->get_price(), PDO::PARAM_STR);
        $sth->bindValue(':description', $this->get_description(), PDO::PARAM_STR);
        $sth->bindValue(':id_product', $this->get_id_product(), PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }
    //fonction pour archiver une image et lui attribué une date
    public static function archived(int $id_product): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `product` SET `archived_product_at`= NOW() WHERE `id_product` = :id_product ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_product', $id_product, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //fonction pour retirer de l'archive une image et lui attribué une date
    public static function restored(int $id_product): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `product` SET `archived_product_at`= NULL WHERE `id_product` = :id_product ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_product', $id_product, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

    // fonction pour supprimer les fiches produit
    public static function delete(int $id_product): bool
    {
        $pdo = Database::connect();
        $sql = 'DELETE FROM `product` WHERE `id_product` = :id_product ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_product', $id_product, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }
}
