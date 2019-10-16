<?php
$userdao = new UserDao();
$btnAdd = filter_input(0,"btnAdd");
if(isset($btnAdd)){
    $nme = filter_input(0,"Name");
    $rle = filter_input(0,"role");
    $user = new User();
    $user->setName($nme);
    $user->setRole($rle);
    $userdao->addUser($user);
}

$deleted = filter_input(1,"id");
if(isset($deleted)){
    $user = new User();
    $user->setId($deleted);
    $userdao->delUser($user);
    header('Location:index.php?nav=usr');
}

$updated=filter_input(0,"btnUpd");
if(isset($updated)){
    var_dump($updated);
    $id = filter_input(0,"id");
    $pass = filter_input(0,"pass");
    $confir = filter_input(0,"confpass");
    $user = new User();
    $user->setId($id);
    if($pass == $confir){
        $user->setPassword($confir);
    }else{
        var_dump("password dan verifikasi tidak sama");
    }
    $userdao->updUser($user);
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
            $roledao = new RoleDao();
            $role = $roledao->getAllRole();
            /* @var Role $item*/
            foreach ($role as $item) {
                echo "<option value='".$item->getId()."'>".$item->getName()."</option>";
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
    $users = $userdao->getAllUser();
    foreach ($users as $user){
        $usrstrg = "'".$user->getId()."'";
        echo '<tr>'
            .'<td>'.$user->getId().'</td>'
            .'<td>'.$user->getName().'</td>'
            .'<td>'.$user->getRole()->getName().'</td>';
            if($user->getPassword()==null){
                echo '<td><form method="POST">'
                    .'<input type="password" name="id" value="'.$user->getId().'" hidden>'
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