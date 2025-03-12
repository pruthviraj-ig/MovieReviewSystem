<?php
namespace App\Controllers;
use App\Models\MovieModel;
use App\Models\ReviewModel;
use CodeIgniter\Controller;

class MovieController extends Controller
{
    public function index()
    {
        $movieModel = new MovieModel();
        $reviewModel = new ReviewModel();

        // Fetch all movies
        $movies = $movieModel->findAll();

        // Attach reviews to each movie
        foreach ($movies as &$movie) {
            $movie['reviews'] = $reviewModel->where('movie_id', $movie['id'])->findAll();
        }

        $data['movies'] = $movies;

        return view('movies/index', $data);
    }

    public function create()
    {
        return view('movies/create');
    }

    public function store()
    {
        $model = new MovieModel();
        $model->save([
            'omdb_id' => $this->request->getPost('omdb_id'),
            'title' => $this->request->getPost('title'),
            'synopsis' => $this->request->getPost('synopsis'),
            'poster_url' => $this->request->getPost('poster_url'),
            'release_date' => $this->request->getPost('release_date'),
        ]);

        return redirect()->to('/movies');
    }
}
