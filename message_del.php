<?php  
include_once("conn_sql.php");

if(isset($_POST['id'])){
  echo $message_del = mysql_query("DELETE FROM `message` WHERE `id` = {$_POST['id']} ");
}

?>