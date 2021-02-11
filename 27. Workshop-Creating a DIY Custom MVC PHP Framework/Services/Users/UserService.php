<?php

namespace Services\Users;


use Data\Users\UserEditDTO;
use Exception\User\EditProfileException;
use Exception\User\RegistrationException;
use Exception\User\UploadException;
use Repository\Users\UserRepositoryInterface;
use Services\Encryption\EncryptionServiceInterface;
use DTO\RequestModels\UserRegisterBindingModel;
use DTO\UserDTO;


class UserService implements UserServiceInterface
{
    const MIN_USER_LENGTH = 5;
    const MAX_ALLOWED_SIZE = 30000;
    const ALLOWED_IMAGE_PREFIX = 'image/';

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryptionService;

    public function __construct(UserRepositoryInterface $userRepository, EncryptionServiceInterface $encryptionService)
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
    }

    public function register(UserRegisterBindingModel $userDTO)
    {
        if ($userDTO->getPassword() != $userDTO->getConfirmPassword()) {
            throw new RegistrationException("Password mismatch");
            echo "this";
        }

        if (strlen($userDTO->getUsername()) < self::MIN_USER_LENGTH) {
            throw new RegistrationException("User length too short");
        }

        $passwordHash = $this->encryptionService->hash($userDTO->getPassword());
        $userDTO->setPassword($passwordHash);

        $this->userRepository->register($userDTO);
    }

    public function verifyCredentials(string $username, string $password): bool
    {
        $user = $this->userRepository->getByUsername($username);
        if (null === $user) {
            return false;
        }

        return $this->encryptionService->verify($password, $user->getPassword());
    }

    public function findByUsername(string $username): UserDTO
    {
        return $this->userRepository->getByUsername($username);
    }

    public function findOne(int $id): UserDTO
    {
        return $this->userRepository->getById($id);
    }

}