<?php
class App
{
     function __construct()
     {
          $url = trim($_SERVER['REQUEST_URI'], '/');
          $url = filter_var($url, FILTER_SANITIZE_URL);
          $url = explode('/', $url);


          $action = $url[4];
          $this->{$action}();
     }

     protected function renderJSON($data){
          header("Content-Type: application/json");
          echo json_encode($data, JSON_UNESCAPED_UNICODE);
     }
}
