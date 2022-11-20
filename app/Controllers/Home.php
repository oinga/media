<?php

namespace App\Controllers;

use App\Models\MusicModel;

class Home extends BaseController
{
  public function index()
  {
    $musicModel = model(MusicModel::class);
    $data['music'] = $musicModel->getMusic();
    //get music

    $moviesModel = model(MoviesModel::class);
    $data['movies'] = $moviesModel->getMovies();
    //get movies

    $data['title'] = 'Ortiv\'s Media - Home';
    return view('homeView', $data);
  }
}
