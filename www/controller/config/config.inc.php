<?php


class Config
{
    //เอาไว้สำหรับ Config Database
    private $db = array(
        "host" => "192.168.1.34",
        "username" => "root",
        "passwd" => "warrantypassword",
        "dbname" => "propump",
        "port" => "3306",
    );

    public function getDatabase()
    {
        return $this->db;
    }
}
