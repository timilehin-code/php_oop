<?php

class UserController extends Users
{

    public function  createUser($name, $age, $sex)
    {
        $insert =    $this->setUsers($name, $age, $sex);

        if ($insert) {
            echo "inserted" . $name . "successfully";
        }
    }
}
