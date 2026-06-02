<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Student extends BaseController
{
    public function index()
    {
        $model = new StudentModel();
        $data['students'] = $model->orderBy('id', 'DESC')->findAll();
        return view('layout/header')
            . view('students/index', $data)
            . view('layout/footer');
    }

    public function create()
    {
        return view('layout/header')
            . view('students/create')
            . view('layout/footer');
    }

    public function store()
    {
        $rules = [
            'student_number' => 'required',
            'first_name'     => 'required',
            'last_name'      => 'required',
            'email'          => 'required|valid_email',
            'course'         => 'required',
        ];

        if (! $this->validate($rules)) {
            return view('layout/header')
                . view('students/create', [
                    'validation' => $this->validator
                ])
                . view('layout/footer');
        }

        $model = new StudentModel();
        $model->insert([
            'student_number' => $this->request->getPost('student_number'),
            'first_name'     => $this->request->getPost('first_name'),
            'last_name'      => $this->request->getPost('last_name'),
            'email'          => $this->request->getPost('email'),
            'course'         => $this->request->getPost('course'),
        ]);

        return redirect()->to('/students');
    }

public function edit(int $id)    {
        $model = new StudentModel();
        $student = $model->find($id);

        if (! $student) {
            return redirect()->to('/students');
        }

        return view('layout/header')
            . view('students/edit', ['student' => $student])
            . view('layout/footer');
    }

public function update(int $id)
    {
        $rules = [
            'student_number' => 'required',
            'first_name'     => 'required',
            'last_name'      => 'required',
            'email'          => 'required|valid_email',
            'course'         => 'required',
        ];

        if (! $this->validate($rules)) {
            $model = new StudentModel();
            $student = $model->find($id);

            return view('layout/header')
                . view('students/edit', [
                    'student' => $student,
                    'validation' => $this->validator
                ])
                . view('layout/footer');
        }

        $model = new StudentModel();
        $model->update($id, [
            'student_number' => $this->request->getPost('student_number'),
            'first_name'     => $this->request->getPost('first_name'),
            'last_name'      => $this->request->getPost('last_name'),
            'email'          => $this->request->getPost('email'),
            'course'         => $this->request->getPost('course'),
        ]);

        return redirect()->to('/students');
    }

public function delete(int $id)    {
        $model = new StudentModel();
        $model->delete($id);
        return redirect()->to('/students');
    }
}