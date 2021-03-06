<?php


namespace App\Http\Repositories\Eloquent;


use App\Http\Repositories\RepositoryInterface;

abstract class RepositoryEloquent implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    /**
     * @param mixed $model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->model->all();
    }

    public function getById($id)
    {
        // TODO: Implement getUserProfileById() method.
        return $this->model->find($id);
    }

    public function update($object)
    {
        // TODO: Implement update() method.
        $object->save();
    }

    public function create($object)
    {
        // TODO: Implement create() method.
        $object->save();

    }
    public function destroy($object)
    {
        // TODO: Implement destroy() method.
        $object->delete();
    }

}
