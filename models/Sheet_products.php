<?php
require_once __DIR__ . '/../helpers/database.php';

class Sheet_products
{

    private int $id_sheet_product;
    private string $variety;
    private int $id_user;

    public function get_id_sheet_product(): int
    {
        return $this->id_sheet_product;
    }
    public function set_id_sheet_product(int $id_sheet_product)
    {
        $this->id_sheet_product = $id_sheet_product;
    }


    public function get_variety(): string
    {
        return $this->variety;
    }
    public function set_variety(string $variety)
    {
        $this->variety = $variety;
    }

    public function get_id_user(): int
    {
        return $this->id_user;
    }
    public function set_id_user(int $id_user)
    {
        $this->id_user = $id_user;
    }


}
