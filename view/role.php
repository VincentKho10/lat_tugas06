<?php
$btnAdd = filter_input(0,"btnAdd");
if(isset($btnAdd)){
    $nme = filter_input(0,"Name");
    addRole($nme);
}

$deleted = filter_input(1,"id");
if(isset($deleted)){
    delRole($deleted);
    header('Location:index.php?nav=rle');
}
?>

<fieldset>
    <legend>manipulate data</legend>
    <form method="POST">
        <label for="inpName">name:</label><br>
        <input type="text" id="inpName" name="Name"><br>
        <br>
        <button type="submit" name="btnAdd">add</button>
    </form>
</fieldset>

<table id="myTable">
    <thead>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>Action</td>
    </tr>
    </thead>

    <tbody>
    <?php
    $roles = getAllRole();
    foreach ($roles as $role){
        $rlestrg = "'".$role['id']."'";
        var_dump($rlestrg);
        echo '<tr>'
            .'<td>'.$role["id"].'</td>'
            .'<td>'.$role["name"].'</td>'
            .'<td><button onclick="rleUpdate('.$rlestrg.')">update</button>'
            .'<button onclick="rleDelete('.$rlestrg.')">delete</button></td>'
            .'</tr>';
    }
    ?>
    </tbody>
</table>