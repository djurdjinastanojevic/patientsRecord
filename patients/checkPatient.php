<?php
session_start();
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName']) && isset($_REQUEST['birthDate'])
&& isset($_REQUEST['country'])) {
    $infected = 0;
    if (isset($_REQUEST['infected'])) {
        if ($_REQUEST['infected'] == "Yes")
            $infected = 1;
        else if ($_REQUEST['infected'] == "No")
            $infected = 0;
    }
    $firstname = $_REQUEST['firstName'];
    $lastname = $_REQUEST['lastName'];
    $birthDate = $_REQUEST['birthDate'];
    $birthYear = date("Y", strtotime($birthDate));
    $country = $_REQUEST['country'];
    $ID = 0;
    include "connection.php";
    $upit = "SELECT * FROM `countries`";
    $result = $conn->query($upit);
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($country == $row['country_name'])
                $ID = $row['id'];
        }
    }
    if ($firstname != null && $lastname != null && $birthDate != null && $country != null )
    {
        $upit1 = "INSERT INTO `patients` (`country_id`, `first_name`, `last_name`, `birth_year`, `infected`) 
VALUES ('" . $ID . "', '" . $firstname . "', '" . $lastname . "', '" . $birthYear . "', '" . $infected . "');";
        $result1 = $conn->query($upit1);
        if ($result1 == true) {
            header("Location: index.php");
        } else {
            header("Location: dodajPacijenta.php");
            setcookie("notice", "Greška pri unosu u bazu!", time() + 24 * 60 * 60, "/");
        }
    } else {
        header("Location: dodajPacijenta.php");
        setcookie("notice", "Niste popunili sva polja!", time() + 24 * 60 * 60, "/");
    }
}


