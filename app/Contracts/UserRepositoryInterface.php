<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
   public function getAll();
   public function show($id);
   public function getByParams($params);
}
