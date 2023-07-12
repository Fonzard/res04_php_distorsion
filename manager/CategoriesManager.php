<?php
    class CategorieManager extends AbstractManager
    {
        public function getAllCategorie() : array
        {
            $query = $this->db->prepare("SELECT * FROM categories");
            if($query->execute())
            {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }else
            {
                $errorInfo = $query->errorInfo();
                echo 'Erreur de requÃªte SQL : '.errorInfo[2]; // Comprendre cette ligne A Revoir
                return [];
            }
            
        }
        
        public function getCategorieById(int $id):Categorie
        {
             $query = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
             $parameters = [
                "id" => $id
            ];
            $query->execute($parameters);
             return $query->fetch(PDO::FETCH_ASSOC);
        }
        
        
         public function insertCategirie(Categorie $categorie):Categorie
    {
        if($categorie->getName() && $categorie->getDescription())
        {
            $query = $this->db->prepare("INSERT INTO categories (name, description) VALUES (:name, :description)");
            $parameters = [
                    'name' => $categorie->getName(),
                    'description' => $categorie->getDescription(),
                ];
            $query->execute($parameters);
        }
     }
     
     
     public function editCategorie(Categorie $categorie): void
    {
        $categorie->setCategorie();
        $query = $this->db->prepare("UPDATE categories SET name = :name, description = :description WHERE id = :id");
        $parameters = [
                'id' => $_SESSION['id'],
                'name' => $categorie->getName(),
                'description' => $categorie->getDescription(),
            ];
        $query->execute($parameters);
    }
    

        
   }

?>