<?php
require_once __DIR__ . '/../helpers/database.php';

class Galleries
{

    private int $id_galleries;
    private string $image;
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
    ORDER BY `image`, `name_img` ASC;';
    $sth = $pdo->query($sql);
    $result = $sth->fetchAll();
    return $result;

}
}
