<?php


namespace Controller;


class ProfileController
{
    public function register()
    {
        echo "this is register function";
    }

    public function login()
    {
        echo "this is login function";
    }

    public function editProfile($id)
    {
        echo "edit profile $id page opened";
        echo "<form method=post><input type='submit' /></form>";
    }

    public function editProfileProcess($id)
    {
        echo "form for $id profile edit submitted";
    }
}