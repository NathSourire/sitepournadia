<?php
require_once __DIR__ . '/../helpers/database.php';

class Product
{

    private int $id_product;
    private string $name_product;
    private int $price;
    private string $description;
    private int $id_galleries;

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

    public function get_price(): int
    {
        return $this->price;
    }
    public function set_price(int $price)
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
    public function get_id_galleries(): int
    {
        return $this->id_galleries;
    }
    public function set_id_galleries(int $id_galleries)
    {
        $this->id_galleries = $id_galleries;
    }

    // fonction qui permet de recuperer une catégorie précise
    public static function get(int $id_product): object|bool
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `nadia`.`product` 
            INNER JOIN `galleries` ON `galleries`.`id_galleries` = `product`.`id_galleries`
            WHERE `id_product` = :id_product;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_product', $id_product, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }

    public function insert()
    {
        $pdo = connect();
        $sql = 'INSERT INTO `product` ( `name_product`, `price`, `description` )  VALUES ( :name_product, :price, :description) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name_product', $this->get_name_product(), PDO::PARAM_STR);
        $sth->bindValue(':price', $this->get_price(), PDO::PARAM_STR);
        $sth->bindValue(':description', $this->get_description(), PDO::PARAM_STR);
        $result = $sth->execute();
        return $result;
    }

    public static function get_all(): array
    {
        $pdo = connect();
        $sql = 'SELECT * FROM `nadia`.`product`
            INNER JOIN `galleries` ON `galleries`.`id_galleries` = `product`.`id_galleries`
            ORDER BY `name_product` ASC;';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }


    //fonction pour modifier
    public function update(): bool
    {
        $pdo = connect();
        $sql = 'UPDATE `product` SET `name_product` = :name_product, `price` = :price, `description`= :description, `id_product` = :id_product ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name_product', $this->get_name_product(), PDO::PARAM_STR);
        $sth->bindValue(':price', $this->get_price(), PDO::PARAM_STR);
        $sth->bindValue(':description', $this->get_description(), PDO::PARAM_STR);
        $sth->bindValue(':id_product', $this->get_id_product(), PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }
}
