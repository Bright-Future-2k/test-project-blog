<?php


namespace App\Repositories\Impl;


use App\Profile;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\ProfileRepositoryInterface;

class ProfileRepositoryImpl extends EloquentRepository implements ProfileRepositoryInterface
{

    public function getModel()
    {
        $model = Profile::class;
        return $model;
    }
}
