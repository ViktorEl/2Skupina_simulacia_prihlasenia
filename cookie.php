<?php
    $nazovCookie = "kolacik";
    $identifikator = 1;
    $expiracia = time() + (60*60*24*5);
    setcookie($nazovCookie, $identifikator, $expiracia);
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Učíme sa posielať cookie</h1>

</body>
</html>