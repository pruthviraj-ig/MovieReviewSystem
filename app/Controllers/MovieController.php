<?php
namespace App\Controllers;
use App\Models\MovieModel;
use CodeIgniter\Controller;

class MovieController extends Controller
{
    public function index()
    {
        $model = new MovieModel();
        $data['movies'] = $model->findAll();
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
