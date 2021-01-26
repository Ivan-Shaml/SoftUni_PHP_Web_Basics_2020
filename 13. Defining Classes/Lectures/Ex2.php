<form method="post">
    Username: <input type="text" name="username"/><br>
    Password: <input type="password" name="password"/><br>
    <input type="submit" name="register" value="Register"><br>
</form>

<?php

if (isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $person = new Person($username, $password);
    echo $person;
}

class Person{
    private $username;
    private $password;

    /**
     * Person constructor.
     * @param $username
     * @param $password
     */
    public function __construct(string $username,string $password)
    {
        $this->setUsername($username);
        $this->setPassword($password);
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function __toString()
    {
        return $this->getUsername() . "<br />" . $this->getPassword();
    }

}
