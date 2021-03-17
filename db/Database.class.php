<?php
namespace vivense\db;

class Database
{
    private $MYSQL_HOST='localhost';
    private $MYSQL_USER='root';
    private $MYSQL_PASS='';
    private $MYSQL_DB='vivense';
    private $CHARSET='UTF8';
    private $COLLACTION='utf8_general_ci';
    private $db=null;

    public function __construct()
    {
        //Bağlantı Aç
        $SQL="mysql:host=".$this->MYSQL_HOST.";dbname=".$this->MYSQL_DB;
        
        try {
            $this->db=new \PDO($SQL,$this->MYSQL_USER,$this->MYSQL_PASS);
            $this->db->exec("SET NAMES '".$this->CHARSET."' COLLATE '".
            $this->COLLACTION."'");
            $this->db->exec("SET CHARACTER SET '".$this->CHARSET."'");
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function __destruct()
    {
        //Bağlantıyı Kapatma
        $this->db=NULL;
            
    }

}

?>