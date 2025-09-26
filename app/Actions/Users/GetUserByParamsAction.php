<?php

namespace App\Actions\Users;

use App\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;

class GetUserByParamsAction
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {}

    public function execute($key, $data)
    {
        $params = [
            'column' => $key,
            'value'  => $data[$key]
        ];

        return $this->userRepository->getByParams($params);
    }
}
