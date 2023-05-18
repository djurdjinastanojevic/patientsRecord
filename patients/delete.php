<?php
if (isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    include "connection.php";
    $upit = "DELETE FROM patients WHERE `id` = '".$id."'";
    $result = $conn ->query($upit);
    if($result==true)
    {
        header("Location: index.php");
    }
    else
    {
        die("Neuspješno brisanje");
    }
}
