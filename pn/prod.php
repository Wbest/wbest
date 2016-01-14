<?
	session_start();
	Header("Content-Type: text/html;charset=UTF-8");
	include $_SERVER['DOCUMENT_ROOT']."/pn/classSimpleImage.php";	
	include $_SERVER['DOCUMENT_ROOT']."/pn/url_translit.php";	
	include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	$title = "Каталог";
	include $_SERVER['DOCUMENT_ROOT']."/pn/header.html";
	if (!isset($_SESSION["user_id"]))
	{
		?></br><p align="center"><font color="red">Вы не вошли под своим именем</font></p><?
		include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
		exit;
	}
	$table = 'prod';
	$page_url = 'prod';
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
			$id_cat = mysql_result($result, 0, 'id_cat');
			$price = mysql_result($result, 0, 'price');
			$img = mysql_result($result, 0, 'img');
			$about = mysql_result($result, 0, 'about');
			$status = mysql_result($result, 0, 'status');
			$caption = mysql_result($result, 0, 'caption');
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
				<label>Название</label>
				<input type="text" value="<?echo $name;?>" name="name" class="form-control">
				</div>
				<div class="form-group">
				<label>Тип продукции</label>
				<input type="text" value="<?echo $caption;?>" name="caption" class="form-control">
				</div>
				<div class="form-group">
				<label>Цена</label>
				<input type="text" value="<?echo $price;?>" name="price" class="form-control">
				</div>
				<div class="form-group">
				<label>Картинка</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
				
				<div class="form-group">
				<label>Категория</label>
				<select name="id_cat" class="form-control">
					<?
						$res = mysql_query("SELECT * FROM `category`");
						$count = mysql_num_rows($res);
						for ($i = 0; $i < $count; ++$i){
							$id_res = mysql_result($res, $i, 'id');
							$name_res = mysql_result($res, $i, 'name');
							?>
							<option <?if ($id_res == $id_cat) {?>selected<?}?> value="<?echo $id_res;?>"><?echo $name_res;?></option>
							<?
						}
					?>
				</select>
				</div>
				
				<div class="form-group">
					<label class="">События:</label><br>	
					<div class="btn-group">
						<button data-toggle="dropdown" class="btn dropdown-toggle" data-placeholder="Выберите поля" id="action_str">Выберите поля<span class="caret"></span></button>
						<ul class="dropdown-menu">
						<?
							$res = mysql_query("SELECT * FROM `action`");
							$count = mysql_num_rows($res);
							$action_str = "";
							for ($i = 0; $i < $count; ++$i)
							{
								$exist = false;
								$name_res = mysql_result($res, $i, 'name');
								$id_res = mysql_result($res, $i, 'id');
								$res_temp = mysql_query("SELECT * FROM `action_prod` WHERE `id_prod`=".$id." and `id_action`=".$id_res."");
								if (mysql_num_rows($res_temp) > 0) {
									$exist = true;
									$action_str = $action_str.$name_res.", ";
								}
								
						?>
							<li><input type="checkbox" <?if ($exist) {?>checked=""<?}?> id="id_action_<?echo $i;?>" name="id_action_<?echo $i;?>" value="<?echo $id_res;?>"><label for="id_action_<?echo $i;?>"><?echo $name_res;?></label></li>
						<?
							}
							if ($action_str != ""){$action_str = mb_substr($action_str, 0, -2);}
						?>				
						</ul>
						<script>
							$("#action_str").html('<?echo $action_str;?><span class="caret"></span>');
						</script>
					</div>
				</div>
				
				<div class="form-group">
					<label class="">Состав:</label><br>	
					<div class="btn-group">
						<button data-toggle="dropdown" class="btn dropdown-toggle" data-placeholder="Выберите поля" id="consist_str">Выберите поля<span class="caret"></span></button>
						<ul class="dropdown-menu">
						<?
							$res = mysql_query("SELECT * FROM `consist`");
							$count = mysql_num_rows($res);
							$consist_str = "";
							for ($i = 0; $i < $count; ++$i)
							{
								$exist = false;
								$name_res = mysql_result($res, $i, 'name');
								$id_res = mysql_result($res, $i, 'id');
								$res_temp = mysql_query("SELECT * FROM `consist_prod` WHERE `id_prod`=".$id." and `id_consist`=".$id_res."");
								if (mysql_num_rows($res_temp) > 0) {
									$exist = true;
									$consist_str = $consist_str.$name_res.", ";
								}
								
						?>
							<li><input type="checkbox" <?if ($exist) {?>checked=""<?}?> id="id_consist_<?echo $i;?>" name="id_consist_<?echo $i;?>" value="<?echo $id_res;?>"><label for="id_consist_<?echo $i;?>"><?echo $name_res;?></label></li>
						<?
							}
							if ($consist_str != ""){$consist_str = mb_substr($consist_str, 0, -2);}
						?>				
						</ul>
						<script>
							$("#consist_str").html('<?echo $consist_str;?><span class="caret"></span>');
						</script>
					</div>
				</div>
							
				<?/*<div class="form-group">
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
				</div>*/?>
				<div class="form-group">
				<label style="vertical-align:top;line-height:2.2;">Новинка</label>
				<input type="checkbox" value="1" <?if ($status == '1') {?>checked<?}?>  name="status_new" class="" style="width:24px;height:24px;">
				</div>
				<div class="form-group">
				<label style="vertical-align:top;line-height:2.2;">Хит продаж</label>
				<input type="checkbox" value="2" <?if ($status == '2') {?>checked<?}?>  name="status_hit" class="" style="width:24px;height:24px;">
				</div>
				<div class="form-group">
				<label>Краткое описание</label>
				<input type="text" value="<?echo $about;?>" name="about" class="form-control">
				</div>
				<div class="form-group" >
				<label>Описание</label>
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
				<label>Название</label>
				<input type="text" value="<?echo $name;?>" name="name" class="form-control">
				</div>
				<div class="form-group">
				<label>Тип продукции</label>
				<input type="text" value="<?echo $caption;?>" name="caption" class="form-control">
				</div>
				<div class="form-group">
				<label>Цена</label>
				<input type="text" value="<?echo $price;?>" name="price" class="form-control">
				</div>
				<div class="form-group">
				<label>Картинка</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
				
				<div class="form-group">
				<label>Категория</label>
				<select name="id_cat" class="form-control">
					<?
						$res = mysql_query("SELECT * FROM `category`");
						$count = mysql_num_rows($res);
						for ($i = 0; $i < $count; ++$i){
							$id_res = mysql_result($res, $i, 'id');
							$name_res = mysql_result($res, $i, 'name');
							?>
							<option value="<?echo $id_res;?>"><?echo $name_res;?></option>
							<?
						}
					?>
				</select>
				</div>
				
				<div class="form-group">
					<label class="">События:</label><br>	
					<div class="btn-group">
						<button data-toggle="dropdown" class="btn dropdown-toggle" data-placeholder="Выберите поля">Выберите поля<span class="caret"></span></button>
						<ul class="dropdown-menu">
						<?
							$res = mysql_query("SELECT * FROM `action`");
							$count = mysql_num_rows($res);
							for ($i = 0; $i < $count; ++$i)
							{
								$exist = false;
								$name_res = mysql_result($res, $i, 'name');
								$id_res = mysql_result($res, $i, 'id');
								
						?>
							<li><input type="checkbox" <?if ($exist) {?>checked=""<?}?> id="id_action_<?echo $i;?>" name="id_action_<?echo $i;?>" value="<?echo $id_res;?>"><label for="id_action_<?echo $i;?>"><?echo $name_res;?></label></li>
						<?
							}
						?>				
						</ul>
					</div>
				</div>
				
				<div class="form-group">
					<label class="">Состав:</label><br>	
					<div class="btn-group">
						<button data-toggle="dropdown" class="btn dropdown-toggle" data-placeholder="Выберите поля">Выберите поля<span class="caret"></span></button>
						<ul class="dropdown-menu">
						<?
							$res = mysql_query("SELECT * FROM `consist`");
							$count = mysql_num_rows($res);
							for ($i = 0; $i < $count; ++$i)
							{
								$exist = false;
								$name_res = mysql_result($res, $i, 'name');
								$id_res = mysql_result($res, $i, 'id');
								
						?>
							<li><input type="checkbox" <?if ($exist) {?>checked=""<?}?> id="id_consist_<?echo $i;?>" name="id_consist_<?echo $i;?>" value="<?echo $id_res;?>"><label for="id_consist_<?echo $i;?>"><?echo $name_res;?></label></li>
						<?
							}
						?>				
						</ul>
					</div>
				</div>
							
				<?/*<div class="form-group">
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
				</div>*/?>
				<div class="form-group">
				<label style="vertical-align:top;line-height:2.2;">Новинка</label>
				<input type="checkbox" value="1" <?if ($status == '1') {?>checked<?}?>  name="status_new" class="" style="width:24px;height:24px;">
				</div>
				<div class="form-group">
				<label style="vertical-align:top;line-height:2.2;">Хит продаж</label>
				<input type="checkbox" value="2" <?if ($status == '2') {?>checked<?}?>  name="status_hit" class="" style="width:24px;height:24px;">
				</div>
				<div class="form-group">
				<label>Краткое описание</label>
				<input type="text" value="<?echo $about;?>" name="about" class="form-control">
				</div>
				<div class="form-group" >
				<label>Описание</label>
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
							$img = '/images/'.$page_url.'/prod_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);
							$image = new SimpleImage();
							$image->load($_SERVER['DOCUMENT_ROOT'].$img);
							$image->resizeToWidth(300);
							$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($img));
						}
						/*$number = 0;
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
							}*/
							$status = 0;
							if ($_POST["status_new"] == "1") {
								$status = 1;
							}
							if ($_POST["status_hit"] == "2") {
								$status = 2;
							}
							
							$SQL = "INSERT INTO `".$table."` (`id`, `name`, `id_cat`, `img`, `price`, `about`, `url`, `status`, `text`, `caption`) 
								VALUES (NULL, '".$_POST['name']."', '".$_POST['id_cat']."', '".$img."', '".$_POST['price']."', '".$_POST['about']."', '".$url."', '".$status."', '".$_POST['text']."', '".$_POST['caption']."');";
							$result = mysql_query($SQL);	
							if ($result){echo "<p>Данные добавлены</p>";}else{echo "<p>Ошибка при добавлении данных</p>";}
							$SQL = "SELECT MAX(`id`) as `max_id` FROM `".$table."`";
							$result = mysql_query($SQL);
							$id_prod = mysql_result($result, 0, 'max_id');
							
							$SQL = "SELECT * FROM `action`";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{	
								if (isset($_POST['id_action_'.$i]) && $_POST['id_action_'.$i] != "") {
									$result = mysql_query("INSERT INTO `action_prod` (`id_prod`, `id_action`) VALUES ('".$id_prod."', '".$_POST['id_action_'.$i]."')");
								}
							}
							$SQL = "SELECT * FROM `consist`";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{	
								if (isset($_POST['id_consist_'.$i]) && $_POST['id_consist_'.$i] != "") {
									$result = mysql_query("INSERT INTO `consist_prod` (`id_prod`, `id_consist`) VALUES ('".$id_prod."', '".$_POST['id_consist_'.$i]."')");
								}
							}

						
						
					}
					if (isset($_POST['edit_data']))
					{
						$img = '';
						$url = str2url($_POST['name']);
						//$SQL = "SELECT * FROM `".$table."` WHERE `id`=".$_POST['edit_data']."";
						//$result = mysql_query($SQL);
						//$foto = mysql_result($result, 0, 'foto');
						if (basename($_FILES['img']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img']['name']));
							$img = '/images/'.$page_url.'/prod_'.$_POST['edit_data']."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);
							$image = new SimpleImage();
							$image->load($_SERVER['DOCUMENT_ROOT'].$img);
							$image->resizeToWidth(300);
							$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($img));
							$img = "`img`='".$img."', ";
						} 
						/*$number = 0;
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
							}*/
						$status = 0;
							if ($_POST["status_new"] == "1") {
								$status = 1;
							}
							if ($_POST["status_hit"] == "2") {
								$status = 2;
							}
						$SQL = "UPDATE ".$table." SET
							".$img."
							`url`='".$url."',
							`status`='".$status."',
							`caption`= '".$_POST['caption']."',
							`name`= '".$_POST['name']."',
							`text`= '".$_POST['text']."',
							`price`= '".$_POST['price']."',
							`id_cat`= '".$_POST['id_cat']."',
							`about`= '".$_POST['about']."'
							WHERE `id`=".$_POST['edit_data'].";";
				
						$result = mysql_query($SQL);
						if ($result){echo "<p>Данные изменены</p>";}else{echo "<p>Ошибка при изменении данных</p>";}
						$id_prod = $_POST['edit_data'];
						$result = mysql_query("DELETE FROM `action_prod` WHERE `id_prod`=".$id_prod."");
						$result = mysql_query("DELETE FROM `consist_prod` WHERE `id_prod`=".$id_prod."");
						
							$SQL = "SELECT * FROM `action`";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{	
								if (isset($_POST['id_action_'.$i]) && $_POST['id_action_'.$i] != "") {
									$result = mysql_query("INSERT INTO `action_prod` (`id_prod`, `id_action`) VALUES ('".$id_prod."', '".$_POST['id_action_'.$i]."')");
								}
							}
							$SQL = "SELECT * FROM `consist`";
							$result = mysql_query($SQL);
							$count = mysql_num_rows($result);
							for ($i = 0; $i < $count; ++$i)
							{	
								if (isset($_POST['id_consist_'.$i]) && $_POST['id_consist_'.$i] != "") {
									$result = mysql_query("INSERT INTO `consist_prod` (`id_prod`, `id_consist`) VALUES ('".$id_prod."', '".$_POST['id_consist_'.$i]."')");
								}
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
				<th>Картинка</th>
				<th>Название</th>
				<th style="width: 3.5em;"></th>
				<th style="width: 3.5em;"></th>
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
			  <td><img src="<?echo $img;?>" style="width: 150px;"></td>
			  <td><?echo $name;?></td>
			 
			  <td><a href="/pn/<?echo $page_url;?>.php?edit=<?echo $id;?>"><i class="fa fa-pencil"></i></a></td>
			  <td><a href="/pn/<?echo $page_url;?>.php?page=<?echo $page;?>&del=<?echo $id;?>"><i class="fa fa-trash-o"></i></a></td>
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