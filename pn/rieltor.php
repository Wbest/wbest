<?
	session_start();
	Header("Content-Type: text/html;charset=UTF-8");
	include $_SERVER['DOCUMENT_ROOT']."/pn/classSimpleImage.php";	
	include $_SERVER['DOCUMENT_ROOT']."/pn/url_translit.php";	
	include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	$title = "Сотрудники";
	include $_SERVER['DOCUMENT_ROOT']."/pn/header.html";
	if (!isset($_SESSION["user_id"]))
	{
		?></br><p align="center"><font color="red">Вы не вошли под своим именем</font></p><?
		include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
		exit;
	}
	$table = 'rieltor';
	$page_url = 'rieltor';
	$title_page = $title;
	
	if (!is_dir($_SERVER['DOCUMENT_ROOT']."/images/".$page_url))
	{
		mkdir($_SERVER['DOCUMENT_ROOT']."/images/".$page_url, 0777);
	}
	
	if (isset($_GET['del']))
	{
			$sql = "DELETE FROM `".$table."` WHERE `id` = ".$_GET['del']."";
			mysql_query($sql);
	}

	if (isset($_GET['page']))
	{
		$page = $_GET['page'];
	}
	else
	{
		$page = 0;
	}
	$count_data = $page * 20;
	
	$SQL = "SELECT * FROM `".$table."`";

	$result = mysql_query($SQL);

	$count_base = mysql_num_rows($result);
	$count_page = ceil($count_base / 20);
	
