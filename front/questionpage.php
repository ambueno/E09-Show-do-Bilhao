<?php
    require "partials/questions.inc";

    session_start();
    if (!isset($_SESSION["user"])) { 
        header("Location: index.php");
    }
    $user = $_SESSION["user"];

    $question_id = 0;

    if (isset($_GET["id"])) {
        $question_id = $_GET["id"];
    } 

    if (isset($_POST["answer"])) {
        $previous_answer = $_POST["answer"];
        $previous_option_selected = $_POST["option"];

        // atualiza cookie com score máximo
        $score = $question_id - 1;
        if (isset($_COOKIE[$user . "-max"]) && $_COOKIE[$user . "-max"] > $score) {
            $score = $_COOKIE[$user . "-max"];
        }
        setcookie($user . "-max", $score);

        // se diferente, então resposta é incorreta
        if ($previous_answer != $previous_option_selected) {
            header("Location: perdeu.php");
        }
        // se igual a cinco, então ele respondeu todas corretamente!
        if ($question_id == 5) {
            header("Location: win.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show do Bilhão</title>
</head>
<body>
    <?php include "partials/header.inc"; ?>

    <h2><?= $question["question"] ?></h2>
    <form action="pergunta.php?id=<?= $question_id + 1 ?>" method="post">
        <input type="radio" name="option" value="0" id="">
        <label for="0"><?= $question["options"][0] ?></label> <br>
        <input type="radio" name="option" value="1" id="">
        <label for="1"><?= $question["options"][1] ?></label> <br>
        <input type="radio" name="option" value="2" id="">
        <label for="2"><?= $question["options"][2] ?></label> <br>
        <input type="radio" name="option" value="3" id="">
        <label for="3"><?= $question["options"][3] ?></label> <br>
        <input type="hidden" name="answer" value="<?= $question["answer"] ?>">
        <input type="submit" value="Enviar!">
    </form>

    <?php include "partials/footer.inc"; ?>
</body>
</html>