<?php


namespace App\Repositories\impl;


use App\Repositories\BaseRepository\BaseRepository;
use App\Repositories\UserRepoInterface;
use App\User;

class UserRepoImpl extends BaseRepository implements UserRepoInterface
{

    protected function setModel()
    {
        return new User();
    }
}
