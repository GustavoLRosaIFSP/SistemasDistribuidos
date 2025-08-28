<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Questionário - Nova Linguagem</title>
</head>
<body>
    <h2>Questionário</h2>
    <form method="post" action="">
        <label for="linguagem">Qual linguagem você gostaria que fosse incluída?</label><br>
        <input type="text" id="linguagem" name="linguagem" required><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php
    if (isset($_POST['enviar'])) {
        $linguagem = $conn->real_escape_string($_POST['linguagem']);

        $sql = "INSERT INTO sugestoes (linguagem) VALUES ('$linguagem')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Obrigado pela sua sugestão!</p>";
        } else {
            echo "<p>Erro: " . $conn->error . "</p>";
        }
    }
    ?>
</body>
</html>
