<?php

namespace App\Controllers;

use App\Models\ParcoursModel;

class ParcoursController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ParcoursModel();
    }

    public function index() { return $this->response->setJSON($this->model->findAll()); }
    public function show($id = null) { $item = $this->model->find($id); if (!$item) return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']); return $this->response->setJSON($item); }
    public function store() { $id = $this->model->insert($this->request->getPost()); return $this->response->setJSON(['id' => $id]); }
    public function update($id = null) { $this->model->update($id, $this->request->getRawInput()); return $this->response->setJSON(['updated' => $id]); }
    public function delete($id = null) { $this->model->delete($id); return $this->response->setStatusCode(204); }
}
