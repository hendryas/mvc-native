<?php

class Core
{
  protected $currentController = 'HomeController';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    $url = $this->getUrl();

    // Check if the controller exists
    if (file_exists('../app/controllers/' . ucwords($url[0]) . 'Controller.php')) {
      $this->currentController = ucwords($url[0]) . 'Controller';
      unset($url[0]);
    } else {
      $this->currentController = 'ErrorController'; // Arahkan ke controller Error jika tidak ditemukan
    }

    require_once '../app/controllers/' . $this->currentController . '.php';
    $this->currentController = new $this->currentController;

    // Check if method exists in controller
    if (isset($url[1])) {
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        unset($url[1]);
      } else {
        $this->currentController = new ErrorController();
        $this->currentMethod = 'index'; // Arahkan ke method index pada ErrorController
      }
    }

    // Get parameters
    $this->params = $url ? array_values($url) : [];

    // Call method and pass parameters
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  public function getUrl()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
