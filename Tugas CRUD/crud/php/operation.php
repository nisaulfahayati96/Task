<?php

require_once ("db.php");
require_once ("component.php");

$con = Createdb();

// create button click
if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteall();
}

function createData(){
    $namakaryawan = textboxValue("nama_karyawan");
    $divisi = textboxValue("divisi");
    $umur = textboxValue("umur");

    if($namakaryawan && $divisi && $umur){
        $sql = "INSERT INTO karyawan(nama_karyawan, divisi, umur)
                 VALUES ('$namakaryawan', '$divisi', '$umur')";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success", "Record Successfully Inserted...");
        }else{
            echo "Error";
        }
    }else{
            TextNode("error", "Provide Data in the Textbox");
    }
}

function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
     if(empty($textbox)){
         return false;
     }else{
         return $textbox;
     }
}

// messages
function TextNode($classname, $msg){
    $element ="<h6 class='$classname'>$msg</h6>";
    echo $element;
}

// get data from mysql database
function getData(){
    $sql ="SELECT * FROM karyawan";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
        }
}

// update data
function UpdateData(){
    $id = textboxValue("id_karyawan");
    $namakaryawan = textboxValue("nama_karyawan");
    $divisi = textboxValue("divisi");
    $umur = textboxValue("umur");

    if($namakaryawan && $divisi && $umur){
        $sql="
              UPDATE karyawan SET nama_karyawan='$namakaryawan', divisi='$divisi', umur='$umur' WHERE id_karyawan='$id'
              ";

        if(mysqli_query($GLOBALS['con'], $sql)){
            TextNode("success","Data Successfully Updated");
        }else{
            TextNode("error","Enable to Update Data");
        }

    }else{
        TextNode("error","Select Data Using Icon");
    }

}

function deleteRecord(){
    $id = (int) textboxValue("id_karyawan");

    $sql = "DELETE FROM karyawan WHERE id_karyawan=$id";

    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success", "Record Deleted Successfully..!");
    }else{
        TextNode("error", "Enable to Delete Record");
    }
}

function deleteBtn(){
    $result = getData();
    $i = 0;
    if($result){
        while($row =mysqli_fetch_assoc($result)){
            $i++;
            if($i >3){
                buttonElement("btn-deleteall", "btn btn-danger","<i class='fas fa-trash'></i>Delete All","deleteall", "");
                return;
            }
        }
    }
}

 function deleteall(){
    $sql = "DROP TABLE karyawan";

    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success","All Record Deleted Successfully");
        Createdb();
    }else{
        TextNode("eroor","Something Went Wrong, Record Can Not Deleted");
    }
 }

// set id to textbox
function setID(){
    $getid = getData();
    $id = 0;
    if ($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['id_karyawan'];
        }
    }
    return ($id +1);
}