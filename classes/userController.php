<?php

class UserController extends Users
{

    public function  createUser($name)
    {
        $insert =    $this->setUsers($name);

        if ($insert) {
            echo "inserted" . $name . "successfully";
        }
    }
}
