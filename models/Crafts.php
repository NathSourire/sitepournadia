<?php
require_once __DIR__ . '/../helpers/database.php';

class Craft
{

    private int $id_crafts;
    private string $astuce;
    private string $name_craft;

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
    
    public function get_name_craft(): string
    {
        return $this->name_craft;
    }
    public function set_name_craft(string $name_craft)
    {
        $this->name_craft = $name_craft;
    }

    public function insert()
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `crafts` ( `name_craft`, `astuce` )  
        VALUES ( :name_craft, :astuce ) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name_craft', $this->get_name_craft(), PDO::PARAM_STR);
        $sth->bindValue(':astuce', $this->get_astuce(), PDO::PARAM_STR);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function get_all(): array
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `crafts`;';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }

    public function update(): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `crafts` 
        SET `name_craft` = :name_craft , `astuce` = :astuce , `id_crafts` = :id_crafts   
        WHERE `id_crafts` = :id_crafts ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name_craft', $this->get_name_craft(), PDO::PARAM_STR);
        $sth->bindValue(':astuce', $this->get_astuce(), PDO::PARAM_STR);
        $sth->bindValue(':id_crafts', $this->get_id_crafts(), PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

    public static function delete(int $id_crafts): bool
    {
        $pdo = Database::connect();
        $sql = 'DELETE FROM `crafts` WHERE `id_crafts` = :id_crafts ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_crafts', $id_crafts, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

}
