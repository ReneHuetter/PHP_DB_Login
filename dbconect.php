<?php

    $hostname='localhost';
    $username='root';
    $password='';
    $datebas='coderselite';

    $con= mysqli_connect($hostname,$username,$password,$datebas);

    if(!$con){
        die("Could not connect to datebas");
    }	
?>