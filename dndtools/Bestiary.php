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
   $sql = 'select C.idCreature, Creaturename, Creaturetype, Dangerlevel, Hp, AC, Speed, Str, Dex, Con, `Int`, Wis, Cha, `Saving throws`, Senses, Skills, Vulnerabilities, Resistances, Immunities, Actionname, Actiontype, A.Description, C.Description from creatures C join actcre AC on C.idCreature = AC.idCreature join actions A on AC.idAction = A.idAction';
$result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<details>';
        echo '<summary>';
        echo '<p><b>'.$row['Creaturename'].'</b></p>';
        echo '</summary>';
        echo '<p>'.'Creature Id:'.$row['idCreature'].'</p>';
        echo '<p>'.$row['Creaturetype'].'</p>';
        echo '<p>'.$row['Dangerlevel'].'</p>';
        echo '<p>'.'Armor Class: '.$row['AC'].'</p>';
        echo '<p>'.'Hit Points: '.$row['Hp'].'</p>';
        echo '<p>'.'Speed: '.$row['Speed'].'</p>';
        echo '<p>'.'STR:'.$row['Str'];
        echo '     DEX:'.$row['Dex'];
        echo '     CON:'.$row['Con'];
        echo '     INT:'.$row['Int'];
        echo '     WIS:'.$row['Wis'];
        echo '     CHA:'.$row['Cha'].'</p>';
        echo '<p>'.'<b>Saving throws</b> '.$row['Saving throws'].'</p>';
        echo '<p>'.'Skills '.$row['Skills'].'</p>';
        echo '<p>'.'Senses '.$row['Senses'].'</p>';
        echo '<p>'.'Vulnerabilities '.$row['Vulnerabilities'].'</p>';
        echo '<p>'.'Resistances '.$row['Resistances'].'</p>';
        echo '<p>'.'Immunities '.$row['Immunities'].'</p>';
        while(!empty($row['Actiontype'])) {
            echo $row['Actiontype'];
            echo $row['Actionname'];
            echo $row['A.Description'];
        }
        echo '<p>'.$row['C.Description'].'</p>';
        echo '</details>';
    }}
    mysqli_close($connection);
    ?>
</table>
<p id="demo"></p>
<script>
    function OnClick() {

    }
</script>






</body>
</html>
