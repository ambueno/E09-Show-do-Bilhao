<?php 
    session_start();
    setcookie($_SESSION["user"] . "-max", 5); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GANHOU!!</title>
</head> 
<body>
    <h1>Parabéns!!</h1>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/KXw8CRapg7k?start=65" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <div><a href="pergunta.php">Recomeçar</a></div>
</body>
</html>