<?php


namespace Repository\Users;


use DTO\UserDTO;
use Database\DatabaseInterface;
use DTO\RequestModels\UserRegisterBindingModel;

class UserRepository implements UserRepositoryInterface
{
    /**@var DatabaseInterface*/
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function register(UserRegisterBindingModel $model)
    {
        $this->db->query("INSERT INTO users(username, password) VALUES (?, ?)")
            ->execute([$model->getUsername(), $model->getPassword()]);
    }

    public function getByUsername(string $username): ?UserDTO
    {
        $usr = $this->db->query("SELECT * FROM users WHERE username = ?")
            ->execute([$username])
            ->fetch(UserDTO::class);
        return $usr;
    }

    public function getById(int $id): ?UserDTO
    {
        return $this->db->query("SELECT * FROM users WHERE id = ?")
            ->execute([$id])
            ->fetch(UserDTO::class);
    }
}