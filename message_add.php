<?php  
include_once("conn_sql.php");

if(isset($_POST['name']) && $_POST['name'] == ""){
  echo "<script>alert('請輸入留言者')</script>";
  if(isset($_POST['msg']) && $_POST['msg'] == ""){
	echo "<script>alert('請輸入留言內容')</script>";
  }
}
if(isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['msg']) && $_POST['msg'] != ""){
  $add_message = mysql_query("INSERT INTO `message` (`name`,`message`) VALUES ('{$_POST['name']}','{$_POST['msg']}')");
}

?>
