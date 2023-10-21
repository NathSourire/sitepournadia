<?php
require_once __DIR__ . '/../helpers/database.php';

class Orders1
{

    private int $id_to_orders;
    private DateTime $date_hours;
    private DateTime $archived_at;
    private DateTime $deleted_at;
    private DateTime $add_at;


    public function get_id_to_orders(): int
    {
        return $this->id_to_orders;
    }
    public function set_id_to_orders(int $id_to_orders)
    {
        $this->id_to_orders = $id_to_orders;
    }

    public function get_date_hours(): DateTime
    {
        return $this->date_hours;
    }
    public function set_date_hours(DateTime $date_hours)
    {
        $this->date_hours = $date_hours;
    }

    public function get_archived_at(): DateTime
    {
        return $this->archived_at;
    }
    public function set_archived_at(DateTime $archived_at)
    {
        $this->archived_at = $archived_at;
    }

    public function get_deleted_at(): DateTime
    {
        return $this->deleted_at;
    }
    public function set_deleted_at(DateTime $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function get_add_at(): DateTime
    {
        return $this->add_at;
    }
    public function set_add_at(DateTime $add_at)
    {
        $this->add_at = $add_at;
    }
}
