<?php
        session_start();
        if(isset($_SESSION["prihlasenie"]) && $_SESSION["prihlasenie"] === true) {
            header("Location: domov.php");
            exit();
        }
        if(isset($_POST["tlacidlo"])) { 
            if(isset($_POST["meno"]) && isset($_POST["heslo"])) {
                $server = "localhost";
                $login = "root";
                $password = "vertrigo";
                $name_db = "registracia";
                
                $connection = mysqli_connect($server, $login, $password, $name_db);

                $meno = $_POST["meno"];
                $meno = mysqli_real_escape_string($connection, $meno);
                $heslo = $_POST["heslo"];
                $heslo = mysqli_real_escape_string($connection, $heslo);

                $dotaz = "SELECT * FROM persons WHERE userName = '$meno'";
                $prijem = mysqli_query($connection, $dotaz);

                $pocetRiadkov = mysqli_num_rows($prijem);

                if($pocetRiadkov < 1) {
                    die("Užívateľ s týmto menom neexistuje");
                }
                else {
                    $riadok = mysqli_fetch_assoc($prijem);
                    $hashHeslo = $riadok["passwd"];
                    if(!password_verify($heslo, $hashHeslo)) {
                        die("Nespravne heslo");
                    }
                    else {
                        $_SESSION["prihlasenie"] = true;
                        $_SESSION["meno"] = $meno;
                        header("Location: domov.php"); // presmerovanie na podstranku
                        exit();
                    }
                }

            }
        }
    ?>


<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="meno" placeholder="Zadajte meno" required> <br>
        <input type="password" name="heslo" placeholder="Zadajte heslo" required> <br>
        <input type="submit" name="tlacidlo" value="Prihlásiť"> <br>
    </form>

    



    
</body>
</html>