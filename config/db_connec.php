<?php
    //Connect to Database
    $connect = mysqli_connect('localhost','Ege','test1234',"Pokedex");
    if(!$connect){
        echo ' No connection :' .mysqli_connect_error();
    }
?> 