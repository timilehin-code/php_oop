<?php

try {
    $dbh = new Dbh();
    $conn =  $dbh->getConn();
} catch (PDOException $th) {
    echo $th->getMessage();
}
