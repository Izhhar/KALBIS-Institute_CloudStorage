<?php
$id_select = $connect->query("select 1 + (select id_user from users order by id_user desc limit 1) as id_usernya");
	if($id_select->num_rows > 0)
	{
		if($row = $id_select->fetch_assoc())
		{
			$select_id = $row['id_usernya'];
			//echo "INSERT INTO activity (id_user, content, create_at) VALUES ('$select_id', 'New Account', now())";
			$rst_activity = "INSERT INTO activity (id_user, content, create_at) VALUES ('$select_id', 'New Account', now())";
			$activity = $connect->query($rst_activity);
		}
	}
?>