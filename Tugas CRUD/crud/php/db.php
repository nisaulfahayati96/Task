<?php

function Createdb(){
    $servername ="localhost";
    $username ="root";
    $password ="";
    $dbname ="profile";

    // create connection
    $con = mysqli_connect($servername,$username,$password);

    // check connection
    if(!$con){
        die("Connection Failed:".mysqli_connect_error());
    }

    // create database
    $sql ="CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername,$username,$password,$dbname);

        $sql="
               CREATE TABLE IF NOT EXISTS karyawan(
               id_karyawan INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
               nama_karyawan VARCHAR(25) NOT NULL,
               divisi VARCHAR(20),
               umur FLOAT 
               );
        ";
        if (mysqli_query($con,$sql)){
            return $con;
        }else{
            echo"Cannot Create Table...!";
        }
    }else{
        echo"Error while creating database".mysqli_error($con);
    }
}