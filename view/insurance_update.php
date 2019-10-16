<?php
$insurancedao = new InsuranceDao();

$id = filter_input(1,'id');
if(isset($id)){
    $insurance = new Insurance();
    $insurance->setId($id);
    $ins = $insurancedao->getOneInsurance($insurance);
}

$updated = filter_input(0,"btnUpdateDown");
if(isset($updated)){
    $name = filter_input(0,"name_class");
    $insurance = new Insurance();
    $insurance->setNameClass($name);
    $insurance->setId($id);
    $insurancedao->updInsurance($insurance);
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
            /* @var Insurance $ins*/
            echo '<input type="text" id="name" name="name_class" value="'.$ins->getNameClass().'">';
        ?>
        <button type="submit" name="btnUpdateDown">update</button>
    </form>
</fieldset>