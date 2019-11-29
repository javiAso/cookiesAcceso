<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//$array = [];
//$nombre = "acceso" . count($_COOKIE);
//setcookie($nombre, date("G:i:s", strtotime("now")));

$accesos = [];


if (!empty($_POST["submit"])) {
    switch ($_POST["submit"]) {
        case 'Borrar historial':


            setcookie('accesos', serialize($accesos), time() + 3600 * 24 * -30);

            break;

        default:

            if (!empty($_COOKIE['accesos'])) {
                $accesos = unserialize($_COOKIE['accesos']);
            }


            $accesos[] = date("G:i:s", strtotime("now"));
            setcookie('accesos', serialize($accesos), time() + 3600 * 24 * 30);
            break;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <form action="index.php" method="POST">

            <input type="submit" name="submit" value="Acceder">
            <input type="submit" name="submit" value="Borrar historial">


        </form>

        <?php
        foreach ($accesos as $num => $hora) {

            echo "Acceso número $num a las $hora <br>";
        }
        ?>


    </body>
</html>

