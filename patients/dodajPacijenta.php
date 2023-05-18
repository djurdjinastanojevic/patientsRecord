<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SZO – Dodaj osobu</title>
    <link rel="stylesheet" href="style.css">
    <script src="skript.js"></script>
</head>
<body>
<?php
include "cookie.php";
?>
<div class="dodajOsobu">

    <form name="unos" action="checkPatient.php" method="post">
        <table id="tabelaAdd">
            <tr>
                <td colspan="2">
                    <img src="logo.png">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="firstName">First name: </label>
                </td>
                <td>
                    <input name="firstName" id="firstName" type="text" class="sirina">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="lastName">Last name: </label>
                </td>
                <td>
                    <input name="lastName" id="lastName" type="text" class="sirina">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="birthDate">Birth date: </label>
                </td>
                <td>
                    <input name="birthDate" id="birthDate" type="date" class="sirina">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="country">Country: </label>
                </td>
                <td>
                    <select name="country" id="country" class="sirina">
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
                </td>
            </tr>
            <tr>
                <td>
                    <label for="infected">Infected: </label>
                </td>
                <td>
                    <input name="infected" type="radio" id="InfectedYes" value="Yes" onchange="red()">
                    <label for="infectedYes">Yes</label>
                    <input name="infected" type="radio" id="InfectedNo" value="No" onchange="gray()">
                    <label for="infectedYes">No</label>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="add" id="add" value="Add" class="dugme">
                    <input name="reset" type="button" id="reset" value="Reset form" class="dugme" onclick="resetBtnClick()">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>