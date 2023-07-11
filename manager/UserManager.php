<?php
require "AbstractManager.php";

class UserManager extends AbstractManager {
    
        public function getAllUsers() : array
    {
        $query = $this->db->prepare("SELECT * FROM users");
        if($query->execute())
        {
        return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $errorInfo = $query->errorInfo();
            echo 'Erreur de requête SQL : '.errorInfo[2]; // Comprendre cette ligne A Revoir
            return [];
        }
    }
    public function getUserById( int $id) : User 
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $parameters = [
                "id" => $id
            ];
        $query->execute($parameters);
        return $query->fetch(PDO::FETCH_ASSOC);

    }
    public function insertUser(User $user):User
    {
        if($user->getUsername() && $user->getEmail() && $user->getPassword())
        {
            $hash = password_hash($user->getPassword(),PASSWORD_DEFAULT);
            $query = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $parameters = [
                    'username' => $user->getUsername(),
                    'email' => $user->getEmail(),
                    'password' => $hash
                ];
            $query->execute($parameters);
        }
        // $id = $this->db->lastInsertId(); Utile ?? Question à poser
        // $user->setId($id);
        // return $user;
    }
    public function editUser(User $user): void
    {
        $hash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $user->setPassword($hash);
        $query = $this->db->prepare("UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id");
        $parameters = [
                'id' => $_SESSION['id'],
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword()
            ];
        $query->execute($parameters);
    }
    
} 
?>