<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

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

        $data = $this->request->getPost(['content']);

        if(!$this->validateData($data, ['content' => 'required|min_length[2]|max_length[5000]'])) {
            return $this->create();
        }

        $post = $this->validator->getValidated();

        $data = [
            'content' => $post['content'],
            'post_by' => session()->get('username')
        ];

        $model = new PostModel();

        $model->insert($data);

        return redirect()->to(base_url());
    }

    public function post($id)
    {
        $model = new PostModel();

        if(!$model->getPost($id)) {
            throw new PageNotFoundException($id);
        }

        $data = ['post' => $model->getPost($id)];

        return view('templates/header', $data).view('post').view('templates/footer');
    }

    public function edit($id)
    {
        helper('form');

        $model = new PostModel();

        if(!$model->getPost($id)) {
            throw new PageNotFoundException($id);
        } else if($model->getPost($id)['post_by'] !== session()->get('username')) {
            return redirect()->back();
        }

        $data = ['post' => $model->getPost($id)];

        return view('templates/header', $data).view('edit').view('templates/footer');
    }

    public function update($id)
    {
        helper('form');

        $data = $this->request->getPost(['content']);

        if(!$this->validateData($data, ['content' => 'required|min_length[2]|max_length[5000]'])) {
            return $this->edit($id);
        }

        $post = $this->validator->getValidated();
        
        $model = new PostModel();

        $model->update($id, $post);

        return redirect()->to(base_url());
    }

    public function delete($id)
    {
        $model = new PostModel();

        $model->delete($id);

        return redirect()->to(base_url());
    }
}
