<?php


namespace App\Repositories\BaseRepository;


use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    protected function getModel()
    {
        return $this->setModel();
    }

    abstract protected function setModel();

    public function create($data)
    {
        $this->model->create($data);
    }

    public function getAll($orderBy = null)
    {
        if ($orderBy) {
            return $this->model->orderBy($orderBy)->get();
        }
        return $this->model->all();
    }

    public function getByID($id)
    {
        return $this->model->findOrFail($id);
    }
    public function delete($id)
    {
        $this->model->destroy($id);
    }
    public function update($obj, $data)
    {
        $obj->update($data);
    }
}
