<?php

$btnAdd = filter_input(0,"btnAdd");
if(isset($btnAdd)){
    $nme = filter_input(0,"Name");
    $rle = filter_input(0,"role");
    addUser($nme,$rle);
}

$deleted = filter_input(1,"id");
if(isset($deleted)){
    delUser($deleted);
    header('Location:index.php?nav=usr');
}

$updated=filter_input(0,"btnUpd");
if(isset($updated)){
    var_dump($updated);
    $id = filter_input(0,"id");
    $pass = filter_input(0,"pass");
    $confir = filter_input(0,"confpass");
    if($pass == $confir){
        $nwpass = $confir;
    }else{
        var_dump("password dan verifikasi tidak sama");
    }
    updUser($id,$nwpass);
//    header("Location:index.php?nav=usr");
}
?>

<fieldset>
    <legend>manipulate data</legend>
    <form method="post">
        <label for="inpName">name:</label><br>
        <input type="text" id="inpName" name="Name"><br>
        <br>

        <label for="slcrole">Role:</label><br>
        <select name="role" id="slcrole">
            <?php
            $role = getAllRole();
            foreach ($role as $item) {
                echo "<option value='".$item['id']."'>".$item['name']."</option>";
            }
            ?>
        </select>
        <button type="submit" name="btnAdd">add</button>
    </form>
</fieldset>

<table id="myTable">
    <thead>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>Role</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $users = getAllUser();
    foreach ($users as $user){
        $usrstrg = "'".$user['id']."'";
        echo '<tr>'
            .'<td>'.$user["id"].'</td>'
            .'<td>'.$user["name"].'</td>'
            .'<td>'.$user["role_name"].'</td>';
            if($user['password']==null){
                echo '<td><form method="POST">'
                    .'<input type="password" name="id" value="'.$user["id"].'" hidden>'
                    .'<input type="password" name="pass" placeholder="password">'
                    .'<input type="password" name="confpass" placeholder="confirm password">'
                    .'<button name="btnUpd">update</button></form>';
            }else{
                echo'<td>';
            }
            echo '<button onclick="usrDelete('.$usrstrg.')">delete</button></td>'
            .'</tr>';
    }
    ?>
    </tbody>
</table>