<?php

//PROCEDURAL STYLE
$db = mysqli_connect($server, $user, $password, #db_name);
        $result = mysqli_query($db, $sql);

//OOP STYLE
$db = new mysqli($server, $user, $password, $db_name);
$result = db->query($sql);

//PROCEDURAL STYLE

$escape = mysqli_real_escape_string($db, $string);

//OOP STYLE
$db->escape_string($string);

//PROCEDURAL STYLE
$row = mysqli_affected_rows($db);

//OOP 
$db->affected_rows;

//PROCEDURAL 
$id = mysqli_insert_id($db);

//OOPSTYLE
$db->insert_id;

//PROCEDURAL 
$db = mysqli_fetch_assoc($result));

//OOP
$result->fetch_assoc();

//PROCEDURAL
$result = mysqli_free_result($result);

//OOP
$result->free();

//OOP STYLE METODA ZA RAD SA ARRAYS-OBJEKTIMA
$result->fetch_assoc();
$result->fetch_row();
$result->fetch_array();
$result->fetch_object();

//SINTAKSA ZA ACTIVE RECORD DESIGN PATERN CODE
$customer = new Customer;
$customer->first_name = 'Stefan';
$customer->last_name = 'Aleksic';
$customer->email = 'stefanaleksic23@gmail.com';
$customer->save();

$customer = Customer::$find_by_email('stefanaleksic23@gmail.com');
echo $customer->last_name;
$customer->city = 'Boston';
$customer->save();

//ponavljamo sql
INSERT INTO bicycles (brand, model, year) VALUES ('Treck', 'Emonda', '2017');

UPDATE bicycles SET brand='Trek', model='Emonda', year='2017' WHERE id='1' LIMIT 1;

DELETE FOM bicycles WHERE id='1' LIMIT 1;

//from for arrays
<input type="text" nema="bicycle[brand]" value=''> </input>
        
//komanda za args i post metodu shodno primeru ove html forme
$args = $_POST['bicycle'];