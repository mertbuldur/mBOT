<?php 
class css 
{
    public function generator($param)
    {
        $t = $param[2];
        $t2 = $param[3];
        $t3 = $param[4];
        $t4 = $param[5];
        return $t.":".$t3." ".$t2." ".$t4.";";
    }
}