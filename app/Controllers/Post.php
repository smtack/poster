<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\CommentModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Post extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function index()
    {
        $model = new PostModel();

        $data = ['posts' => $model->getPosts()];

        return view('templates/header', $data).view('index').view('templates/footer');
    }

    public function create()
    {
        return view('templates/header').view('create').view('templates/footer');
    }

    public function new()
    {
        $data = $this->request->getPost(['content']);

        $file = $this->request->getFile('image');

        $rules = [];

        if($file != '') {
            $rules += [
                'image' => [
                    'label' => 'Post Image',
                    'rules' => [
                        'uploaded[image]',
                        'is_image[image]',
                        'mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
                        'max_size[image, 1024]'
                    ]
                ]
            ];
        }

        $rules += ['content' => 'required|min_length[2]|max_length[5000]'];

        if(!$this->validateData($data, $rules)) {
            return $this->create();
        }

        $post = $this->validator->getValidated();

        $data = [];

        if($file != '') {
            if(!$file->hasMoved()) {
                $file->move('./uploads/post-images');

                $data += ['post_image' => $file->getName()];
            } else {
                session()->setFlashData('error', 'The file has already been uploaded');
                
                return $this->create();
            }
        }

        $data += [
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
        $commentModel = new CommentModel();

        if(!$model->getPost($id)) {
            throw new PageNotFoundException($id);
        }

        $data = [
            'post' => $model->getPost($id),
            'comments' => $commentModel->getComments($id)
        ];

        return view('templates/header', $data).view('post').view('templates/footer');
    }

    public function edit($id)
    {
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
        $data = $this->request->getPost(['content']);

        $file = $this->request->getFile('image');

        $rules = [];

        if($file != '') {
            $rules += [
                'image' => [
                    'label' => 'Post Image',
                    'rules' => [
                        'uploaded[image]',
                        'is_image[image]',
                        'mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
                        'max_size[image, 1024]'
                    ]
                ]
            ];
        }

        $rules += ['content' => 'required|min_length[2]|max_length[5000]'];

        if(!$this->validateData($data, $rules)) {
            return $this->edit($id);
        }

        $post = $this->validator->getValidated();
        
        $data = [];

        if($file != '') {
            if(!$file->hasMoved()) {
                $file->move('./uploads/post-images');

                $data += ['post_image' => $file->getName()];
            } else {
                session()->setFlashData('error', 'The file has already been uploaded');
                
                return $this->create();
            }
        }
        
        $data += [
            'id' => $id,
            'content' => $post['content']
        ];
        
        $model = new PostModel();

        $model->save($data);

        return redirect()->to(base_url());
    }

    public function delete($id)
    {
        $model = new PostModel();

        $model->delete($id);

        return redirect()->to(base_url());
    }

    public function comment($id)
    {
        $data = $this->request->getPost(['comment']);

        if(!$this->validateData($data, ['comment' => 'required|min_length[2]|max_length[1000]'])) {
            return $this->post($id);
        }

        $comment = $this->validator->getValidated();

        $data = [
            'comment' => $comment['comment'],
            'comment_by' => session()->get('username'),
            'comment_post' => $id
        ];

        $model = new CommentModel();

        $model->insert($data);

        return redirect()->to(base_url('/post/' . $id));
    }

    public function editComment($id)
    {
        $model = new CommentModel();

        if(!$model->getComment($id)) {
            throw new PageNotFoundException();
        } else if($model->getComment($id)['comment_by'] !== session()->get('username')) {
            return redirect()->back();
        }

        $data = ['comment' => $model->getComment($id)];

        return view('templates/header', $data).view('edit_comment').view('templates/footer');
    }

    public function updateComment($id)
    {
        $data = $this->request->getPost(['comment']);

        if(!$this->validateData($data, ['comment' => 'required|min_length[2]|max_length[1000]'])) {
            return $this->editComment($id);
        }

        $comment = $this->validator->getValidated();

        $model = new CommentModel();

        $comment_post = $model->getComment($id)['comment_post'];

        $model->update($id, $comment);

        return redirect()->to(base_url('/post/' . $comment_post));
    }

    public function deleteComment($id)
    {
        $model = new CommentModel();

        $comment_post = $model->getComment($id)['comment_post'];

        $model->delete($id);

        return redirect()->to(base_url('/post/' . $comment_post));
    }
}
