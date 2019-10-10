<?php
    $login = filter_input(0,"btnLogin");
    if(isset($login)){
        $uname = filter_input(0,"Uname");
        $pass = filter_input(0,"Pass");
        $ulogged = loginUser($uname,$pass);
        if($ulogged != false){
            $_SESSION["logged_as"] = $ulogged;
            $_SESSION["loggedin"] = true;
            header('location:index.php');
        }
    }
?>

<form method="POST">
    <div style="padding:1% 1%;">
        <label for="inpUname">username: </label><br>
        <input type="text" id="inpUname" name="Uname" placeholder="username" autofocus>
    </div>
    <div style="padding:0 1%;">
        <label for="inpPass">password: </label><br>
        <input type="password" id="inpPass" name="Pass" placeholder="password">
        <button type="submit" name="btnLogin">Login</button>
    </div>
</form>