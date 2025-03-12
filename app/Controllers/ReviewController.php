<?php
namespace App\Controllers;

use App\Models\ReviewModel;
use CodeIgniter\Controller;

class ReviewController extends Controller
{
    public function create($movie_id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/users/login')->with('error', 'You must be logged in to submit a review.');
        }

        return view('reviews/create', ['movie_id' => $movie_id]);
    }

    public function store()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/users/login')->with('error', 'You must be logged in to submit a review.');
        }

        $model = new ReviewModel();
        $model->save([
            'movie_id' => $this->request->getPost('movie_id'),
            'user_id' => session()->get('user_id'),
            'rating' => $this->request->getPost('rating'),
            'comment' => $this->request->getPost('comment')
        ]);

        return redirect()->to('/movies')->with('success', 'Review added successfully.');
    }

    public function delete($id)
    {
        $model = new ReviewModel();
        $review = $model->find($id);

        if ($review && $review['user_id'] == session()->get('user_id')) {
            $model->delete($id);
            return redirect()->to('/movies')->with('success', 'Review deleted successfully.');
        }

        return redirect()->to('/movies')->with('error', 'Unauthorized action.');
    }
}
