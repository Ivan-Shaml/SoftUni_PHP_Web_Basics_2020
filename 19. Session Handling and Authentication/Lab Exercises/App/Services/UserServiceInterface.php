<?php


interface UserServiceInterface
{
    public function register(\App\Data\UserDTO $userDTO, string $confirmPassword) : bool;
}