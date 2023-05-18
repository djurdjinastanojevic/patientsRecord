<?php
if(isset($_REQUEST['drzava']))
{
$drzava = $_REQUEST['drzava'];
include "connection.php";
$zarazeni=0;
$nezarazeni=0;
if($drzava=="")
{
    ?>
    <table>
        <tr>
            <th>First and last name</th>
            <th>Birth year</th>
            <th>Country</th>
            <th>Infected</th>
            <th class="delete"></th>
        </tr>
        <?php
        $upit = "SELECT * FROM `patients` JOIN countries ON patients.country_id = countries.id ORDER BY patients.id DESC LIMIT 5";
        $result = $conn ->query($upit);
        if($result->num_rows>0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                ?>
                    <tr>
                <td><?=$row['first_name']." ".$row['last_name']?></td>
                <td><?=$row['birth_year']?></td>
                <td><?=$row['country_name']?></td>
                <td>
                    <?php
                    if($row['infected']==0)
                    {
                        echo "No";
                        $nezarazeni++;
                    }
                    if($row['infected']==1)
                    {
                        echo "Yes";
                        $zarazeni++;
                    }
                    ?>
                    </td>
                <td>
                    <a class="delete" href="delete.php?id=<?=$row['id']?>" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</a>
                    </td>
                    </tr>
                <?php
            }
        }
        ?>
    </table>
<?php

}
else
{
    $upit1 = "SELECT * FROM `patients` JOIN countries ON patients.country_id = countries.id 
WHERE countries.country_name='".$drzava."' ORDER BY patients.id DESC LIMIT 5;";
   ?>
        <table>
            <tr>
                <th>First and last name</th>
                <th>Birth year</th>
                <th>Country</th>
                <th>Infected</th>
                <th class="delete"></th>
            </tr>
            <?php

            $result = $conn ->query($upit1);
            if($result->num_rows>0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    ?>
                        <tr>
                    <td><?=$row['first_name']." ".$row['last_name']?></td>
                    <td><?=$row['birth_year']?></td>
                    <td><?=$row['country_name']?></td>
                    <td>
                        <?php
                        if($row['infected']==0)
                        {
                            echo "No";
                            $nezarazeni++;
                        }
                        if($row['infected']==1)
                        {
                            echo "Yes";
                            $zarazeni++;
                        }
                        ?>
                    </td>
                    <td>
                        <a class="delete" href="delete.php?id=<?=$row['id']?>" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</a>
                    </td>
                        </tr>

                    <?php
                }
            }
            ?>
        </table>

    <div class="ispisZarazeni">
        <div class="tekst">All infected in <?=$drzava?></div>
        <div class="broj"><?=$zarazeni ?></div>
    <div class="tekst">All uninfected in <?=$drzava?></div>
    <div class="broj"><?=$nezarazeni ?></div>
    </div>
        <?php
}
}


