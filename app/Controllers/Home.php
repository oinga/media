<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    $data['title'] = 'Ortiv\'s Media - Home';
    return view('welcome_message', $data);
  }
}