?>

        <?
		if (isset($_GET['edit']))
		{
			include $_SERVER['DOCUMENT_ROOT']."/pn/editor.php";

			$SQL = "SELECT * FROM `".$table."` WHERE id=".$_GET['edit']."";
	
			$result = mysql_query($SQL);
			$id = mysql_result($result, 0, 'id');
			$name = mysql_result($result, 0, 'name');
			$tel = mysql_result($result, 0, 'tel');
			$img = mysql_result($result, 0, 'img');
			$email = mysql_result($result, 0, 'email');
			$post = mysql_result($result, 0, 'post');
			$id_department = mysql_result($result, 0, 'id_department');
			$id_office = mysql_result($result, 0, 'id_office');
			$status = mysql_result($result, 0, 'status');
			?>
			
			<div class="header">
            
            <h1 class="page-title"><?echo $title_page;?></h1>
                    <ul class="breadcrumb">
            <li><a href="/pn/">Главная</a> </li>
			<li><a href="/pn/<?echo $page_url;?>.php"><?echo $title_page;?></a> </li>
            <li class="active">Изменить</li>
        </ul>

        </div>
        <div class="main-content">
			<div class="row">
		  <div class="col-md-4">
		
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane active in" id="home">
			  <form id="tab" action="/pn/<?echo $page_url;?>.php?page=<?echo $_GET['page'];?>" method="post"  enctype="multipart/form-data">
				<div class="form-group">
				<label>Имя</label>
				<input type="text" value="<?echo $name;?>" name="name" class="form-control">
				</div>
				<div class="form-group">
				<label>Фото</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
				<div class="form-group">
				<label>Email</label>
				<input type="text" value="<?echo $email;?>" name="email" class="form-control">
				</div>
				<div class="form-group">
				<label>Телефон</label>
				<input type="text" value="<?echo $tel;?>" name="tel" class="form-control">
				</div>
				<div class="form-group">
				<label>Должность</label>
				<input type="text" value="<?echo $post;?>" name="post" class="form-control">
				</div>
				<div class="form-group">
					<label>Офис</label>
					<select name="id_office" class="form-control">
						<?
							$SQL = "SELECT * FROM `office`";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($j = 0; $j < $count; ++$j)
							{
								$id_temp = mysql_result($result, $j, 'id');
								$name_temp = mysql_result($result, $j, 'name');
							?>
							<option <?if ($id_office == $id_temp) {?>selected<?}?> value="<?echo $id_temp;?>"><?echo $name_temp;?></option>
						<?}?>
					</select>
				</div>
				<div class="form-group">
					<label>Отдел</label>
					<select name="id_department" class="form-control">
						<?
							$SQL = "SELECT * FROM `department`";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($j = 0; $j < $count; ++$j)
							{
								$id_temp = mysql_result($result, $j, 'id');
								$name_temp = mysql_result($result, $j, 'name');
							?>
							<option <?if ($id_department == $id_temp) {?>selected<?}?> value="<?echo $id_temp;?>"><?echo $name_temp;?></option>
						<?}?>
					</select>
				</div>
				<div class="form-group">
				<label style="vertical-align:top;line-height:2.2;">Лучший риелтор</label>
				<input type="checkbox" value="1" <?if ($status == '1') {?>checked<?}?> name="status" class="" style="width:24px;height:24px;">
				</div>
			  </div>
			</div>

			<div class="btn-toolbar list-toolbar">
			  <input type="submit" class="btn btn-primary" value="Изменить">
			  <a href="/pn/<?echo $page_url;?>.php" class="btn btn-danger">Отмена</a>
					  <input type="hidden" name="edit_data" value="<?echo $id;?>">
			   </form>
			</div>
		  </div>
		</div>
			<?
			
		}
		else
		{
				if (isset($_GET['add']))
				{
					include $_SERVER['DOCUMENT_ROOT']."/pn/editor.php";
					?>
							<div class="header">
					
					<h1 class="page-title"><?echo $title_page;?></h1>
							<ul class="breadcrumb">
					<li><a href="/pn/">Главная</a> </li>
					<li><a href="/pn/<?echo $page_url;?>.php"><?echo $title_page;?></a> </li>
					<li class="active">Добавить данные</li>
				</ul>

				</div>
				<div class="main-content">
					<div class="row">
		  <div class="col-md-4">
		
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane active in" id="home">
			  <form id="tab" action="/pn/<?echo $page_url;?>.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
				<label>Имя</label>
				<input type="text" value="<?echo $name;?>" name="name" class="form-control">
				</div>
				<div class="form-group">
				<label>Фото</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
				<div class="form-group">
				<label>Email</label>
				<input type="text" value="<?echo $email;?>" name="email" class="form-control">
				</div>
				<div class="form-group">
				<label>Телефон</label>
				<input type="text" value="<?echo $tel;?>" name="tel" class="form-control">
				</div>
				<div class="form-group">
				<label>Должность</label>
				<input type="text" value="<?echo $post;?>" name="post" class="form-control">
				</div>
				<div class="form-group">
					<label>Офис</label>
					<select name="id_office" class="form-control">
						<?
							$SQL = "SELECT * FROM `office`";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($j = 0; $j < $count; ++$j)
							{
								$id_temp = mysql_result($result, $j, 'id');
								$name_temp = mysql_result($result, $j, 'name');
							?>
							<option <?if ($id_office == $id_temp) {?>selected<?}?> value="<?echo $id_temp;?>"><?echo $name_temp;?></option>
						<?}?>
					</select>
				</div>
				<div class="form-group">
					<label>Отдел</label>
					<select name="id_department" class="form-control">
						<?
							$SQL = "SELECT * FROM `department`";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($j = 0; $j < $count; ++$j)
							{
								$id_temp = mysql_result($result, $j, 'id');
								$name_temp = mysql_result($result, $j, 'name');
							?>
							<option <?if ($id_department == $id_temp) {?>selected<?}?> value="<?echo $id_temp;?>"><?echo $name_temp;?></option>
						<?}?>
					</select>
				</div>
				<div class="form-group">
				<label style="vertical-align:top;line-height:2.2;">Лучший риелтор</label>
				<input type="checkbox" value="1" name="status" class="" style="width:24px;height:24px;">
				</div>
			   
			  </div>
			</div>

			<div class="btn-toolbar list-toolbar">
			  <input type="submit" class="btn btn-primary" value="Добавить">
			  <a href="/pn/<?echo $page_url;?>.php" class="btn btn-danger">Отмена</a>
			  	<input type="hidden" name="add_data">
			   </form>
			</div>
		  </div>
		</div>
					<?
			
				}
				else
				{

				?>
						<div class="header">
					
					<h1 class="page-title"><?echo $title_page;?></h1>
							<ul class="breadcrumb">
					<li><a href="/pn/">Главная</a> </li>
					<li class="active"><?echo $title_page;?></li>
				</ul>

				</div>
				<div class="main-content">
				
				<?
				
					if (isset($_POST['add_data']))
					{
						$SQL = "SELECT MAX(`id`) as `max_id` FROM `".$table."`";
						$result = mysql_query($SQL);
						if (mysql_num_rows($result) > 0) {
							$max_id = mysql_result($result, 0, 'max_id') + 1;
						} else {
							$max_id = 1;
						}
						$url = str2url($_POST['name']);
						$img = "";
						if (basename($_FILES['img']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img']['name']));
							$img = '/images/'.$page_url.'/rieltor_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);
							$image = new SimpleImage();
							$image->load($_SERVER['DOCUMENT_ROOT'].$img);
							$image->resizeToWidth(300);
							$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($img));
						}
						
						$SQL = "INSERT INTO ".$table."(
						`id` , 
						`name` ,
						`tel` ,
						`email`,
						`post`,
						`id_department`,
						`id_office`,
						`img`,
						`url`,
						`status`
						)
						VALUES (NULL ,  '".$_POST['name']."', '".$_POST['tel']."', '".$_POST['email']."', '".$_POST['post']."', '".$_POST['id_department']."', '".$_POST['id_office']."', '".$img."', '".$url."', '".$_POST['status']."');";
						
							$result = mysql_query($SQL);
							if ($result)
							{
								echo "<p>Данные добавлены</p>";
							}
							else
							{
								echo "<p>Ошибка при добавлении данных</p>";
							}
					}
					if (isset($_POST['edit_data']))
					{
						$SQL = "SELECT * FROM `".$table."` WHERE `id`=".$_POST['edit_data']."";
						$result = mysql_query($SQL);
						$max_id = $_POST['edit_data'];
						$img = '';
						$url = str2url($_POST['name']);
						if (basename($_FILES['img']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img']['name']));
							$img = '/images/'.$page_url.'/rieltor_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);
							$image = new SimpleImage();
							$image->load($_SERVER['DOCUMENT_ROOT'].$img);
							$image->resizeToWidth(300);
							$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($img));
							$img = " `img`='".$img."', ";
						}
					
							$SQL = "UPDATE ".$table." SET
							".$img."
							`name`= '".$_POST['name']."',
							`tel`= '".$_POST['tel']."',
							`url`= '".$url."',
							`post`= '".$_POST['post']."',
							`email`= '".$_POST['email']."',
							`id_department`= '".$_POST['id_department']."',
							`id_office`= '".$_POST['id_office']."',
							`status`= '".$_POST['status']."',
							`tel`= '".$_POST['tel']."'

							WHERE `id`=".$_POST['edit_data'].";";
				
						$result = mysql_query($SQL);
						if ($result)
						{
							echo "<p>Данные изменены</p>";
						}
						else
						{
							echo "<p>Ошибка при изменении данных</p>";
						}
					}
			$SQL = "SELECT * FROM `".$table."` ORDER BY `".$table."`.`id` DESC LIMIT ".$count_data.", 20";
			$result = mysql_query($SQL);

			$count = mysql_num_rows($result);
				?>
				
		<div class="btn-toolbar list-toolbar">
			<button class="btn btn-primary" onClick="location.href='/pn/<?echo $page_url;?>.php?add'"><i class="fa fa-plus"></i> Добавить данные</button>
		  <div class="btn-group">
		  </div>
		</div>
		<table class="table">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Фото</th>
			  <th>ФИО</th>
			  <th style="width: 3em;"></th>
			  <th style="width: 3em;"></th>
			</tr>
		  </thead>
		  <tbody>
		  
		  <?
				for ($i = 0; $i < $count; ++$i)
				{
					$id = mysql_result($result, $i, 'id');
					$name = mysql_result($result, $i, 'name');
					$img = mysql_result($result, $i, 'img');
		  ?>
		  
			<tr>
			  <td><?echo $id;?></td>
			  <td><img src="<?echo $img;?>" style="width: 100px;"></td>
			  <td><?echo $name;?></td>
			 <td>
				  <a href="/pn/<?echo $page_url;?>.php?page=<?echo $page;?>&edit=<?echo $id;?>"><i class="fa fa-pencil"></i></a>
				  </td><td>
				  <a href="/pn/<?echo $page_url;?>.php?page=<?echo $page;?>&del=<?echo $id;?>"><i class="fa fa-trash-o"></i></a>
			  </td>
			</tr>
			<?}?>
		   </tbody>
		</table>

		<ul class="pagination">
		  <li><a href="/pn/<?echo $page_url;?>.php?page=<?if ($page > 0) {echo ($page-1);} else {echo '0';}?>">&laquo;</a></li>
		  <?
			for ($i = 0; $i < $count_page; ++$i)
			{
				?><li><a href="/pn/<?echo $page_url;?>.php?page=<?echo $i;?>"><?if ($i == $page) {echo "<b>".($i+1)."</b>";}else{echo ($i+1);}?></a></li>
			<?
			}
			?>
		  <li><a href="/pn/<?echo $page_url;?>.php?page=<?if ($page < ($count_page-1)) {echo ($page+1);} else {echo ($count_page-1);}?>">&raquo;</a></li>
		</ul>
		<?}
		}?>

	  
<?
	
	include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
?>