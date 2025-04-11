<?php
    session_start();
    if(!isset($_SESSION["prihlasenie"]) || $_SESSION["prihlasenie"] !== true) {
        header("Location: index.php");
        exit();
    }
    if(isset($_POST["tlacidlo"])) {
        $_SESSION = array();        // vyprazdnenie relacie
        session_destroy();          // ukoncenie relacie
        header("Location:index.php");   // presmerovanie na inu podstranku
        exit();
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
    <h1>Vitajte na našej stránke</h1>

    <p>Sme firma, ktorá sa zaoberá predajom 3D tlačiarní a náhradných dielov</p>

    <form action="domov.php" method="post">
        <input type="submit" name="tlacidlo" value="Odhlásiť"> <br>
    </form>

    
</body>
</html>