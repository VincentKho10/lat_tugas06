<?php
$id=filter_input(1,"id");
if(isset($id)){
    $role = getOneRole($id);
}

$updated=filter_input(0,"btnUpd");
if(isset($updated)){
    $id = filter_input(1,"id");
    $nme = filter_input(0,"Name");
    updRole($id,$nme);
    header("Location:index.php?nav=rle");
}
?>

<fieldset>
    <legend>manipulate data</legend>

    <form method="post">
        <label for="inpName">name:</label><br><?php
        echo '<input type="text" id="inpName" name="Name" value="'.$role["name"].'"><br>'?>
        <br>
        <button type="submit" name="btnUpd">update</button>
    </form>

</fieldset>