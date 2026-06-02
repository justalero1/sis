<?php

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;
use App\Models\TaskModel;

class TaskApi extends ResourceController {

    public function index() {
        $model = new TaskModel();
        return $this->respond($model->findAll());
    }

    public function create() {
        $data = $this->request->getJSON();

        $model = new TaskModel();
        $model->save([
            'title' => $data->title,
            'description' => $data->description,
            'status' => 'pending'
        ]);

        return $this->respond(['message'=>'Task Created']);
    }

    public function update($id = null) {
        $data = $this->request->getJSON();

        $model = new TaskModel();
        $model->update($id, [
            'status' => $data->status
        ]);

        return $this->respond(['message'=>'Updated']);
    }

    public function delete($id = null) {
        $model = new TaskModel();
        $model->delete($id);

        return $this->respond(['message'=>'Deleted']);
    }
}