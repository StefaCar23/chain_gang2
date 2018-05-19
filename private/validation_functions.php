<?php 

function is_blank($val){
return !isset($val) || trim($val) === '';
}

function has_presence($val){
    return !is_blank($val);
}

function has_lenght_greater_than($val, $min){
    $lenght = strlen($val);
    return $lenght > $min;
}

function has_lenght_less_than($val, $max){
    $lenght = strlen($val);
    return $lenght < $max;
}

function has_lenght_exactly($val, $exact){
    $lenght = strlen($val);
    return $lenght == $exact;
}

function has_lenght($val, $options){
    if(isset($options['min']) && !has_lenght_greater_than($val, $options['min'] -1)){
        return false;
    }elseif(isset($options['max']) && !has_lenght_less_than($val, $options['max'] +1)){
        return false;
    }elseif(isset($options['exact']) && !has_lenght_exactly($val, $options['exact'])){
        return false;
    }else{
        return true;
    } 
}

function has_inclusion_of($val, $set){
    return in_array($val, $set);
}

function has_exclusion_of($val, $set){
    return !in_array($val, $set);
}

function has_string($val, $required_string){
    return strpos($val, $required_string) !== false;
}

function has_valid_email_format($val){
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_regex, $val) === 1;
}

function has_unique_username($username, $current_id = 0){
    $admin = Admin::find_by_username($username);
if($admin === false || $admin->id == $current_id){
        return true;
    }else{
        return false;
    }
}











