<?php
class Link
{
    public function geraCod()
    {
        $num = mt_rand(10000, 99999);
        $num = dechex($num);
        return $num;
    }
}
