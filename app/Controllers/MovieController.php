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

        // Fetch reviews and include user info
        foreach ($movies as &$movie) {
            $reviews = $reviewModel->where('movie_id', $movie['id'])->findAll();
            foreach ($reviews as &$review) {
                $user = $userModel->find($review['user_id']);
                $review['username'] = $user ? $user['username'] : 'Unknown';
            }
            $movie['reviews'] = $reviews;
        }

        return view('movies/index', ['movies' => $movies]);
    }
}
