<?php
require_once __DIR__ . '/../helpers/database.php';

class Product
{

    private int $id_product;
    private string $name_product;
    private int $price;
    private string $description;

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
}
