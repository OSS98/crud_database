<?php 
    $conn = mysqli_connect('localhost','root','','cruddb');
    if(!$conn){
        die('Fail to connection'.mysqli_connect_error());
    }

?>