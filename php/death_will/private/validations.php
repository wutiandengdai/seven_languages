<?php

function is_blank($value){
    return !isset($value) || trim($value) ==='';
}

function is_present($value){
    return !is_blank($value);
}

function is_greater_than($value, $min){
    return strlen($value) >= $min;
}

function is_length_equal($value, $exact){
    return strlen($value) == $exact;
}

function is_less_than($value, $max){
    return strlen($value) <= $max;
}

function is_length_valid($value, $options){
    if(isset($options['min']) && !is_greater_than($value, $options['min'])){
        return false;
    }if(isset($options['exact']) && !is_length_equal($value, $options['exact'])){
        return false;
    }if(isset($options['max']) && !is_less_than($value, $options['max'])){
        return false;
    }else{
        return true;
    }
}

function has_inclusion_of($value, $array){
    return in_array($value, $array);
}

function contains_string($value, $required_str){
    return strpos($value, $required_str) !== false;
}

function is_valid_email($value){
    $email_pattern = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
    return preg_match($email_pattern, $value)===1;
}
?>