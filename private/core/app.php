<?php

/**
 * main app file
 */
class App
{
    protected $controller = "home";
    protected $method = "index";
    protected $params = array(); 

    public function __construct() 
    {
       $MY_URL = $this->getURL();
       if (file_exists("../private/controllers/".$MY_URL[0].".php")) 
       {
            $this->controller = ucfirst($MY_URL[0]);
            unset($MY_URL[0]);
       }
       require("../private/controllers/".$this->controller.".php");
       $this->controller = new $this->controller();

       if (isset($MY_URL[1])) 
       {
            if (method_exists($this->controller, $MY_URL[1])) 
            {
                $this->method = ucfirst($MY_URL[1]);
                unset($MY_URL[1]);
            } 
       }
       $MY_URL = array_values($MY_URL);
       $this->params = $MY_URL;
     
       call_user_func_array([$this->controller,$this->method], $this->params);
    }

    private function getURL() {
        $url = isset($_GET['url']) ? $_GET['url'] : "home";
       return explode("/", filter_var(trim($url,"/")),FILTER_SANITIZE_URL);
    }
}
