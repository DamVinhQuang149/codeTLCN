<?php 
class Protype extends Db{
    public function getAllProtype()
    {
    $sql = self::$connection->prepare("SELECT * FROM protypes");
    $sql->execute();//return an object
    $item = array();
    $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $item; 
    
    }
    public function getAProtypeById($type_id)
    {
    $sql = self::$connection->prepare("SELECT * FROM protypes WHERE `type_id` = ?");
    $sql->bind_param("i", $type_id);
    $sql->execute();//return an object
    $item = array();
    $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $item; //return an array
    }//return an array
}