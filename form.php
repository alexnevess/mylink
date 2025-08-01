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
            <input class="inputLink" type="text" name="link" id="link">
            <input class="inputBtn" type="submit">
        </form>
        <div class="cardLink">
            <?php
            if (isset($_SESSION['mylink'])) {
                // echo "<p class='resLink'>Seu link: ". $_SESSION['link']."</p>";
                echo "<p class='resLink'>localhost/mylink?ml=" . $_SESSION['mylink'] . "</p>";
            }
            ?>
        </div>
    </main>
    <footer><a class="meuLink" href="https://linktr.ee/alexnevess.dev">alexnevess.dev</a></footer>
</body>

</html>