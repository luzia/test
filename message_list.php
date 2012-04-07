<?php  
include_once("conn_sql.php");

$message_sql = mysql_query("SELECT * FROM `message` order by `id` asc ") or die ("Query failed");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言版</title>
<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
<script type="text/javascript">
$("#ck_all").click(function(){
	if($("#ck_all").attr("checked")){
		$("input[name='ck[]']").each(function(){
			$(this).attr("checked",true);
		});
	}else{
		$("input[name='ck[]']").each(function(){
			$(this).attr("checked",false);
		});
	}
});

function del_message(obj,id){
	var str="id="+id;
	var row=obj.parentElement.parentElement;
	$.ajax({
		type: "POST",
		url: "message_del.php",
		data: str,
		success: function(msg){
			myTable.deleteRow(row.rowIndex);
		}
	});
}

</script>
</head>

<body>
  <table id="myTable" width="45%" border="1" align="center">
  	<thead>
    <tr>
      <th width="10%" scope="col">
      <input type="checkbox" name="ck_all" id="ck_all" /></th>
      <th width="10%" scope="col">#</th>
      <th width="25%" scope="col">姓名</th>
      <th width="20%" scope="col">留言</th>
      <th width="14%" scope="col">時間</th>
      <th width="21%" align="center" scope="col">動作</th>
    </tr>
    </thead>
    <tbody>
	<?php  
	while($message_rs = mysql_fetch_array($message_sql)){
	?>
    <tr>
      <td align="center">
	  <input type="checkbox" name="ck[]" value="<?php echo $message_rs['id'];?>" /></td>
      <td align="center"><?php echo $message_rs['id'];?></td>
      <td><?php echo $message_rs['name'];?></td>
      <td><?php echo $message_rs['message'];?></td>
      <td><?php echo $message_rs['add_time'];?></td>
      <td align="center">
        <input type="button" name="button" id="button" value="刪除" onclick="del_message(this,<?php echo $message_rs['id'];?>)" />
	  </td>
    </tr>
	<?php
	}
	?>
    </tbody>
  </table>
</body>
</html>
