<?php
session_start();
$name ="";
$location="";
$mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
if(isset($_POST['save'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $_SESSION['message'] = "Record has been saved ";
    $_SESSION['msg_type'] = "success";
    header("location: index.php");

    $mysqli->query("INSERT INTO data(name,location,file) VALUES('$name','$location','$file')")or die($mysqli->error);
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM  data WHERE  id= $id") or die ($mysqli->error()); 
    $_SESSION['message'] = "Record has been delete ";
    $_SESSION['msg_type'] = "danger";
    header("location: index.php");
}
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id")or die($mysqli->error());
   if(count($result)==1){
       $row = $result->fetch_array();
       $name = $row['name'];
       $location = $row['location'];
   }
}

