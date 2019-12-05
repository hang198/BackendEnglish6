<?php


namespace App\services\impl;


use App\Repositories\RoleRepoInterface;
use App\services\RoleServiceInterface;

class RoleServiceImpl implements RoleServiceInterface
{
    protected $roleRepo;

    public function __construct(RoleRepoInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }
    public function getAll() {
        return $this->roleRepo->getAll();
    }

    public function create($data)
    {
        // TODO: Implement create() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function update($data, $id)
    {

    }

    public function getByID($id)
    {
        // TODO: Implement getByID() method.
    }
}
