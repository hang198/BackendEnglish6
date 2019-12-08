<?php


namespace App\Repositories\impl;


use App\Unit;
use App\Repositories\BaseRepository\BaseRepository;
use App\Repositories\UnitRepoInterface;

class UnitRepoImpl extends BaseRepository implements UnitRepoInterface
{

    protected function setModel()
    {
        return new Unit();
    }

}
