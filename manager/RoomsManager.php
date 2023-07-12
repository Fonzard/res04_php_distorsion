<?php 

class RoomManager extends AbstractManager {
    
    public function getAllRooms(): array
    {
        $query = $this->db->prepare("SELECT * FROM rooms");
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
    public function getRoomById( int $id) : Room 
    {
        $query = $this->db->prepare("SELECT * FROM rooms WHERE id = :id");
        $parameters = [
                "id" => $id
            ];
        $query->execute($parameters);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function insertRoom(Room $room):Room
    {
        if($room->getName() && $room->getDescription())
        {
            
            $query = $this->db->prepare("INSERT INTO rooms (name, description) VALUES (:name, :description)");
            $parameters = [
                    'name' => $room->getName(),
                    'description' => $room->getDescription(),
                ];
            $query->execute($parameters);
        }
        $id = $this->db->lastInsertId();
        $room->setId($id);
        return $room;
    }
    public function editRoom(Room $room): void
    {
        $query = $this->db->prepare("UPDATE rooms SET name = :name, description = :description WHERE id = :id");
        $parameters = [
                'id' => $_SESSION['id'],
                'name' => $room->getUsername(),
                'description' => $room->getDescription(),
            ];
        $query->execute($parameters);
    }
}
?>