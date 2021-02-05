<?php

use \App\Data;

interface UserRepositoryInterface
{
    public function insert(Data\UserDTO $userDTO): bool;
    public function fundByUsername(string $username): UserDTO;
}