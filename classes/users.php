
<?php
class Users extends Dbh
{
    protected function getUser($name)
    {
        $stmt = "SELECT * FROM users WHERE userName = ? ";
        $prepare = $this->connect()->prepare($stmt);
        $prepare->execute([$name]);

        $results = $prepare->fetchAll();
        return $results;
    }

    public function setUsers($name)
    {
        $sql = "INSERT INTO users(userName) VALUES(?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name]);

        return true;
    }
}
