<?php
    class Post {

    private ?int $id;
    private string $content;
    private date $postDate;
    private int $user_id;
    //user_id à revoir 

    public function __construct(string $content, date $postDate) 
        {
            $this->id = null;
            $this->content = $content;
            $this->postDate = $postDate;
         //comment gérer les date et les clé étrangères? 

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
                
                
       // les accesseurs de l'attribut content
       
        public function setContent(string $content) : void 
            {
                $this->content = $content;
            }
            
            
         public function getContent() : string
            {
                return $this->content;
            }
        
        // les accesseur de l'attribut date
        
        
        public function setPostDate(string $postDate):void
        {
            $this->postDate=$postDate;
        }
        
        public function getPostDate():date
        {
            return $this->postDate;
        }

    }
?>