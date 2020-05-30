<?php


namespace App\core;


interface RepositoryInterface {
    public function getById($id);
    public function getAll();
}
