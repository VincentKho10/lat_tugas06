<?php
$userdao = new UserDao();
$roledao = new RoleDao();

$id=filter_input(1,"id");
if(isset($id)){
    $user = new User();
    $user->setId($id);
    $users = $userdao->getOneUser($user);
    var_dump($users);
}

$updated=filter_input(0,"btnUpd");
if(isset($updated)){
    $id = filter_input(1,"id");
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
    header("Location:index.php?nav=usr");
}

?>

<fieldset>

    <legend>manipulate data</legend>

    <form method="post">
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
                        echo '<td><input type="password" name="pass" placeholder="password">'
                        .'<input type="password" name="confpass" placeholder="confirm password"></td>';
                    }
                    echo '</tr>';
            }
        ?>
            </tbody></table>
        <button type="submit" name="btnUpd">update</button>
    </form>

</fieldset>