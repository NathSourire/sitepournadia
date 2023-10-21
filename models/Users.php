<?php
require_once __DIR__ . '/../helpers/database.php';

class Users
{

    private int $id_user;
    private string $lastname;
    private string $firstname;
    private DateTime $date_of_birthday;
    private int $zipcode;
    private string $city;
    private int $phone;
    private string $email;
    private string $password;
    private string $message;
    private int $role_management;

    public function get_id_user(): int
    {
        return $this->id_user;
    }
    public function set_id_user(int $id_user)
    {
        $this->id_user = $id_user;
    }

    public function get_lastname(): string
    {
        return $this->lastname;
    }
    public function set_lastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function get_firstname(): string
    {
        return $this->firstname;
    }
    public function set_firstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function get_date_of_birthday(): DateTime
    {
        return $this->date_of_birthday;
    }
    public function set_date_of_birthday(DateTime $date_of_birthday)
    {
        $this->date_of_birthday = $date_of_birthday;
    }

    public function get_zipcode(): int
    {
        return $this->zipcode;
    }
    public function set_zipcode(int $zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function get_city(): string
    {
        return $this->city;
    }
    public function set_city(string $city)
    {
        $this->city = $city;
    }

    public function get_phone(): int
    {
        return $this->phone;
    }
    public function set_phone(int $phone)
    {
        $this->phone = $phone;
    }

    public function get_email(): string
    {
        return $this->email;
    }
    public function set_email(string $email)
    {
        $this->email = $email;
    }

    public function get_password(): string
    {
        return $this->password;
    }
    public function set_password(string $password)
    {
        $this->password = $password;
    }

    public function get_message(): string
    {
        return $this->message;
    }
    public function set_message(string $message)
    {
        $this->message = $message;
    }

    public function get_role_management(): int
    {
        return $this->role_management;
    }
    public function set_role_management(int $role_management)
    {
        $this->role_management = $role_management;
    }
}
