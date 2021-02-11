<?php

namespace Services\Users;


use DTO\RequestModels\UserRegisterBindingModel;
use DTO\UserDTO;


interface UserServiceInterface
{

    public function register(UserRegisterBindingModel $userDTO);

    public function verifyCredentials(string $username, string $password): bool;

    public function findByUsername(string $username): UserDTO;

    public function findOne(int $id): UserDTO;
}