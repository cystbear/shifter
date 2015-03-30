<?php

namespace Sleepness\Tests\Stubs;

class User
{
    private $id;
    private $firstName;
    private $secondName;
    private $phone;
    private $email;
    private $password;
    private $plainPassword;
    private $username;

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;
    }
    public function getSecondName()
    {
        return $this->secondName;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getUsername()
    {
        return $this->username;
    }
}
