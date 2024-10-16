<?php
    include "../functions/operator.php";

if (isset($_POST['submit'])) {
    $num01 = $_POST['num01'];
    $operator = $_POST['operator'];
    $num02 = $_POST['num02'];

    $isEmpty = emptyField($operator ,  $num01 ,  $num02);

    if($isEmpty){
       $emptyerror =   emptyField( $operator ,  $num01 ,  $num02);
       header("Location: ../index.php?error=$emptyerror");
    }else{
        $answer = operator( $operator ,  $num01 ,  $num02);
        header("Location: ../index.php?answer=$answer");
    }

} else {
   error();
}
