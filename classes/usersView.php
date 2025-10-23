<?php
class UsersView extends Users
{
    public function showUser($name)
    {
        $results = $this->getUser($name);
        echo "Name:" . $results[0]['name'] . " " . $results[0]['sex'] . " " . $results[0]['age'];
    }
    
}
