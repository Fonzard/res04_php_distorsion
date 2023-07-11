<?php
    class User {

    private ?int $id;
    private string $username;
    private string $email;
    private string $password;
    //date inscription à revoir 

    public function __construct(string $email, string $username, string $password) 
        {
            $this->id = null;
            $this->email = $email;
            $this->username = $username;
            $this->password = $password;
         //initialiser date inscription à revoir 

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
            
                
       // les accesseurs de l'attribut email
       
        public function setEmail(string $email) : void 
        {
            $this->email = $email;
        }
            
            
        public function getEmail() : string
        {
            return $email->email;
        }
        
        // les accesseur de l'attribut username
        
        
        public function setUsername(string $username):void
        {
            $this->username=$username;
        }
        
        public function getUsername():string
        {
            return $username->username;
        }
        
        //les accesseurs de l'attribut password
                
        public function setPassword(string $password):void
        {
            $this->password=$password;
        }
        
        public function getPassword():string
        {
            return $password->password;
        }
    }
?>