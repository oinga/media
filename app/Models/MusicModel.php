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
  public function addMusic($artist, $title, $format, $album, $length, $genre, $vendor, $property_type)
  {
    $this->builder = $this->db_music->table('music');

    $data = [
      'artist' => $artist,
      'title' => $title,
      'format' => $format,
      'album' => $album,
      'length' => $length,
      'genre' => $genre,
      'vendor' => $vendor,
      'property_type' => $property_type,
    ];
    $this->builder->insert($data);
    $this->builder->select('artist, title');
    $song = $this->builder->getWhere('id', $this->db_music->insertID);

    return $song->getResult();

  }

  public function musicModal()
  {
    $modal = '<div>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
              Add Music
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
              ...
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
              </div>
              </div>
              </div>
              </div>
              </div>';
    return $modal;
  }

}
