<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class User extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function signup()
    {
        return view('templates/header').view('signup').view('templates/footer');
    }

    public function register()
    {
        $data = $this->request->getPost(['name', 'username', 'email', 'password', 'confirm']);

        if(!$this->validateData($data, [
            'name' => 'required|min_length[2]|max_length[255]',
            'username' => 'required|min_length[3]|max_length[255]|is_unique[users.username]',
            'email' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[255]',
            'confirm' => 'required|matches[password]'
        ])) {
            return $this->signup();
        }

        $post = $this->validator->getValidated();

        $data = [
            'name' => $post['name'],
            'username' => $post['username'],
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_BCRYPT)
        ];

        $model = new UserModel();

        $model->insert($data);

        return redirect()->to(base_url('/login'));
    }

    public function login()
    {
        return view('templates/header').view('login').view('templates/footer');
    }

    public function authenticate()
    {
        $model = new UserModel();

        $data = $this->request->getPost(['username', 'password']);

        if(!$this->validateData($data, [
            'username' => 'required',
            'password' => 'required',
        ])) {
            return $this->login();
        }

        $user = $model->where('username', $data['username'])->first();

        if(is_null($user)) {
            session()->setFlashdata('error', 'Username does not exist');

            return $this->login();
        }

        if(!password_verify($data['password'], $user['password'])) {
            session()->setFlashdata('error', 'Password is incorrect');

            return $this->login();
        }

        $session_data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'username' => $user['username'],
            'email' => $user['email'],
            'loggedIn' => true
        ];

        session()->set($session_data);

        return redirect()->to(base_url('/home'));
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url());
    }

    public function profile($username)
    {
        $userModel = new UserModel();
        $postModel = new PostModel();

        if(!$userModel->getUser($username)) {
            return throw new PageNotFoundException('User does not exist');
        }

        $data = [
            'user' => $userModel->getUser($username),
            'posts' => $postModel->getUsersPosts($username)
        ];

        return view('templates/header', $data).view('profile').view('templates/footer');
    }

    public function updateProfile($data = [])
    {
        return view('templates/header', $data).view('update_profile').view('templates/footer');
    }

    public function updateProfileData()
    {
        $data = $this->request->getPost(['name', 'email']);

        $data['id'] = session()->get('id');

        if(!$this->validateData($data, [
            'id' => 'is_natural_no_zero',
            'name' => 'required|min_length[2]|max_length[255]',
            'email' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email,id,{id}]'
        ])) {
            $data['errors'] = validation_errors();

            return $this->updateProfile($data);
        }

        $post = $this->validator->getValidated();

        $model = new UserModel();

        $model->update(session()->get('id'), $post);

        $session_data   = [
            'name' => $post['name'],
            'email' => $post['email']
        ];

        session()->set($session_data);

        session()->setFlashdata('message', 'Your Profile has been updated');

        return redirect()->to(base_url('/update-profile'));
    }

    public function uploadProfilePicture()
    {
        $rules = [
            'picture' => [
                'label' => 'Profile Picture',
                'rules' => [
                    'uploaded[picture]',
                    'is_image[picture]',
                    'mime_in[picture,image/jpg,image/jpeg,image/png,image/webp]',
                    'max_size[picture, 1024]'
                ]
            ]
        ];

        if(!$this->validateData([], $rules)) {
            $data['image_errors'] = $this->validator->getErrors();

            return $this->updateProfile($data);
        }

        $file = $this->request->getFile('picture');

        if(!$file->hasMoved()) {
            $file->move('./uploads/profile-pictures');

            $data = [
                'id' => session()->get('id'),
                'profile_picture' => $file->getName()
            ];

            $model = new UserModel();

            $model->save($data);

            session()->setFlashdata('message', 'Profile picture uploaded');

            return redirect()->to(base_url('/update-profile'));
        }

        $data = ['image_errors' => 'The file has already been uploaded'];

        return $this->updateProfile($data);
    }

    public function changePassword()
    {
        $data = $this->request->getPost(['current_password', 'new_password', 'confirm']);

        if(!$this->validateData($data, [
            'current_password' => 'required|min_length[4]|max_length[255]',
            'new_password' => 'required|min_length[4]|max_length[255]',
            'confirm' => 'required|matches[new_password]',
        ])) {
            $data['password_errors'] = validation_errors();

            return $this->updateProfile($data);
        }

        $model = new UserModel();

        $user = $model->where('username', session()->get('username'))->first();

        if(!password_verify($data['current_password'], $user['password'])) {
            session()->setFlashdata('password-error', 'Enter your current password correctly');

            return $this->updateProfile();
        }

        $post = $this->validator->getValidated();

        $data = [
            'password' => password_hash($post['new_password'], PASSWORD_BCRYPT)
        ];

        $model->update(session()->get('id'), $data);

        session()->setFlashdata('message', 'Your Password has been updated');

        return redirect()->to(base_url('/update-profile'));
    }

    public function deleteProfile()
    {
        $data = $this->request->getPost(['confirm_password']);

        if(!$this->validateData($data, [
            'confirm_password' => 'required',
        ])) {
            $data['delete_errors'] = validation_errors();

            return $this->updateProfile($data);
        }

        $model = new UserModel();

        $user = $model->where('username', session()->get('username'))->first();

        if(!password_verify($data['confirm_password'], $user['password'])) {
            session()->setFlashdata('delete-error', 'Enter your password correctly');

            return $this->updateProfile();
        }

        $model->delete(session()->get('id'));

        return $this->logout();
    }
}
