<?php

namespace App\Models;

use CodeIgniter\Model;

class MusicModel extends Model
{
  protected $db_music;

  protected $allowedFields = ['title', 'slug', 'body'];

  function __construct()
  {
    $this->db_music = db_connect('music');
  }

  public function getMusic()
  {
    $this->builder = $this->db_music->table('music');
    $this->builder->orderBy('artist');

    $music = $this->builder->get();
    return $music->getResult();
  }
}
