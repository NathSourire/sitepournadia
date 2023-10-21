<?php
require_once __DIR__ . '/../helpers/database.php';

class Craft
{

    private int $id_crafts;
    private string $astuce;

    public function get_id_crafts(): int
    {
        return $this->id_crafts;
    }
    public function set_id_crafts(int $id_crafts)
    {
        $this->id_crafts = $id_crafts;
    }

    
    public function get_astuce(): string
    {
        return $this->astuce;
    }
    public function set_astuce(string $astuce)
    {
        $this->astuce = $astuce;
    }
    
}
