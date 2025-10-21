<?php

class Test extends Dbh
{
    public function selectUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            echo $row['name'] . "<br>";
            echo $row['sex'] . "<br>";
            echo $row['age'] . "<br>";
        }
        return true;
    }

    public function selectUsersStmt($name, $age)
    {
        $sql = "SELECT * FROM users WHERE name = ? and age = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $age]);
        $names =  $stmt->fetchAll();

        foreach ($names as $name) {
            echo $name['name'] . "<br>";
            echo $name['sex'] . "<br>";
            echo $name['age'] . "<br>";
        }

        return true;
    }


    public function setUsersStmt($name, $age, $sex)
    {
        $sql = "INSERT INTO users(name,age,sex) VALUES(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $age, $sex]);

        return true;
    }
}
