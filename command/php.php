<?php 
class php 
{
    public $docUrl = "docs/php.php";
    public function docs($params=[])
    {
       $query = $params[2];
        include($this->docUrl);
       if(isset($array[$query]))
       {
            return htmlentities($array[$query]);
       }
       else 
       {
           return '"'.$query.'"'." not Found in PHP DOCS";
       }
    }
}