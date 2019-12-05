<?php


namespace App\Repositories\impl;


use App\Repositories\BaseRepository\BaseRepository;
use App\Repositories\UnitRepoInterface;
use App\Unit;

class UnitRepoImpl extends BaseRepository implements UnitRepoInterface
{

    protected function setModel()
    {
        return new Unit();
    }
}
