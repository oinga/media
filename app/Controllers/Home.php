<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Home extends BaseController
{
  public function index()
  {
    $musicModel = model(MusicModel::class);
    $data['music'] = $musicModel->getMusic();

    $data['title'] = 'Ortiv\'s Media - Home';
    return view('homeView', $data);
  }
}
