<?php
include "../config/conecta.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = $_POST['link'] ?? "";

    // $teste = stristr($link, "http://");
    // var_dump($teste);

    if (stristr($link, "http://") !== false) {
        $link = str_replace("http://", "", $link);
        $link = "https://" . $link;
    } elseif (stristr($link, "https://") === false) {
        $link = "https://" . $link;
    }

    echo $link;

    $cod = mt_rand(10000, 999999);
    $cod = dechex($cod);

    $sql = "INSERT INTO mylink (link, mylink) VALUES (?,?)";
    $consulta = $con->prepare($sql);
    $consulta->bind_Param("ss", $link, $cod);
    $consulta->execute();
}
