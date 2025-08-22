<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mylink</title>
    <link rel="stylesheet" href="/mylink/assets/style/style.css">
    <link rel="shortcut icon" type="imagex/png" href="/mylink/assets/img/mylink_logo.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <h1 class="title">MyLink</h1>
        <p class="text">Encurtador de URL</p>
        <form action="" method="POST">
            <input class="inputLink" type="text" name="link" id="link" placeholder="Cole seu link aqui" required>
            <input class="inputBtn" type="submit" value="Encurtar">
        </form>
        
        <div class="cardLink">
            <?php
            if(isset($_SESSION['mylink'])) {
                echo "<input class='resultado' type='text' id='resultado' readonly value='" . "localhost/mylink?ml=" . htmlspecialchars($_SESSION['mylink']) . "'>";
                echo "<input onclick='btnCopiar()' class='resBtn' type='submit' value='copiar'>";
            }
            if(isset($_SESSION['erro_url']) && $_SESSION['erro_url'] === true)
            {
                echo "<p class = erro>Adicione uma URL válida</p>";
            }
            ?>
        </div>
    </main>
    <footer><a class="meuLink" href="https://linktr.ee/alexnevess.dev">alexnevess.dev</a></footer>

    <script src="/mylink/assets/js/copia.js"></script>
</body>

</html>