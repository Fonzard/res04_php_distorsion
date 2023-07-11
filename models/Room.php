<?php
    class Room {

    private ?int $id;
    private string $name;
    private string $description;
    private int $category_id;
    
    //category_id à revoir

    public function __construct(string $name, string $description) 
        {
            $this->id = null;
            $this->name = $name;
            $this->description = $description;
         //initialiser $category_id à revoir 

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
                return $this->name;
            }
        
        // les accesseur de l'attribut description
        
        
        public function setDescription(string $description):void
        {
            $this->description=$description;
        }
        
        public function getDescription():string
        {
            return $this->description;
        }
    }
?>