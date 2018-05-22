<?php

class Bicycle extends DatabaseObject {

  static protected $table_name = 'bicycles';
  static protected $db_columns = ['id', 'brand', 'model', 'year', 'category', 'color', 'gender', 'price', 'weight_kg', 'condition_id', 'description', 'service1', 'price1', 'service2', 'price2'];
  

  public $id;
  public $brand;
  public $model;
  public $year;
  public $category;
  public $color;
  public $description;
  public $gender;
  public $price;
  public $weight_kg;
  public $condition_id;
  public $price1;
  public $service1;
  public $service2;
  public $price2;

  const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

  const GENDERS = ['Mens', 'Womens', 'Unisex'];

  const CONDITION_OPTIONS = [
    1 => 'Beat up',
    2 => 'Decent',
    3 => 'Good',
    4 => 'Great',
    5 => 'Like New'
  ];

  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->brand = $args['brand'] ?? '';
    $this->model = $args['model'] ?? '';
    $this->year = $args['year'] ?? '';
    $this->category = $args['category'] ?? '';
    $this->color = $args['color'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->gender = $args['gender'] ?? '';
    $this->price = $args['price'] ?? 0;
    $this->weight_kg = $args['weight_kg'] ?? 0.0;
    $this->condition_id = $args['condition_id'] ?? 3;
    $this->service1 = $_POST['service1'] ?? '';
    $this->price1 = $_POST['price1'] ?? '';
    $this->service2 = $_POST['service2'] ?? '';
    $this->price2 = $_POST['price2'] ?? '';

    // Caution: allows private/protected properties to be set
    // foreach($args as $k => $v) {
    //   if(property_exists($this, $k)) {
    //     $this->$k = $v;
    //   }
    // }
  }
  
  public function name(){
  return "{$this->brand} {$this->model} {$this->year}";
  }
  
  public function weight_kg() {
    return number_format($this->weight_kg, 2) . ' kg';
  }

  public function set_weight_kg($value) {
    $this->weight_kg = floatval($value);
  }

  public function weight_lbs() {
    $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
    return number_format($weight_lbs, 2) . ' lbs';
  }

  public function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

  public function condition() {
    if($this->condition_id > 0) {
      return self::CONDITION_OPTIONS[$this->condition_id];
    } else {
      return "Unknown";
    }
  }

     protected function validate(){
      $this->errors = [];
      if(is_blank($this->brand)){
          $this->errors[] = "Brand cannot be blank!";
      }
      if(is_blank($this->model)){
          $this->errors[] = "Model cannot be blank!";
      }
  }
  
  public function total(){
      return $this->price1 + $this->price2 . ".00";
  }
}

?>
