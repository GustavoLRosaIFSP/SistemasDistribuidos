<!DOCTYPE html>
<?php include("config.php"); ?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logo.ico" type="image/x-icon">
    <title>Questionário - Nova Linguagem</title>
    <link rel="stylesheet" href="styleSobre.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="logo">
        <img src="assets/logo.png" alt="PokeCode Logo">
    </div>
    <header>
        <nav>
            <ul>
                <!-- <li><a href="#">Home</a></li> -->
                <li><a href="sobre.php">Sobre nós</a></li>
                <li><a href="index.html">Linguagens</a></li>
                <li><a href="ide.php">IDE</a></li>
                <li><a href="questionario.php">Questionario</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Questionário</h2>
        <form method="post" action="">
            <label for="linguagem">Qual linguagem você gostaria que fosse incluída?</label><br>
            <input type="text" id="linguagem" name="linguagem" required><br><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </main>
</body>
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
