<?php


namespace DTO\ViewModels;


class UserProfileViewModel
{
    private $username;

    /**
     * UserProfileViewModel constructor.
     * @param $username
     */
    public function __construct($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

}