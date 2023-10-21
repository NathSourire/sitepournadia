<?php
require_once __DIR__ . '/../helpers/database.php';

class Galleries
{

    private int $id_galleries;
    private string $image;

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
}
