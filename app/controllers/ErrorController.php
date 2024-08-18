<?php

class ErrorController extends Controller
{
  public function index()
  {
    $data['title'] = '404 Not Found';
    $this->view('errors/404', $data);
  }
}
