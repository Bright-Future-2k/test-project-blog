<?php


namespace App\Repositories;


interface RepositoryInterface
{
    public function getAll();

    public function findById($id);

    public function create($obj);

    public function update($obj);

    public function destroy($obj);
}
