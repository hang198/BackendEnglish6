<?php


namespace App\Repositories\impl;


use App\Repositories\BaseRepository\BaseRepository;
use App\Repositories\RoleRepoInterface;
use App\Role;

class RoleRepoImpl extends BaseRepository implements RoleRepoInterface
{

    protected function setModel()
    {
        return new Role();
    }
}
