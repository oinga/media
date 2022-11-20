<?php

namespace App\Models;

use CodeIgniter\Model;

class MoviesModel extends Model
{
  protected $db_movies;


  function __construct()
  {
    $this->db_movies = db_connect('movies');
  }

  public function getMovies()
  {
    $this->builder = $this->db_movies->table('movies');
    $this->builder->orderBy('name');

    $movies = $this->builder->get();
    return $movies->getResult();
  }
}
