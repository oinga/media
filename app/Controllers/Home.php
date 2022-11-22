<?php

namespace App\Controllers;

use App\Models\MusicModel;

class Home extends BaseController
{
  public function index()
  {
    $musicModel = model(MusicModel::class);
    $data['music'] = $musicModel->getMusic();
    $data['musicModal'] = $musicModel->musicModal();


    //get music
    if (strtolower($this->request->getMethod()) == 'post') {
      $artist = $this->request->getPost('artist');
      $title = $this->request->getPost('title');
      $format = $this->request->getPost('format');
      $album = $this->request->getPost('album');
      $length = $this->request->getPost('length');
      $genre = $this->request->getPost('genre');
      $vendor = $this->request->getPost('vendor');
      $property_type = $this->request->getPost('property_type');

      $musicModel->addMusic($artist, $title, $format, $album, $length, $genre, $vendor, $property_type);
      //insert song
    }
    $data['title'] = 'Ortiv\'s Media - Home';
    return view('homeView', $data);
  }


}
