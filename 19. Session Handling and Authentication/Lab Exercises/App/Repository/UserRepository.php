<?php

use \Database\DatabaseInterface;
use \App\Data\UserDTO;

class UserRepository implements UserRepositoryInterfacepublic
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $database
     */
    public function __construct(DatabaseInterface $database)
    {
        $this->db = $database;
    }


    function insert(UserDTO $userDTO): bool
    {
        $this->db->query("
            INSERT INTO users(username, password)
             VALUES(?, ?)
            ")->execute([
                $userDTO->getUsername(),
                $userDTO->getPassword()
            ]);

            return true;
    }

    public function fundByUsername(string $username): UserDTO
    {
        // TODO: Implement fundByUsername() method.
    }

}