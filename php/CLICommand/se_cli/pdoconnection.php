<?php
/**
 * SE CLI ile oluşturuldu.
 *
 * @fileName  %s
 * @createdAt %s
 *
 */

const HOST = '%s';
const DBNAME = '%s';
const DBUSER = '%s';
const DBPASSWORD = '%s';


try{
    $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';',DBUSER,DBPASSWORD);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $db->query('SET @@lc_time_names = "tr_TR";');
    $db->query('SET CHARACTER SET utf8mb4');
    $db->query('SET CHARACTER_SET_CONNECTION=utf8mb4');


}catch (PDOException $e){
    echo $e->getMessage();
}