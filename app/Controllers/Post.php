<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PostModel;

class Post extends BaseController
{
    public function create()
    {
        helper('form');

        return view('templates/header').view('create').view('templates/footer');
    }

    public function new()
    {
        helper('form');

        $data = $this->request->getPost(['content', 'name']);

        if(!$this->validateData($data, [
            'content' => 'required|min_length[2]|max_length[5000]',
            'name' => 'required|min_length[2]|max_length[255]'
        ])) {
            return $this->create();
        }

        $post = $this->validator->getValidated();

        $model = new PostModel();

        $model->save([
            'content' => $post['content'],
            'name' => $post['name']
        ]);

        return redirect()->to('/');
    }
}
