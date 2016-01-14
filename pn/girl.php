<?
	session_start();
	Header("Content-Type: text/html;charset=UTF-8");
	include $_SERVER['DOCUMENT_ROOT']."/pn/classSimpleImage.php";	
	include $_SERVER['DOCUMENT_ROOT']."/pn/url_translit.php";	
	include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	$title = "Девушки";
	include $_SERVER['DOCUMENT_ROOT']."/pn/header.html";
	if (!isset($_SESSION["user_id"]))
	{
		?></br><p align="center"><font color="red">Вы не вошли под своим именем</font></p><?
		include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
		exit;
	}
	$table = 'girl';
	$page_url = 'girl';
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
			$age = mysql_result($result, 0, 'age');
			$weight = mysql_result($result, 0, 'weight');
			$growth = mysql_result($result, 0, 'growth');
			$breast = mysql_result($result, 0, 'breast');
			$img = mysql_result($result, 0, 'img');
			$about = mysql_result($result, 0, 'about');
			$status = mysql_result($result, 0, 'status');
			$text = mysql_result($result, 0, 'text');
			$foto = explode("\n", mysql_result($result, 0, 'foto'));
			$service = explode("\n", mysql_result($result, 0, 'service'));
			$service_add = explode("\n", mysql_result($result, 0, 'service_add'));
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
			  <form id="tab" action="/pn/<?echo $page_url;?>.php" method="post"  enctype="multipart/form-data">
				<div class="form-group">
				<label>Имя</label>
				<input type="text" value="<?echo $name;?>" name="name" class="form-control">
				</div>
				<div class="form-group">
				<label>Возраст</label>
				<input type="text" value="<?echo $age;?>" name="age" class="form-control">
				</div>
				<div class="form-group">
				<label>Вес</label>
				<input type="text" value="<?echo $weight;?>" name="weight" class="form-control">
				</div>
				<div class="form-group">
				<label>Рост</label>
				<input type="text" value="<?echo $growth;?>" name="growth" class="form-control">
				</div>
				<div class="form-group">
				<label>Размер груди</label>
				<input type="text" value="<?echo $breast;?>" name="breast" class="form-control">
				</div>	
				
				<div class="form-group">
					<label class="">Услуги:</label><br>	
					<div class="btn-group">
						<button data-toggle="dropdown" class="btn dropdown-toggle" data-placeholder="Выберите поля">Выберите поля<span class="caret"></span></button>
						<ul class="dropdown-menu">
						<?
							$SQL = "SELECT * FROM `service` WHERE `type`=0";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{
								$exist = false;
								$name_service = mysql_result($result, $i, 'name');
								$id_service = mysql_result($result, $i, 'id');
								for ($j = 0; $j < count($service); ++$j)
								{
									if ($service[$j] == $id_service) {
										$exist = true;
									}
								}
						?>
							<li><input type="checkbox" <?if ($exist) {?>checked=""<?}?> id="service_id_<?echo $i;?>" name="service_id_<?echo $i;?>" value="<?echo $id_service;?>"><label for="service_id_<?echo $i;?>"><?echo $name_service;?></label></li>
						<?
							}
						?>				
						</ul>
					</div>
				</div>
				<div class="form-group">
					<label class="">Дополнительные услуги:</label><br>	
					<div class="btn-group">
						<button data-toggle="dropdown" class="btn dropdown-toggle" data-placeholder="Выберите поля">Выберите поля<span class="caret"></span></button>
						<ul class="dropdown-menu">
						<?
							$SQL = "SELECT * FROM `service` WHERE `type`=1";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{
								$exist = false;
								$name_service = mysql_result($result, $i, 'name');
								$id_service = mysql_result($result, $i, 'id');
								for ($j = 0; $j < count($service); ++$j)
								{
									if ($service_add[$j] == $id_service) {
										$exist = true;
									}
								}
						?>
							<li><input type="checkbox" <?if ($exist) {?>checked=""<?}?> id="service_add_id_<?echo $i;?>" name="service_add_id_<?echo $i;?>" value="<?echo $id_service;?>"><label for="service_add_id_<?echo $i;?>"><?echo $name_service;?></label></li>
						<?
							}
						?>				
						</ul>
					</div>
				</div>
				<div class="form-group">
				<label>Картинка</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
				
				<div class="form-group">
				<label>Фотографии</label>
					<p>
					 <?
						
						if ($foto[0] != '') {
							for ($i = 0; $i < count($foto) - 1; ++$i)
							{
								?><div id="foto_<?echo $i;?>" class="img_edit_Element">
								<img  src="<?if (file_exists($_SERVER['DOCUMENT_ROOT'].dirname($foto[$i]).'/small_'.basename($foto[$i]))) {echo dirname($foto[$i]).'/small_'.basename($foto[$i]);} else { echo $foto[$i];}?>" width="70" >
								<a href="javascript:void(0)" onClick="delete_element_img('foto','<?echo $id;?>','<?echo $i;?>')">Удалить</a>
								</div><?
							}
						}
						?>
					</p>
				<input type="file" value="" name="foto[]" multiple class="form-control">
				</div>
				
				<div class="form-group">
				<label style="vertical-align:top;line-height:2.2;">Сегодня работает</label>
				<input type="checkbox" value="1" <?if ($status == '1') {?>checked<?}?> name="status" class="" style="width:24px;height:24px;">
				</div>
				<div class="form-group" >
				<label>Краткое описание</label>
				<textarea type="text" name="about" class="form-control"><?echo $about;?></textarea>
				</div>
				<div class="form-group" >
				<label>Полное описание</label>
				<textarea type="text" name="text" class="form-control"><?echo $text;?></textarea>
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
		<script>
					function delete_element_img(img, id, number){
						document.getElementById(img+'_'+number).style.display='none';
						$.ajax({
							url: "/pn/delete_element_img.php", 
							type: "POST",       
							data: {"img": img, "id": id, "number": number, "table": '<?echo $table;?>'},
							cache: false,			
							success: function(response){
								if(response == 0){} else{
										
									}
								}
							});
					}
		</script>
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
				<label>Возраст</label>
				<input type="text" value="<?echo $age;?>" name="age" class="form-control">
				</div>
				<div class="form-group">
				<label>Вес</label>
				<input type="text" value="<?echo $weight;?>" name="weight" class="form-control">
				</div>
				<div class="form-group">
				<label>Рост</label>
				<input type="text" value="<?echo $growth;?>" name="growth" class="form-control">
				</div>
				<div class="form-group">
				<label>Размер груди</label>
				<input type="text" value="<?echo $breast;?>" name="breast" class="form-control">
				</div>	
				<div class="form-group">
					<label class="">Услуги:</label><br>	
					<div class="btn-group">
						<button data-toggle="dropdown" class="btn dropdown-toggle" data-placeholder="Выберите поля">Выберите поля<span class="caret"></span></button>
						<ul class="dropdown-menu">
						<?
							$SQL = "SELECT * FROM `service` WHERE `type`=0";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{
								$name_service = mysql_result($result, $i, 'name');
								$id_service = mysql_result($result, $i, 'id');
							
						?>
							<li><input type="checkbox"  id="service_id_<?echo $i;?>" name="service_id_<?echo $i;?>" value="<?echo $id_service;?>"><label for="service_id_<?echo $i;?>"><?echo $name_service;?></label></li>
						<?
							}
						?>				
						</ul>
					</div>
				</div>
				<div class="form-group">
					<label class="">Дополнительные услуги:</label><br>	
					<div class="btn-group">
						<button data-toggle="dropdown" class="btn dropdown-toggle" data-placeholder="Выберите поля">Выберите поля<span class="caret"></span></button>
						<ul class="dropdown-menu">
						<?
							$SQL = "SELECT * FROM `service` WHERE `type`=1";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{
								$name_service = mysql_result($result, $i, 'name');
								$id_service = mysql_result($result, $i, 'id');
						?>
							<li><input type="checkbox" id="service_add_id_<?echo $i;?>" name="service_add_id_<?echo $i;?>" value="<?echo $id_service;?>"><label for="service_add_id_<?echo $i;?>"><?echo $name_service;?></label></li>
						<?
							}
						?>				
						</ul>
					</div>
				</div>
				<div class="form-group">
				<label>Картинка</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
				
				<div class="form-group">
				<label>Фотографии</label>
					
				<input type="file" value="" name="foto[]" multiple class="form-control">
				</div>
				<div class="form-group">
				<label style="vertical-align:top;line-height:2.2;">Сегодня работает</label>
				<input type="checkbox" value="1" name="status" style="width:24px;height:24px;">
				</div>
				<div class="form-group" >
				<label>Краткое описание</label>
				<textarea type="text" name="about" class="form-control"><?echo $about;?></textarea>
				</div>
				<div class="form-group" >
				<label>Полное описание</label>
				<textarea type="text" name="text" class="form-control"><?echo $text;?></textarea>
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
						$img = "";
						$foto = "";
						$url = str2url($_POST['name']);
						$SQL = "SELECT MAX(`id`) as `max_id` FROM `".$table."`";
						$result = mysql_query($SQL);
						if (mysql_num_rows($result) > 0) {
							$max_id = mysql_result($result, 0, 'max_id') + 1;
						} else {
							$max_id = 1;
						}
						if (basename($_FILES['img']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img']['name']));
							$img = '/images/'.$page_url.'/girl_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);
							$image = new SimpleImage();
							$image->load($_SERVER['DOCUMENT_ROOT'].$img);
							$image->resizeToWidth(300);
							$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($img));
						}
						$number = 0;
							if(count($_FILES['foto'])) { 
								foreach ($_FILES['foto']['name'] as $key => $value) {
									if ($value != '') {
										$path_info = pathinfo(basename($value));
										$upload_file = '/images/'.$page_url.'/girl_'.$max_id."_".$number."_".rand(0,1000).".".$path_info['extension'];					
										move_uploaded_file($_FILES['foto']['tmp_name'][$key], $_SERVER['DOCUMENT_ROOT'].$upload_file); 
										$foto = $foto.$upload_file."\n";
										$number++;
										$image = new SimpleImage();
										$image->load($_SERVER['DOCUMENT_ROOT'].$upload_file);
										$image->resizeToWidth(300);
										$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($upload_file));
									}
								}
							}
						$service = "";
							$SQL = "SELECT * FROM `service` WHERE `type`=0";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{	
								$id_service = mysql_result($result, $i, 'id');
								if (isset($_POST['service_id_'.$i]) && $_POST['service_id_'.$i] != "") {
									$service = $service.$_POST['service_id_'.$i]."\n";
								}
							}
						$service_add = "";
							$SQL = "SELECT * FROM `service` WHERE `type`=1";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{	
								$id_service = mysql_result($result, $i, 'id');
								if (isset($_POST['service_add_id_'.$i]) && $_POST['service_add_id_'.$i] != "") {
									$service_add = $service_add.$_POST['service_add_id_'.$i]."\n";
								}
							}
						
						$SQL = "INSERT INTO `".$table."` (`id`, `name`, `age`, `weight`, `growth`, `breast`, `img`, `about`, `text`, `status`, `url`, `service`, `service_add`, `foto`) 
								VALUES (NULL, '".$_POST['name']."', '".$_POST['age']."', '".$_POST['weight']."', '".$_POST['growth']."', '".$_POST['breast']."', '".$img."', '".$_POST['about']."', '".$_POST['text']."', '".$_POST['status']."', '".$url."','".$service."', '".$service_add."', '".$foto."');";
				
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
						$img = '';
						$url = str2url($_POST['name']);
						$SQL = "SELECT * FROM `".$table."` WHERE `id`=".$_POST['edit_data']."";
						$result = mysql_query($SQL);
						$foto = mysql_result($result, 0, 'foto');
						if (basename($_FILES['img']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img']['name']));
							$img = '/images/'.$page_url.'/girl_'.$_POST['edit_data']."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);
							$image = new SimpleImage();
							$image->load($_SERVER['DOCUMENT_ROOT'].$img);
							$image->resizeToWidth(300);
							$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($img));
							$img = "`img`='".$img."', ";
						} 
						$number = 0;
							if(count($_FILES['foto'])) { 
								foreach ($_FILES['foto']['name'] as $key => $value) {
									if ($value != '') {
										$path_info = pathinfo(basename($value));
										$upload_file = '/images/'.$page_url.'/girl_'.$_POST['edit_data']."_".$number."_".rand(0,1000).".".$path_info['extension'];					
										move_uploaded_file($_FILES['foto']['tmp_name'][$key], $_SERVER['DOCUMENT_ROOT'].$upload_file); 
										$foto = $foto.$upload_file."\n";
										$number++;
										$image = new SimpleImage();
										$image->load($_SERVER['DOCUMENT_ROOT'].$upload_file);
										$image->resizeToWidth(300);
										$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($upload_file));
									}
								}
							}
						$service = "";
							$SQL = "SELECT * FROM `service` WHERE `type`=0";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{	
								$id_service = mysql_result($result, $i, 'id');
								if (isset($_POST['service_id_'.$i]) && $_POST['service_id_'.$i] != "") {
									$service = $service.$_POST['service_id_'.$i]."\n";
								}
							}
						$service_add = "";
							$SQL = "SELECT * FROM `service` WHERE `type`=1";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{	
								$id_service = mysql_result($result, $i, 'id');
								if (isset($_POST['service_add_id_'.$i]) && $_POST['service_add_id_'.$i] != "") {
									$service_add = $service_add.$_POST['service_add_id_'.$i]."\n";
								}
							}
					
						$SQL = "UPDATE ".$table." SET
							".$img."
							`url`='".$url."',
							`foto`= '".$foto."',
							`name`= '".$_POST['name']."',
							`service`= '".$service."',
							`service_add`= '".$service_add."',
							`age`= '".$_POST['age']."',
							`growth`= '".$_POST['growth']."',
							`weight`= '".$_POST['weight']."',
							`breast`= '".$_POST['breast']."',
							`about`= '".$_POST['about']."',
							`text`= '".$_POST['text']."',
							`status`= '".$_POST['status']."'
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
			$SQL = "SELECT * FROM `".$table."` ORDER BY `id` DESC LIMIT ".$count_data.", 20";
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
				<th>Имя</th>
				<th>Фото</th>
				<th>Сегодня работает</th>
			  <th style="width: 7.5em;"></th>
			</tr>
		  </thead>
		  <tbody>
		  
		  <?
				for ($i = 0; $i < $count; ++$i)
				{
					$id = mysql_result($result, $i, 'id');
					$name = mysql_result($result, $i, 'name');
					$img = mysql_result($result, $i, 'img');
					$status = mysql_result($result, $i, 'status');	
				
		  ?>
		  
			<tr>
			  <td><?echo $id;?></td>
			  <td><?echo $name;?></td>
			  <td><img src="<?echo $img;?>" style="width: 150px;"></td>
			  <td><?if ($status == '1') {?>Да<?} else {?>Нет<?}?></td>
			  <td>
				  <a href="/pn/<?echo $page_url;?>.php?edit=<?echo $id;?>"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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