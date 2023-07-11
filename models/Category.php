<?php
    class Category {

    private ?int $id;
    private string $name;
    private string $description;
    private int $room_id;
    private int $user_id;
    
    //category_id à revoir

    public function __construct(string $name, string $description) 
        {
            $this->id = null;
            $this->name = $name;
            $this->description = $description;
         // gestion des clés étrangère à revoir 

        }
    
        // les accesseurs de l'attribut id
        
            public function getId() : ?int 
            {
                return $this->id;
            }
        
        public function setId(?int $id) : void
            {
                $this->id = $id;
            }
                
                
       // les accesseurs de l'attribut name
       
        public function setName(string $name) : void 
            {
                $this->name = $name;
            }
            
            
         public function getName() : string
            {
                return $name->name;
            }
        
        // les accesseur de l'attribut description
        
        
        public function setDescription(string $description):void
        {
            $this->description=$description;
        }
        
        public function getDescription():string
        {
            return $description->description;
        }
        
        
    }
?>