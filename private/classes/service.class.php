<?php

    class Service extends DatabaseObject{
        static protected $table_name = "service";
        static protected $db_columns = ['id', 'byc_id', 'date', 'service1', 'price1', 'service2', 'price2', 'service3', 'price3', 'service4', 'price4'];
        
        public $id;
        public $byc_id;
        public $date;
        public $service1;
        public $price1;
        public $service2;
        public $price2;
        public $service3;
        public $price3;
        public $service4;
        public $price4;
        
        public function __construct($args = []){
            $this->byc_id = $args['byc_id'] ?? '';
            $this->date = $args['date'] ?? '';
            $this->service1 = $args['service1'] ?? '';
            $this->price1 = $args['price1'] ?? '';
            $this->service2 = $args['service2'] ?? '';
            $this->price2 = $args['price2'] ?? '';
            $this->service3 = $args['service3'] ?? '';
            $this->price3 = $args['price3'] ?? '';
            $this->service4 = $args['service4'] ?? '';
            $this->price4 = $args['price4'] ?? '';
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
        
       
        
        public function euro_date($val){
            $day = substr($val, -2);
            $month = substr($val, -5,2);
            $year = substr($val, -(strlen($val)),4);
            return $day . "." . $month . "." . $year . ".";
        }
    }
    