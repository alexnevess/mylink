<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mylink</title>
    <link rel="stylesheet" href="/mylink/style/style.css">
    <link rel="shortcut icon" type="imagex/png" href="img/mylink_logo.png">

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
        <?php
        if (isset($_GET['erro'])) {
            echo "<p class='erro'>Adicione um link</p>";
        }
        ?>
        <div class="cardLink">
            <?php
            if (isset($_SESSION['mylink'])) {
                echo "<input class='resultado' type='text' id='resultado' readonly value='" . "localhost/mylink?ml=" . htmlspecialchars($_SESSION['mylink']) . "'>";
                echo "<input onclick='btnCopiar()' class='resBtn' type='submit' value='copiar'>";
            }
            ?>
        </div>
    </main>
    <footer><a class="meuLink" href="https://linktr.ee/alexnevess.dev">alexnevess.dev</a></footer>

    <script>
        function btnCopiar() {
            const link = document.getElementById("resultado").value;
            navigator.clipboard.writeText(link);
        }
    </script>
</body>

</html>