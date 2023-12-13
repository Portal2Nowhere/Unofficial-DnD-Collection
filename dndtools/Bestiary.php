<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bestiary</title>


<body>
<a href="Index.php">
    <button>Main Menu</button>
</a>

    <?php
    $connection = mysqli_connect("localhost","root", "", "dnddb", "3306");
   $sql = 'select idCreature, Creaturename, Creaturetype, Dangerlevel, Hp, AC, Speed, Str, Dex, Con, `Int`, Wis, Cha, `Saving throws`, Senses, Skills, Vulnerabilities, Resistances, Immunities, Creaturedescription from creatures';
$result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<details>';
        echo '<summary>';
        echo '<b>'.$row['Creaturename'].'</b>';
        echo '</summary>';
        echo "______________________________________________________________________________";
        $id = $row['idCreature'];
        echo '<p><b>'.'Creature id: </b>'.$id.'</p>';
        echo '<p><b>'.'Creature type: </b>'.$row['Creaturetype'].'</p>';
        echo '<p><b>'.'Danger level: </b>'.$row['Dangerlevel'].'</p>';
        echo "______________________________________________________________________________";
        echo '<p><b>'.'Armor Class: </b>'.$row['AC'].'</p>';
        echo '<p><b>'.'Hit Points: </b>'.$row['Hp'].'</p>';
        echo '<p><b>'.'Speed: </b>'.$row['Speed'].'</p>';
        echo "______________________________________________________________________________";
        echo '<p><b>'.'STR: </b>'.$row['Str'];
        echo '<b> DEX: </b>'.$row['Dex'];
        echo '<b> CON: </b>'.$row['Con'];
        echo '<b> INT: </b>'.$row['Int'];
        echo '<b> WIS: </b>'.$row['Wis'];
        echo '<b> CHA: </b>'.$row['Cha'].'</p>';
        echo "______________________________________________________________________________";
        echo '<p><b>'.'Saving throws: </b>'.$row['Saving throws'].'</p>';
        echo '<p><b>'.'Skills: </b>'.$row['Skills'].'</p>';
        echo '<p><b>'.'Senses: </b>'.$row['Senses'].'</p>';
        echo '<p><b>'.'Vulnerabilities: </b>'.$row['Vulnerabilities'].'</p>';
        echo '<p><b>'.'Resistances: </b>'.$row['Resistances'].'</p>';
        echo '<p><b>'.'Immunities: </b>'.$row['Immunities'].'</p>';
        $Cd = $row['Creaturedescription'];
        $sql = "select Actiontype from Actions A join actcre AC on A.idAction = AC.idAction WHERE AC.idCreature = $id GROUP BY Actiontype ASC";
        $result1 = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result1) > 0) {
            while($row = mysqli_fetch_assoc($result1)) {
                echo "______________________________________________________________________________";
                $at = $row['Actiontype'];
                echo '<h1><b>'.$at.'</b></h1>';
    $sql = "select Actionname, Actiondescription from Actions A join actcre AC on A.idAction = AC.idAction WHERE idCreature = $id AND A.Actiontype = '$at' ORDER BY Actionname ASC";
    $result2 = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result2) > 0) {
        while($row = mysqli_fetch_assoc($result2)) {
            echo '<p><b>'.$row['Actionname'].'</b>   '.$row['Actiondescription'].'</p>';
        }
    }
    }}
        echo "______________________________________________________________________________";
        echo '<p>'.$Cd.'</p>';
        echo "______________________________________________________________________________";
        echo '</details>';

    }}
    mysqli_close($connection);
    ?>





</body>
</html>
