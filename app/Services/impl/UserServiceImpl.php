<?php


namespace App\services\impl;


use App\Repositories\UserRepoInterface;
use App\services\UserServiceInterface;

class UserServiceImpl implements UserServiceInterface
{
    private $userRepo;

    public function __construct(UserRepoInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function create($data)
    {
        // TODO: Implement create() method.
    }

    public function getAll()
    {
        $users = $this->userRepo->getAll();
        return $users;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function update($request, $id)
    {

    }

    public function getByID($id)
    {
        return $this->userRepo->getByID($id);
    }

}
