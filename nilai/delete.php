<?php
	$mysqli = new mysqli('localhost:3307','root','','crud');
    $sql="DELETE FROM nilai WHERE id_nilai=$_GET[delete]";
    $mysqli->query($sql);
    header('location:../index.php?page=nilai');
?>