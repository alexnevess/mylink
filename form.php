<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <main>
        <h1 class="title">MyLink</h1>
        <form action="action/modificaLink.php" method="post">
            <input class="inputLink" type="text" name="link" id="link" placeholder="Digite um link..." required>
            <input class="inputBtn" type="submit">
        </form>
        <?php
        if (isset($_GET['erro'])) {
            echo "<p class='erro'>Adicione um link</p>";
        }
        ?>
        <div class="cardLink">
            <?php
            if (isset($_SESSION['mylink'])) {
                echo "<input class='resultado' type='text' id='resultado' readonly value='"."localhost/mylink?ml=". $_SESSION['mylink'] ."'>";
                echo "<input onclick='btnCopiar()' class='resBtn' type='submit' value='copiar'>";
            }
            ?>
        </div>
    </main>
    <footer><a class="meuLink" href="https://linktr.ee/alexnevess.dev">alexnevess.dev</a></footer>

    <script>
        function btnCopiar(){
            const link = document.getElementById("resultado").value;
            navigator.clipboard.writeText(link);
        }
    </script>
</body>

</html>