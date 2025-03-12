<?php
namespace App\Controllers;

use App\Models\MovieModel;
use App\Models\ReviewModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class MovieController extends Controller
{
    public function index()
    {
        $movieModel = new MovieModel();
        $reviewModel = new ReviewModel();
        $userModel = new UserModel();

        $movies = $movieModel->findAll();

        foreach ($movies as &$movie) {
            $reviews = $reviewModel->where('movie_id', $movie['id'])->findAll();

            foreach ($reviews as &$review) {
                $user = $userModel->find($review['user_id']);
                $review['username'] = $user ? $user['username'] : 'Unknown User';
            }

            $movie['reviews'] = $reviews;
        }

        return view('movies/index', ['movies' => $movies]);
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

        return redirect()->to('/movies')->with('success', 'Movie added successfully.');
    }
}
