<?php

namespace App\Controllers;

use App\Models\ReviewModel;
use CodeIgniter\Controller;

class ReviewController extends Controller
{
    public function create($movie_id)
    {
        return view('reviews/create', ['movie_id' => $movie_id]);
    }

    public function store()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/users/login')->with('error', 'You must be logged in to submit a review.');
        }

        $reviewModel = new ReviewModel();
        $reviewModel->save([
            'movie_id' => $this->request->getPost('movie_id'),
            'user_id' => session()->get('user_id'),
            'rating' => $this->request->getPost('rating'),
            'comment' => $this->request->getPost('comment'),
        ]);

        return redirect()->to('/movies')->with('success', 'Review added successfully.');
    }

    public function delete($id)
    {
        $reviewModel = new ReviewModel();
        $review = $reviewModel->find($id);

        if ($review && session()->get('user_id') == $review['user_id']) {
            $reviewModel->delete($id);
            return redirect()->to('/movies')->with('success', 'Review deleted successfully.');
        }

        return redirect()->to('/movies')->with('error', 'You can only delete your own reviews.');
    }
}
