<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bestiary</title>


<body>
<a href="Index.php">
    <button>Main Menu</button>
</a>
<table>
    <tr>
        <th>Name</th>
        <th>type</th>
        <th>CR</th>
    </tr>

    <?php
    $connection = mysqli_connect("localhost","root", "", "dnddb", "3306");
   $sql = 'select name, type, AC, HP, Speed, Str, Dex, Con, `Int`, Wis, Cha, skills, senses, CR, description, actions from bestiary';
$result = mysqli_query($connection, $sql);
    if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<details>';
        echo '<summary>';
        echo $row['name'];
        echo '</summary>';
        echo '<p>'.$row['name'].'</p>';
        echo '<p>'.$row['type'].'</p>';
        echo '<p>'.'Armor Class '.$row['AC'].'</p>';
        echo '<p>'.'Hit Points '.$row['HP'].'</p>';
        echo '<p>'.'Speed'.$row['Speed'].'</p>';
        echo '<p>'.'STR'.$row['Str'];
        echo 'DEX'.$row['Dex'];
        echo 'CON'.$row['Con'];
        echo 'INT'.$row['Int'];
        echo 'WIS'.$row['Wis'];
        echo 'CHA'.$row['Cha'].'</p>';
        echo '<p>'.'Skills'.$row['skills'].'</p>';
        echo '<p>'.'Senses'.$row['senses'].'</p>';
        echo '<p>'.'Challenge'.$row['CR'].'</p>';
        echo '<p>'.$row['description'].'</p>';
        echo '<p>'.'Actions'.$row['actions'].'</p>';
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
