<?php


namespace Controller;


class UsersController
{
    public function register()
    {
        echo "this is register function";
    }

    public function login()
    {
        echo "this is login function";
    }

    public function profile()
    {
        echo "profile page opened";
    }

    // profile/(.*?)/edit GET
    public function editProfile($id)
    {
        echo "edit profile $id page opened";
        echo "<form method=post><input type='submit' /></form>";
    }

    // profile/(.*?)/edit POST
    public function editProfileProcess($id)
    {
        echo "form for $id profile edit submitted";
    }
}