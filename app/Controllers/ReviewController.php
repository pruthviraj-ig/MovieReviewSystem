<?php
namespace App\Controllers;
use App\Models\ReviewModel;
use CodeIgniter\Controller;

class ReviewController extends Controller
{
    public function store()
    {
        $model = new ReviewModel();
        $model->save([
            'user_id' => session()->get('user_id'),
            'movie_id' => $this->request->getPost('movie_id'),
            'rating' => $this->request->getPost('rating'),
            'comment' => $this->request->getPost('comment'),
        ]);
        return redirect()->to('/movies');
    }
}
