<?
	session_start();
	Header("Content-Type: text/html;charset=UTF-8");
	include $_SERVER['DOCUMENT_ROOT']."/pn/classSimpleImage.php";	
	include $_SERVER['DOCUMENT_ROOT']."/pn/url_translit.php";	
	include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	$title = "Дополнительные услуги";
	include $_SERVER['DOCUMENT_ROOT']."/pn/header.html";
	if (!isset($_SESSION["user_id"]))
	{
		?></br><p align="center"><font color="red">Вы не вошли под своим именем</font></p><?
		include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
		exit;
	}
	$table = 'service';
	$page_url = 'service_add';
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
	
	$SQL = "SELECT * FROM `".$table."` WHERE `type`=1";
	$result = mysql_query($SQL);

	$count_base = mysql_num_rows($result);
	$count_page = ceil($count_base / 20);
	
?>

        <?
		if (isset($_GET['edit']))
		{
			include $_SERVER['DOCUMENT_ROOT']."/pn/editor.php";

			$SQL = "SELECT * FROM `".$table."` WHERE `id`=".$_GET['edit']."";
	
			$result = mysql_query($SQL);
			$id = mysql_result($result, 0, 'id');
			$name = mysql_result($result, 0, 'name');
			$text = mysql_result($result, 0, 'text');
			$price = explode("\n", mysql_result($result, 0, 'price'));
			$img = mysql_result($result, 0, 'img');
			$about = mysql_result($result, 0, 'about');
			$time = explode("\n", mysql_result($result, 0, 'time'));
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
				<label>Цена</label>
				<input type="text" value="<?echo $price[0];?>" name="price_0" class="form-control">
				</div>
				
				
				
				<div class="form-group"  style="display: none;">
				<label>Картинка</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
				
				<div class="form-group"  style="display: none;">
				<label>Краткое описание</label>
				<input type="text" value="<?echo $about;?>" name="about" class="form-control">
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
				<label>Цена</label>
				<input type="text" value="<?echo $price[0];?>" name="price_0" class="form-control">
				</div>

				<div class="form-group" style="display: none;">
				<label>Картинка</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
				
				<div class="form-group"  style="display: none;">
				<label>Краткое описание</label>
				<input type="text" value="<?echo $about;?>" name="about" class="form-control">
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
						
						$SQL = "INSERT INTO `".$table."` (`id`, `name`, `price`, `img`, `about`, `text`, `url`, `type`, `time`) 
								VALUES (NULL, '".$_POST['name']."', '".$_POST['price_0']."\n".$_POST['price_1']."', '".$img."', '".$_POST['about']."', '".$_POST['text']."', '".$url."', '1', '60\n90');";
				
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
						
						$SQL = "UPDATE ".$table." SET
							".$img."
							`url`='".$url."',
							`name`= '".$_POST['name']."',
							`time`= '60\n90',
							`price`= '".$_POST['price_0']."\n".$_POST['price_1']."',
							`about`= '".$_POST['about']."',
							`text`= '".$_POST['text']."'
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
			$SQL = "SELECT * FROM `".$table."` WHERE `type`=1 ORDER BY `id` DESC LIMIT ".$count_data.", 20";
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
				<th>Название</th>
				<th>Цена</th>
			  <th style="width: 7.5em;"></th>
			</tr>
		  </thead>
		  <tbody>
		  
		  <?
				for ($i = 0; $i < $count; ++$i)
				{
					$id = mysql_result($result, $i, 'id');
					$name = mysql_result($result, $i, 'name');
					$price = explode("\n", mysql_result($result, $i, 'price'));
					
				
		  ?>
		  
			<tr>
			  <td><?echo $id;?></td>
			  <td><?echo $name;?></td>
			  <td><?echo $price[0];?></td>
			  
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