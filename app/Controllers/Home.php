<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
    public function index(): string
    {
        $model = new PostModel();

        $data = ['posts' => $model->getPosts()];

        return view('templates/header', $data).view('index').view('templates/footer');
    }
}
