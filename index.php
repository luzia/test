<?php  
mysql_connect("localhost") or die ("Could not connetc");
mysql_select_db("test") or die ("Could not select database");
mysql_query("SET NAMES 'utf8'");


$message_sql = mysql_query("SELECT * FROM `message`") or die ("Query failed");
// $message_rs = mysql_fetch_array($message_sql);
	// while($message_rs = mysql_fetch_array($message_sql)){
		// echo "<pre>";
		// var_dump($message_rs);
		// echo "</pre>";
	// }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言版</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="95%" border="1">
  	<thead>
    <tr>
      <th width="7%" scope="col"><input type="checkbox" name="ck_all" id="ck_all" />
        <label for="ck_all"></label></th>
      <th width="43%" scope="col">姓名</th>
      <th width="25%" scope="col">留言</th>
      <th width="25%" scope="col">動作</th>
    </tr>
    </thead>
    <tbody>
    <?php  
	$message_sql = mysql_query("SELECT * FROM `message`");
	while($message_rs = mysql_fetch_array($message_sql)){
		echo "<pre>";
		var_dump($message_rs);
		echo "</pre>";
	?>
    <tr>
      <td align="center"><input type="checkbox" name="ck" id="ck" /></td>
      <td><?php echo $message_rs['name'];?></td>
      <td><?php echo $message_rs['message'];?></td>
      <td>&nbsp;</td>
    </tr>
    <?php  
	}
	?>
    </tbody>
  </table>
</form>
</body>
</html>