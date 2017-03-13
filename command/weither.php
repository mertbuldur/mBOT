<?php 
class weither 
{
    private $apiUrl = "http://query.yahooapis.com/v1/public/yql";
    public function get($params=[])
    {
        $city = self::ucfirst_tr($params[2]);
	    $yql_query = 'SELECT * FROM weather.forecast WHERE woeid in (select woeid from geo.places(1) where text="'.$city.', Turkey") and u="c"';
	    $yql_query_url = $this->apiUrl . "?q=" . urlencode($yql_query) . "&format=json";
        @$fgc = file_get_contents($yql_query_url);
        if($fgc)
        {
        $json = json_decode($fgc,true);
        $this->getList($json);
        }
        else 
        {
            return "Your Connection Error";
        }
    }
    public function getList($json)
    {
        foreach($json['query']['results']['channel']['item']['forecast'] as $key => $value)
        {
           
               $date = $value['date'];
               $day = $value['day'];
               $text = $value['text'];
               echo "date ".$date."<br/>day: ".$day."<br/>text:".$text." <hr>";
           
        }
    }

    static function ucfirst_tr($metin)
    {
    $k_uzunluk = mb_strlen($metin, "UTF-8");
    $ilkKarakter= mb_substr($metin, 0, 1, "UTF-8");
    $kalan = mb_substr($metin, 1, $k_uzunluk - 1, "UTF-8");
    return mb_strtoupper($ilkKarakter, "UTF-8") . mb_strtolower($kalan,"UTF-8");
    }
}