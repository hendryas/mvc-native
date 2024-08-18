<?php

class HomeController extends Controller
{
  public function index()
  {
    $data['title'] = 'Welcome to Home Page';
    $this->view('home', $data);
  }
}
