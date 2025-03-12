<?php
namespace App\Controllers;

use App\Models\ReviewModel;
use CodeIgniter\Controller;

class ReviewController extends Controller
{
    public function create()
    {
        return view('reviews/create', ['movie_id' => $this->request->getGet('movie_id')]);
    }

    public function store()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/users/login')->with('error', 'You must be logged in to submit a review.');
        }

        $reviewModel = new ReviewModel();
        $reviewModel->save([
            'user_id' => session()->get('user_id'),
            'movie_id' => $this->request->getPost('movie_id'),
            'rating' => $this->request->getPost('rating'),
            'comment' => $this->request->getPost('comment'),
        ]);

        return redirect()->to('/movies')->with('success', 'Review added successfully.');
    }

    public function delete($id)
    {
        $reviewModel = new ReviewModel();
        $review = $reviewModel->find($id);

        if (!$review) {
            return redirect()->to('/movies')->with('error', 'Review not found.');
        }

        if ($review['user_id'] != session()->get('user_id')) {
            return redirect()->to('/movies')->with('error', 'You cannot delete this review.');
        }

        $reviewModel->delete($id);
        return redirect()->to('/movies')->with('success', 'Review deleted successfully.');
    }
}
