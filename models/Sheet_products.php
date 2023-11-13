<?php
require_once __DIR__ . '/../helpers/database.php';

class Sheet_products
{

    private int $id_sheet_product;
    private string $variety;

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


    


}
