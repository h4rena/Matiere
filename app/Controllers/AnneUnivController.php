<?php

namespace App\Controllers;

use App\Models\AnneUnivModel;

class AnneUnivController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new AnneUnivModel();
    }

    public function index()
    {
        return $this->response->setJSON($this->model->findAll());
    }

    public function show($id = null)
    {
        $item = $this->model->find($id);
        if (!$item) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Not found']);
        }
        return $this->response->setJSON($item);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $id = $this->model->insert($data);
        return $this->response->setJSON(['id' => $id]);
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $this->model->update($id, $data);
        return $this->response->setJSON(['updated' => $id]);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->response->setStatusCode(204);
    }
}
