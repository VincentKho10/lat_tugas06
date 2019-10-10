<?php
include_once "db_function/func_insurance.php";
include_once "db_function/func_patient.php";
include_once "db_function/func_user.php";
include_once "db_function/func_role.php";

session_start();

if(!isset($_SESSION['loggedin'])){
    $_SESSION['loggedin']=false;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="plugins/datatables.min.css">
    <script src="js/my_js.js" type="text/javascript"></script>
</head>
<body>
    <header></header>

    <main>
        <?php
        if(!$_SESSION['loggedin']){
            include_once "view/login.php";
        }else {
            var_dump($_SESSION);
            switch ($_SESSION['logged_as'][0]){
                case"Admin":
                    ?>
                    <nav>
                        <ul>
                            <li><a href="?nav=hm">home</a></li>
                            <li><a href="?nav=ins">insurance</a></li>
                            <li><a href="?nav=pat">patient</a></li>
                            <li><a href="?nav=usr">user</a></li>
                            <li><a href="?nav=lout">logout</a></li>
                        </ul>
                    </nav>
                    <?php
                    break;
                case"Manager":
                    ?>
                    <nav>
                        <ul>
                            <li><a href="?nav=ins">insurance</a></li>
                            <li><a href="?nav=pat">patient</a></li>
                            <li><a href="?nav=lout">logout</a></li>
                        </ul>
                    </nav>
                    <?php
                    break;
                case"Registration Officer":
                    ?>
                    <nav>
                        <ul>
                            <li><a href="?nav=pat">patient</a></li>
                            <li><a href="?nav=lout">logout</a></li>
                        </ul>
                    </nav>
                    <?php
                    break;
            }
            $nav = filter_input(1, "nav");
            switch ($nav) {
                case "hm":
                    include_once "view/home.php";
                    break;
                case "ins":
                    include_once "view/insurance.php";
                    break;
                case "insupd":
                    include_once "view/insurance_update.php";
                    break;
                case "pat":
                    include_once "view/patient.php";
                    break;
                case "patupd":
                    include_once "view/patient_update.php";
                    break;
                case "rle":
                    include_once "view/role.php";
                    break;
                case "rleupd":
                    include_once "view/role_update.php";
                    break;
                case "usr":
                    include_once "view/user.php";
                    break;
                case "usrupd":
                    include_once "view/user_update.php";
                    break;
                case "lout":
                    session_unset();
                    session_destroy();
                    header("location:index.php");
                    break;
                default:
                    include_once "view/home.php";
                    break;
            }
        }
        ?>
    </main>
<script rel="stylesheet" type="text/javascript" src="plugins/datatables.min.js"></script>
<script rel="stylesheet" type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
</body>
</html>