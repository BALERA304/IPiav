<?php

function queryDatabase($query, $params = array())
{
    $host = 'localhost';
    $dbname = 'srv214820_Mytest';
    $user = 'srv214820_Admin';
    $password = 'Admin44478';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($query);
        $stmt->execute($params);

        if (strpos($query, 'INSERT') !== false) {
            return $conn->lastInsertId();
        } elseif (strpos($query, 'UPDATE') !== false || strpos($query, 'DELETE') !== false) {
            return $stmt->rowCount();
        } else {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}
