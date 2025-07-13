<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = $_POST['link'] ?? "";

    if(!strpos("https://", $link))
    {
        $link = "https://".$link;
    }
    echo $link;
}
