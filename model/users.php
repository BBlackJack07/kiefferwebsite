<?php

class User
{
    public int $id;
    public string $username;
    public string $password;
}

class UsersRepository extends Model
{
    public function getUser(int $id): User
    {
        $this->dbConnect();
        $statement = $this->database->prepare (
            "SELECT id,username,password FROM users WITH id=?");
        $statement->execute([$id])
        $user = new User();
        $row = $statement->fetch();
        $user->id = $row['id'];
        $user->username = $row['username'];
        $user->password = $row['password'];
        return $user;
    }

    public function createUser(string $username,string $password)
    {
        $this->dbConnect();
        $statement = $this->database->prepare (
            "INSERT INTO users (username,password) VALUES(?,?)");
        $statement->execute([$username,$password]);
    }
}

