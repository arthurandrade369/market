<?php

require_once("./connection-db.php");

class DataBaseFunction
{
    public static function getTableWithoutParam($table)
    {
        $sql = "SELECT * FROM" . $table;
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            $aws = $p_sql->fetch();
            return $aws;
        } else {
            return false;
        }
    }

    public static function getTableWithParam($table, $param, $var)
    {
        $sql = "SELECT * FROM" . $table . "WHERE" . $param . " = :param LIMIT 1";
        $p_sql = Connection::getInstance()->prepare($sql);
        $p_sql->bindValue('param', $var);
        $p_sql->execute();
        if ($p_sql->rowCount() > 0) {
            $aws = $p_sql->fetch();
            return $aws;
        } else {
            return false;
        }
    }
}
