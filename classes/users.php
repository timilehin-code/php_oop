
<?php
class Users extends Dbh
{
    protected function getUser($name)
    {
        $stmt = "SELECT * FROM users WHERE name = ? ";
        $prepare = $this->connect()->prepare($stmt);
        $prepare->execute([$name]);
        
        $results = $prepare->fetchAll();
        return $results;
    }

        public function setUsers($name, $age, $sex)
    {
        $sql = "INSERT INTO users(name,age,sex) VALUES(?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $age, $sex]);

        return true;
    }
}
