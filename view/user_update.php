<?php
$id=filter_input(1,"id");
if(isset($id)){
    $users = getOneUser($id);
    var_dump($users);
}

$updated=filter_input(0,"btnUpd");
if(isset($updated)){
    $id = filter_input(1,"id");
    $pass = filter_input(0,"pass");
    $confir = filter_input(0,"confpass");
    if($pass == $confir){
        $nwpass = $confir;
    }else{
        var_dump("password dan verifikasi tidak sama");
    }
    updUser($id,$nwpass);
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
            $users = getAllUser();
            foreach ($users as $user){
                $usrstrg = "'".$user['id']."'";
                echo '<tr>'
                    .'<td>'.$user["id"].'</td>'
                    .'<td>'.$user["name"].'</td>'
                    .'<td>'.$user["role_name"].'</td>';
                    if($user['password']==null){
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