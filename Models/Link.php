<?php
class Link
{
    public function sanitiza($url)
    {
        if (stristr($url, "http://") !== false) {
            $url = str_replace("http://", "", $url);
            $url = "https://" . $url;
        } elseif (stristr($url, "https://") === false) {
            $url = "https://" . $url;
        }
        return $url;
    }
    public function geraCod($con)
    {
        do {
            //Gera código
            $num = mt_rand(10000, 99999);
            $num = dechex($num);

            //Consulta se o código existe no BD
            $sql = "SELECT mylink FROM mylink WHERE mylink = ?";
            $consulta = $con->prepare($sql);
            $consulta->bind_param("s", $num);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $linhas = $resultado->fetch_assoc();
        } while ($linhas !== null);

        return $num;
    }
    public function salva($url, $cod, $con)
    {
        $sql = "INSERT INTO mylink (link, mylink) VALUES (?,?)";
        $consulta = $con->prepare($sql);
        $consulta->bind_Param("ss", $url, $cod);
        return $consulta->execute();
    }
}
