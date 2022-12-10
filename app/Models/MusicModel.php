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
    $modal = '<div class="container">
                  <h2>Basic Modal Example</h2>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Launch demo modal
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add song</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                  <!-- Start form -->
                  
                  <div class="input-group mb-3">
                  <label class="input-group-text"
                  for="inputGroupSelect01">Artist</label>
                  <input class="form-control form-control-sm"
                  type="text" placeholder="EX: Boyz II Men"
                  aria-label=".form-control-sm example">
                  </div>

                  <div class="input-group mb-3">
                  <label class="input-group-text"
                  for="inputGroupSelect01">Title</label>
                  <input class="form-control form-control-sm"
                  type="text" aria-label=".form-control-sm example">
                  </div>                  

                  <div class="input-group mb-3">
                  <label class="input-group-text"
                  for="inputGroupSelect01">Format</label>
                  <select class="form-select"
                  id="inputGroupSelect01">
                  <option selected>Choose...</option>
                  <option value="ELECTRONIC">Electronic</option>
                  <option value="PHYSICAL">Physical</option>
                  </select>
                  </div>

                  <div class="input-group mb-3">
                  <label class="input-group-text"
                  for="inputGroupSelect01">Album</label>
                  <input class="form-control form-control-sm"
                  type="text" aria-label=".form-control-sm example">
                  </div>     
                  
                  <div class="input-group mb-3">
                  <label class="input-group-text"
                  for="inputGroupSelect01">Length</label>
                  <input class="text-sm-start" id="duration-input" type="text" required pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}" value="00:00:00" title="Write a duration in the format hh:mm:ss class="form-control form-control-sm"
                  type="text" aria-label=".form-control-sm example" style="
                  font-size: small;">
                  <p style="
                  font-size: small;" id="output"></p>
                  </div> 

                  <!-- time format script -->
                  <script>
                  {let durationIn = document.getElementById("duration-input");
                    let resultP = document.getElementById("output");
                    durationIn.addEventListener("change", function (e) {
                    resultP.textContent = "";
                    durationIn.checkValidity();
                    });
                    durationIn.addEventListener("invalid", function (e) {
                  resultP.textContent = "Invalid format: must be minute:seconds:milliseconds";
                });
                }
                </script> 
                <!-- time format script -->

                <div class="input-group mb-3">
                <label class="input-group-text"
                for="inputGroupSelect01">Genre</label>
                <input class="form-control form-control-sm"
                type="text" aria-label=".form-control-sm example">
                </div>   

                <div class="input-group mb-3">
                <label class="input-group-text"
                for="inputGroupSelect01">Vendor</label>
                <input class="form-control form-control-sm text-uppercase"
                type="text" aria-label=".form-control-sm example" placeholder="ex: APPLE MUSIC">
                </div> 

                <div class="input-group mb-3">
                <label class="input-group-text"
                for="inputGroupSelect01">Property Type</label>
                <select class="form-select"
                id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="PURCHASE">Purchase</option>
                <option value="GIFT">Gift</option>
                </select>
                </div>                

                  <! -- End form -->
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>';
    return $modal;
  }

}
