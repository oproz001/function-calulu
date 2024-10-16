<?php
//Functions Only On Calulator
function emptyField(string $operator , int $num01 ,  int $num02  ){
    if (empty($num01) && empty($num02)) {
        return 'Please fill all Fields';
    }elseif(empty($operator)){
        return "The Operator is The reason Why its called a Calulator so if You dont mind fill that field!";
    }
}

function operator(string $operator , int $num01 , int $num02){
        
    switch ($operator) {
        case '+':
        return  $num01 + $num02;
            break;
        
        case '-':
        return  $num01 - $num02;
            break;
        
        case '/':
        return  $num01 / $num02;
            break;
        
        case '*':
        return  $num01 * $num02;
            break;
        
        default:
           return 'Error Occured';
            break;
    }
}

function error(){
    return 'Error Occured';
}