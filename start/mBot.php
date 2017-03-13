<?php 
class mBot  
{
    public function start($command)
    {
        return $this->command($command);

    }
    public function command($command)
    {
        $response = explode('#',$command);
       return  $this->opencommand($response);
    }
    public function opencommand($response)
    {

        if(file_exists("command/".$response[0].".php"))
        {
            include("command/".$response[0].".php");
            if (class_exists($response[0])) 
            {
                $newClass = new $response[0];
                $params = $response;
                unset($params[0]);
                unset($params[1]);
                $end = $newClass->$response[1]($params);
                return $end;
            }
            else 
            {
                
                return "Class Not Found";
            }
        }
        else 
        {
           
            return "Command Not Found";
        }
    }
}