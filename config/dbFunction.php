<?php

require_once(__DIR__ . "/./connection-db.php");

class DataBaseFunction
{
    public static function getTableWithoutParam(string $table)
    {
        $sql = "SELECT * FROM " . $table;
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            $aws = $p_sql->fetch();
            return $aws;
        } else {
            return false;
        }
    }

    public static function getTableWithParam(string $table, string $param, string $var)
    {
        $sql = "SELECT * FROM ". $table ."WHERE :param = :var LIMIT 1";
        var_dump($sql);
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('table', $table);
        $p_sql->bindValue('param', $param);
        $p_sql->bindValue('var', $var);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            $aws = $p_sql->fetch();
            return $aws;
        } else {
            return false;
        }
    }
}
