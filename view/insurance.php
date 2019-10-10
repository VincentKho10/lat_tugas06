<?php
$addBtnClicked=filter_input(0,"addBtnClicked");
if(isset($addBtnClicked)){
    $name_class = filter_input(0,"name_class");
    addInsurance($name_class);
}

$deleted=filter_input(1,"id");
if(isset($deleted)){
    delInsurance($deleted);
    header("Location:index.php?nav=ins");
}
?>

<fieldset>
    <legend>
        manipulasi data
    </legend>
    <form method="post">
        <label for="name">name class: </label>
        <input type="text" id="name" name="name_class">
        <button type="submit" name="addBtnClicked">add</button>
    </form>
</fieldset>

<table id="myTable">
    <thead>
    <tr>
        <th>id</th>
        <th>nama class</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $insurances = getAllInsurance();
    foreach($insurances as $insurance)
    {
        echo"<tr>";
        echo"<td>". $insurance['id'] ."</td>";
        echo"<td>". $insurance['name_class'] ."</td>";
        echo"<td><button onclick='updateInsurance(". $insurance['id'] .")'>update</button><button onclick='delInsurance(". $insurance['id'] .")'>delete</button></td>";
        echo"</tr>";
    }
    ?>
    </tbody>
</table>