<?php

use \App\Data\UserDTO;

class UserService implements UserServiceInterface
{
    private $userRepository;

    /**
     * UserService constructor.
     * @param $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if ($userDTO->getPassword() !== $confirmPassword){
            return false;
        }

        if (null !== $this->userRepository->fundByUsername($userDTO->getUsername())){
            return false;
        }

        password_hash($userDTO->getPassword(), PASSWORD_ARGON2ID);

        return true;
    }
}