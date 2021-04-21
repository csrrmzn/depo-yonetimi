<?php
namespace vivense\db;

use PDOException;

class Database
{   //Class Başladı
    private $MYSQL_HOST='localhost';
    private $MYSQL_USER='root';
    private $MYSQL_PASS='';
    private $MYSQL_DB='vivense';
    private $CHARSET='UTF8';
    private $COLLACTION='utf8_general_ci';
    private $db=null;
    private $stmt=null;

    public function ConnectDB()
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
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }   //Bağlantı Sonu

    public function __construct() //Otomatik olarak çalışıcaktır
    {
        $this->ConnectDB();
    }
    
    //Select Fonksiyonları
    private function myQuery($query,$params)
    {
        if (is_null($params)) {

                $this->stmt=$this->db->query($query);
            }else {
                
                $this->stmt=$this->db->prepare($query);
                $this->stmt->execute($params);
            }
            return $this->stmt;
    }

    public function getRows($query,$params=null)
    {   //Çoklu Veri Kullanımı
        try {
            
            return $this->myQuery($query,$params)->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getRow($query,$params=null) 
    {   //Tekli Veri Kullanımı
        try {
            return $this->myQuery($query,$params)->fetch();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getColumn($query,$params=null)
    {   //Tek Satır ve Tek Sütun Veri Kullanımı
        try {
            return $this->myQuery($query,$params)->fetchColumn();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Insert Fonksiyonları
    public function Insert($query,$params=null)
    {   //Ekleme Fonksiyonu
        try {
            return $this->myQuery($query,$params);
            return $this->db->lastInsertId();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Update Fonksiyonları
    public function Update($query,$params=null)
    {   //Güncelleme Fonksiyonu
        try {
            return $this->myQuery($query,$params)->rowCount();
            //return $this->db->rowCount();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Delete Fonksiyonları
    public function Delete($query,$params=null)
    {   //Silme Fonksiyonu
            return $this->Update($query,$params);
    }

    public function __destruct()
    {
        //Bağlantıyı Kapatma
        $this->db=NULL;
            
    }

} //Class Sonu