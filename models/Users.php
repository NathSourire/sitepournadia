<?php
require_once __DIR__ . '/../helpers/database.php';

class Users
{

    private int $id_user;
    private string $lastname;
    private string $firstname;
    private string $date_of_birthday;
    private string $zipcode;
    private string $city;
    private string $phone;
    private string $email;
    private string $password;
    private string $message;

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

    public function get_date_of_birthday(): string
    {
        return $this->date_of_birthday;
    }
    public function set_date_of_birthday(string $date_of_birthday)
    {
        $this->date_of_birthday = $date_of_birthday;
    }

    public function get_zipcode(): string
    {
        return $this->zipcode;
    }
    public function set_zipcode(string $zipcode)
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

    public function get_phone(): string
    {
        return $this->phone;
    }
    public function set_phone(string $phone)
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


    // fonction qui permet de recuperer une catégorie précise
    public static function get(int $id_user): object|bool
    {
        $pdo = Database::connect();
        $sql = 'SELECT * FROM `nadia`.`users` 
        WHERE `id_user` = :id_user;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();
        return $result;
    }

    public function insert()
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `users` ( `lastname`, `firstname`, `email`, `date_of_birthday`, `phone`, `city`, `zipcode`, `password`, `message` )  
        VALUES ( :lastname, :firstname, :email, :date_of_birthday, :phone, :city, :zipcode, :password, :message  ) ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':lastname', $this->get_lastname(), PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->get_firstname(), PDO::PARAM_STR);
        $sth->bindValue(':email', $this->get_email(), PDO::PARAM_STR);
        $sth->bindValue(':date_of_birthday', $this->get_date_of_birthday(), PDO::PARAM_STR);
        $sth->bindValue(':phone', $this->get_phone(), PDO::PARAM_STR);
        $sth->bindValue(':city', $this->get_city(), PDO::PARAM_STR);
        $sth->bindValue(':zipcode', $this->get_zipcode(), PDO::PARAM_INT);
        $sth->bindValue(':password', $this->get_password(), PDO::PARAM_STR);
        $sth->bindValue(':message', $this->get_message(), PDO::PARAM_STR);
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
        $sql = 'SELECT * FROM `nadia`.`users`
        ORDER BY `lastname` ASC , `firstname` ASC;';
        $sth = $pdo->query($sql);
        $result = $sth->fetchAll();
        return $result;
    }

    //fonction pour archiver un utilisateur et lui attribué une date
    // public static function archived(int $id_user): bool
    // {
    //     $pdo = connect();
    //     $sql = 'UPDATE `users` SET `archived_at`= NOW() WHERE `id_user` = :id_user ;';
    //     $sth = $pdo->prepare($sql);
    //     $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    //     $sth->execute();
    //     $result = $sth->fetch();
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    //fonction pour retirer de l'archive un utilisateur et lui attribué une date
    // public static function restored(int $id_user): bool
    // {
    //     $pdo = connect();
    //     $sql = 'UPDATE `users` SET `archived_at`= NULL WHERE `id_user` = :id_user ;';
    //     $sth = $pdo->prepare($sql);
    //     $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
    //     $sth->execute();
    //     return (bool) $sth->rowCount();
    // }

    //fonction pour modifier
    public function update(): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `users` 
        SET `lastname` = :lastname , `firstname` = :firstname , `email` = :email , `date_of_birthday` = :date_of_birthday , 
        `phone` = :phone , `city` = :city , `zipcode` = :zipcode , `message` = :message, `id_user` = :id_user        
        WHERE `id_user` = :id_user ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':lastname', $this->get_lastname(), PDO::PARAM_STR);
        $sth->bindValue(':firstname', $this->get_firstname(), PDO::PARAM_STR);
        $sth->bindValue(':email', $this->get_email(), PDO::PARAM_STR);
        $sth->bindValue(':date_of_birthday', $this->get_date_of_birthday(), PDO::PARAM_STR);
        $sth->bindValue(':phone', $this->get_phone(), PDO::PARAM_STR);
        $sth->bindValue(':city', $this->get_city(), PDO::PARAM_STR);
        $sth->bindValue(':zipcode', $this->get_zipcode(), PDO::PARAM_INT);
        // $sth->bindValue(':password', $this->get_password(), PDO::PARAM_STR);
        $sth->bindValue(':message', $this->get_message(), PDO::PARAM_STR);
        $sth->bindValue(':id_user', $this->get_id_user(), PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

    public static function getByEmail(string $email): object|false
    {
        $pdo = Database::connect();
        $sql = 'SELECT * from `users` WHERE `email` = :email';
        // Si marqueur nominatif, il faut préparer la requête
        $sth = $pdo->prepare($sql);
        // Affectation de la valeur correspondant au marqueur nominatif concerné
        $sth->bindValue(':email', $email);
        // Exécution de la requête
        $sth->execute();
        $data = $sth->fetch();
        // On teste si data est vide.
        if (!$data) {
            return false;
        } else {
            // Retourne la donnée complète sous forme d'objet (tout s'est bien passé)
            return $data;
        }
    }

    public static function confirmSignUp(int $id_user): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `users` SET `confirmed_at` = NOW() WHERE `users`.`id_user` = :id_user;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $sth->execute();
        if ($sth->rowCount() <= 0) {
            return false;
        } else {
            return true;
        }
    }

    // fonction pour supprimer le vehicule
    public static function delete(int $id_user): bool
    {
        $pdo = Database::connect();
        $sql = 'DELETE FROM `users` WHERE `id_user` = :id_user ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
        $sth->execute();
        return (bool) $sth->rowCount();
    }

    // verification si l'adresse mail est en bdd
    public static function isExist($email): bool
    {
        $pdo = Database::connect();
        $sql = 'SELECT COUNT(*) FROM `users` WHERE `email` = :email';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':email', $email);
        $sth->execute();
        $result = $sth->fetch();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}
