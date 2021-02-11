<?php


namespace Repository\Users;


use DTO\RequestModels\UserRegisterBindingModel;
use DTO\UserDTO;

interface UserRepositoryInterface
{
    public function register(UserRegisterBindingModel $model);
    public function getByUsername(string $username): ?UserDTO;
    public function getById(int $id): ?UserDTO;
}