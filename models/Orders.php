<?php
require_once __DIR__ . '/../helpers/database.php';

class Orders
{

    private int $quantity;


    public function get_quantity(): int
    {
        return $this->quantity;
    }
    public function set_quantity(int $quantity)
    {
        $this->quantity = $quantity;
    }
}
