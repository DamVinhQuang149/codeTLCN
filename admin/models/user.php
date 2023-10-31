<?php
class User extends Db
{
    public function getAllUser()
    {
        $sql = self::$connection->prepare("SELECT * FROM `users`");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllUserDESC()
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` ORDER BY `user_id` DESC");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function addUserNoImage($first_name, $last_name, $email, $phone, $username, $password, $role_id)
    {
        $sql = self::$connection->prepare("INSERT INTO `users`(`image`,`First_name`,`Last_name`, `email`, `phone`, `username`, `password`, `role_id`) VALUES('avatar7.png',?,?,?,?,?,?,?)");
        $password = md5($password);
        $sql->bind_param("sssissi", $first_name, $last_name, $email, $phone, $username, $password, $role_id);
        return $sql->execute(); //return an object
    }
    public function addUser($first_name, $last_name, $email, $phone, $username, $password, $role_id, $image)
    {
        $sql = self::$connection->prepare("INSERT INTO `users`(`First_name`,`Last_name`,`email`,`phone`,`username`, `password`, `role_id`,`image`) VALUES(?,?,?,?,?,?,?,?)");
        $password = md5($password);
        $sql->bind_param("sssissis", $first_name, $last_name, $email, $phone, $username, $password, $role_id,$image);
        return $sql->execute(); //return an object
    }
    public function deleteUser($user_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `users` WHERE `user_id`=?");
        $sql->bind_param("i", $user_id);
        return $sql->execute();
    }
    public function getUserById($user_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM users WHERE user_id = " . $user_id);
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function updateUser($first_name, $last_name, $email, $phone, $username, $password, $role_id, $image, $user_id)
    {
        $sql = self::$connection->prepare("UPDATE `users` SET `First_name`=?, `Last_name`=?,`email`=?,`phone`=?,`username`=?, `password`=?, `role_id`=? ,`image` =? WHERE `user_id`=?");
        $password = md5($password);
        $sql->bind_param("sssissisi", $first_name, $last_name, $email, $phone, $username, $password, $role_id, $image, $user_id);
        return $sql->execute(); //return an object
    }
    public function updateUserNoImage($first_name, $last_name, $email, $phone, $username, $password, $role_id,  $user_id)
    {
        $sql = self::$connection->prepare("UPDATE `users` SET `First_name`=?, `Last_name`=?,`email`=?,`phone`=?,`username`=?, `password`=?, `role_id`=?  WHERE `user_id`=?");
        $password = md5($password);
        $sql->bind_param("sssissii", $first_name, $last_name, $email, $phone, $username, $password, $role_id,  $user_id);
        return $sql->execute(); //return an object
    }
    public function updateUserNoChangePassword($first_name, $last_name,$email, $phone, $username,  $role_id, $image, $user_id)
    {
        $sql = self::$connection->prepare("UPDATE `users` SET `First_name`=?, `Last_name`=?,`email`=?,`phone`=?,`username`=?, `role_id`=? ,`image` =? WHERE `user_id`=?");

        $sql->bind_param("sssisisi", $first_name, $last_name,$email, $phone, $username,  $role_id, $image, $user_id);
        return $sql->execute(); //return an object
    }
    public function updateUserNoChangePasswordNoImage($first_name, $last_name,$email, $phone, $username,  $role_id, $user_id)
    {
        $sql = self::$connection->prepare("UPDATE `users` SET `First_name`=?, `Last_name`=?,`email`=?,`phone`=?,`username`=?, `role_id`=? WHERE `user_id`=?");

        $sql->bind_param("sssisii", $first_name, $last_name,$email, $phone, $username,  $role_id, $user_id);
        return $sql->execute(); //return an object
    }

    public function getPasswordByID($user_id)
    {
        $sql = self::$connection->prepare("SELECT `password` FROM users WHERE user_id = " . $user_id);
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
}