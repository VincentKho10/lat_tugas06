<?php
$id = filter_input(1,'id');
if(isset($id)){
    $ins = getOneInsurance($id);
}

$updated = filter_input(0,"btnUpdateDown");
if(isset($updated)){
    $name = filter_input(0,"name_class");
    updInsurance($ins,$name);
    header("Location:index.php?nav=ins");
}
?>

<fieldset>
    <legend>
        manipulasi data
    </legend>
    <form method="post">
        <label for="name">name class: </label>
        <?php
            echo '<input type="text" id="name" name="name_class" value="'.$ins['name_class'].'">';
        ?>
        <button type="submit" name="btnUpdateDown">update</button>
    </form>
</fieldset>