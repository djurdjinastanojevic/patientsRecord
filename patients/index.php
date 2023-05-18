<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Index</title>
    <link href="styleIndex.css" rel="stylesheet">
    <script src="./skript.js"></script>
</head>
<body>
<div class="header">
    <img src="logo.png" alt="Slika se ne može učitati" id="logo">
    <input type="button" name="addBtn" value="Add" id="addBtn" onclick="addbtnClick()">
</div>
<div class="listaDrzave">
    <select name="country" id="country" class="sirina" onchange="ucitajTabelu(this.value)">
        <option value="">---Select country---</option>
        <?php
        include "connection.php";
        $upit = "SELECT * FROM `countries`";
        $result = $conn->query($upit);
        if($result->num_rows>0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
                <option value="<?=$row['country_name'] ?>"><?=$row['country_name'] ?></option>
                <?php
            }
        }
        ?>
    </select>
</div>
<div class="tabela" id="tabela">

</div>
</body>
</html>
