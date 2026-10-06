<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['title'] = 'User Accounts';
        $data['users'] = $model->orderBy('id', 'ASC')->findAll();

        return view('users/index', $data);
    }

    public function new()
    {
        helper('form');
        $data['title'] = 'New User';

        return view('users/new', $data);
    }

    public function create()
    {
        helper('form');

        $rules = [
            'username'  => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $model->insert([
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/users')->with('message', 'User added.');
    }

    public function edit($id)
    {
        helper('form');
        $model = new UserModel();
        $user = $model->find($id);

        if ($user === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['title'] = 'Edit User';
        $data['user']  = $user;

        return view('users/edit', $data);
    }

    public function update($id)
    {
        helper('form');

        $rules = [
            'username'  => "required|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $model->update($id, [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ]);

        return redirect()->to('/users')->with('message', 'User updated.');
    }

}