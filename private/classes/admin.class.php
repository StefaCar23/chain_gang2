<?php

    class Admin extends DatabaseObject{
        static protected $table_name = "admins";
        static protected $db_columns = ['id', 'first_name', 'last_name', 'email', 'username', 'hashed_password', 'date'];
        
        public $id;
        public $first_name;
        public $last_name;
        public $email;
        public $username;
        public $hashed_password;
        public $password;
        public $confirm_password;
        public $date;
        
        protected $password_required = true;
        
        public function __construct($args = []){
            $this->first_name = $args['first_name'] ?? '';
            $this->last_name = $args['last_name'] ?? '';
            $this->email = $args['email'] ?? '';
            $this->username = $args['username'] ?? '';
            $this->password = $args['password'] ?? '';
            $this->confirm_password = $args['confirm_password'] ?? '';
            $this->date = $args['date'] ?? '';
        }
        
        public function full_name(){
            return $this->first_name . " " . $this->last_name;
        }
        
        protected function set_hashed_password(){
            $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
        }
        
        public function verify_password($password){
            return password_verify($password, $this->hashed_password);
        }
        
        protected function create(){
            $this->set_hashed_password();
            return parent::create();
        }
        
        protected function update(){
            if($this->password != ''){
                $this->set_hashed_password();
            }else{
                $this->password_required = false;
            }
           return parent::update();
        }
        
        protected function validate(){
            $this->errors = [];
            
            if(is_blank($this->first_name)){
                $this->errors[] = "First name cannot be blank!";
            }elseif(!has_lenght($this->first_name, array('min'=>2, 'max'=>255))){
                $this->errors[] = "First name must be between 2 and 255 characters!";
            }
            
            if(is_blank($this->last_name)){
                $this->errors[] = "Last name cannot be blank!";
            }elseif(!has_lenght($this->last_name, array('min'=>2, 'max'=>255))){
                $this->errors[] = "Last name must be between 2 and 255 characters!";
            }
            
            if(is_blank($this->email)){
                $this->errors[] = "E-mail cannot be blank!";
            }elseif(!has_lenght($this->email, array('max'=>255))){
                $this->errors[] = "E-mail must be last than 255 characters!";
            }elseif(!has_valid_email_format($this->email)){
                $this->errors[] = "E-mail must have valid format!";
            }
            
            if(is_blank($this->username)){
                $this->errors[] = "Username cannot be blank!";
            }elseif(!has_lenght($this->username, array('min'=>8, 'max'=>255))){
                $this->errors[] = "Username must be between 8 and 255 characters!";
            }elseif(!has_unique_username($this->username, $this->id ?? 0)){
                $this->errors[] = "Username not allowed, please choose another username!";
            }
            
            if($this->password_required){
                if(is_blank($this->password)){
                    $this->errors[] = "Password cannot be blank!";
                }elseif(!has_lenght($this->password, array('min'=>12))){
                    $this->errors[] = "Password must contain 12 or more characters!";
                }elseif(!preg_match('/[A-Z]/', $this->password)){
                    $this->errors[] = "Password must contain at least one upercase letter!";
                }elseif(!preg_match('/[a-z]/', $this->password)){
                    $this->errors[] = "Password must contain at least one lowercase letter!";
            }elseif(!preg_match('/[0-9]/', $this->password)){
                    $this->errors[] = "Password must contain at least one number!";
     
            }elseif(!preg_match('/[^A-Za-z0-9\s]/', $this->password)){
                    $this->errors[] = "Password must contain at least one symbol!";
            }
            
            if(is_blank($this->confirm_password)){
                $this->errors[] = "Confim password cannot be blank!";
            }elseif($this->password !== $this->confirm_password){
                $this->errors[] = "Password and confirm password must match!";
            }
            }
            return $this->errors;
        }
        
        static public function find_by_username($username){
            $sql = "SELECT * FROM " . static::$table_name . " ";
            $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
            $obj_array = static::find_by_sql($sql);
            if(!empty($obj_array)){
                return array_shift($obj_array);
            }else{
                return false;
            }
        }
        
        public function euro_date($val){
            $day = substr($val, -2);
            $month = substr($val, -5,2);
            $year = substr($val, -(strlen($val)),4);
            return $day . "." . $month . "." . $year . ".";
        }
    }
    