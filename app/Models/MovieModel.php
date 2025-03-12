<?php
namespace App\Models;
use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movies';
    protected $primaryKey = 'id';
    protected $allowedFields = ['omdb_id', 'title', 'synopsis', 'poster_url', 'release_date'];
}
