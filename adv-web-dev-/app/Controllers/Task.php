<?php

namespace App\Controllers;
use App\Models\TaskModel;

class Task extends BaseController {

    public function index() {
        if(!session()->get('user_id')) return redirect()->to('/login');

        $model = new TaskModel();
        $data['tasks'] = $model->where('user_id', session()->get('user_id'))->findAll();

        return view('tasks/index', $data);
    }

    public function create() {
        return view('tasks/create');
    }

    public function store() {
        $model = new TaskModel();

        $model->save([
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'user_id' => session()->get('user_id')
        ]);

        return redirect()->to('/tasks');
    }

    public function delete($id) {
        $model = new TaskModel();
        $model->delete($id);
        return redirect()->to('/tasks');
    }
}