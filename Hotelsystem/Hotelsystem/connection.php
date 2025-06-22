<?php

$d = new DateTime();
$tz = new DateTimeZone("Asia/colombo");
$d->setTimezone($tz);

$dateTime = $d->format("Y-m-d H:i:s");
$currentDate = $d->format("Y-m-d");
$currentMonth = date('F');
$currentYear = date("Y");
$currentMonthNumber = date('m');
$currentTime = date("H:i");

class Database
{
    public static $connection;

    public static function setUpConnection()
    {
        if (!isset(Database::$connection)) {
            Database::$connection = new mysqli("localhost:3308", "role", "pass", "hotel");
        }
    }

    public static function iud($sql)
    {

        Database::setUpConnection();
        Database::$connection->query($sql);

    }

    public static function search($sql)
    {

        Database::setUpConnection();
        $resalt_set = Database::$connection->query($sql);
        return $resalt_set;

    }
}
?>