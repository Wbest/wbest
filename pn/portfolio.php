<?
	session_start();
	Header("Content-Type: text/html;charset=UTF-8");
	include $_SERVER['DOCUMENT_ROOT']."/pn/classSimpleImage.php";	
	include $_SERVER['DOCUMENT_ROOT']."/pn/url_translit.php";	
	include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	$title = "Портфолио";
	include $_SERVER['DOCUMENT_ROOT']."/pn/header.html";
	if (!isset($_SESSION["user_id"]))
	{
		?></br><p align="center"><font color="red">Вы не вошли под своим именем</font></p><?
		include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
		exit;
	}
	$table = 'portfolio';
	$page_url = 'portfolio';
	$title_page = $title;
	
	if (!is_dir($_SERVER['DOCUMENT_ROOT']."/load/images/".$page_url))
	{
		mkdir($_SERVER['DOCUMENT_ROOT']."/load/images/".$page_url, 0777);
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
			include $_SERVER['DOCUMENT_ROOT']."/pn/editorFull.php";

			$SQL = "SELECT * FROM `".$table."` WHERE id=".$_GET['edit']."";
	
			$result = mysql_query($SQL);
			$id = mysql_result($result, 0, 'id');
			$name = mysql_result($result, 0, 'name');
			$text = mysql_result($result, 0, 'text');
			$about = mysql_result($result, 0, 'about');
			$title = mysql_result($result, 0, 'title');
			$description = mysql_result($result, 0, 'description');
			$keywords = mysql_result($result, 0, 'keywords');
			$date = mysql_result($result, 0, 'date');
			$img_small = mysql_result($result, 0, 'img_small');
			$img_medium = mysql_result($result, 0, 'img_medium');
			$img_large = mysql_result($result, 0, 'img_large');
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
		  <div class="col-md-12">
		
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane active in" id="home">
			  <form id="tab" action="/pn/<?echo $page_url;?>.php?page=<?echo $_GET['page'];?>" method="post"  enctype="multipart/form-data">
				<div class="form-group">
				<label>Название</label>
				<input type="text" value="<?echo $name;?>" name="name" class="form-control">
				</div>
				<div class="form-group">
				<label>Дата</label>
				<input type="text" value="<?echo $date;?>" name="date" class="form-control date">
				</div>
				<script>
					$(document).ready(function () {
						$(".date").kendoDateTimePicker({
							value:new Date("<?echo $date;?>"),	format: "yyyy-MM-dd HH:mm:ss"
						});
					});
				</script>
				<div class="form-group">
				<label>Заголовок страницы</label>
				<input type="text" value="<?echo $title;?>" name="title" class="form-control">
				</div>
				<div class="form-group">
				<label>Описание страницы</label>
				<input type="text" value="<?echo $description;?>" name="description" class="form-control">
				</div>
				<div class="form-group">
				<label>Ключевые слова</label>
				<input type="text" value="<?echo $keywords;?>" name="keywords" class="form-control">
				</div>
				<div class="form-group">
				<label>Краткое описание</label>
				<textarea name="about" class="form-control mceNoEditor"><?echo $about;?></textarea>
				</div>
				<div class="form-group">
					<label>Маленькая картинка</label>
					<div id="img_small_0">
						<p><img src="/load/images/portfolio/<?echo $img_small;?>" width="300px;"></p>
						<a href="javascript:void(0)" onClick="delete_element_img('img_small','<?echo $id;?>','0')">Удалить</a>
					</div>
					<input type="file" value="" name="img_small" class="form-control">
				</div>
				<div class="form-group">
					<label>Средняя картинка</label>
					<div id="img_medium_0">
						<p><img src="/load/images/portfolio/<?echo $img_medium;?>" width="300px;"></p>
						<a href="javascript:void(0)" onClick="delete_element_img('img_medium','<?echo $id;?>','0')">Удалить</a>
					</div>
					<input type="file" value="" name="img_medium" class="form-control">
				</div>
				<div class="form-group">
					<label>Большая картинка</label>
					<div id="img_large_0">
						<p><img src="/load/images/portfolio/<?echo $img_large;?>" width="300px;"></p>
						<a href="javascript:void(0)" onClick="delete_element_img('img_large','<?echo $id;?>','0')">Удалить</a>
					</div>
					<input type="file" value="" name="img_large" class="form-control">
				</div>
				<div class="form-group">
				<label>Текст</label>
				<textarea name="text" class="form-control mceEditor"><?echo $text;?></textarea>
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
					include $_SERVER['DOCUMENT_ROOT']."/pn/editorFull.php";
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
		  <div class="col-md-12">
		
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane active in" id="home">
			  <form id="tab" action="/pn/<?echo $page_url;?>.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label>Название</label>
				<input type="text" value="<?echo $name;?>" name="name" class="form-control">
				</div>
				<div class="form-group">
				<label>Дата</label>
				<input type="text" value="<?echo $date;?>" name="date" class="form-control date">
				</div>
				<script>
					$(document).ready(function () {
						$(".date").kendoDateTimePicker({
							value:new Date(),	format: "yyyy-MM-dd HH:mm:ss"
						});
					});
				</script>
				<div class="form-group">
				<label>Заголовок страницы</label>
				<input type="text" value="" name="title" class="form-control">
				</div>
				<div class="form-group">
				<label>Описание страницы</label>
				<input type="text" value="<?echo $description;?>" name="description" class="form-control">
				</div>
				<div class="form-group">
				<label>Ключевые слова</label>
				<input type="text" value="<?echo $keywords;?>" name="keywords" class="form-control">
				</div>
				<div class="form-group">
				<label>Краткое описание</label>
				<textarea name="about" class="form-control mceNoEditor"><?echo $about;?></textarea>
				</div>
				<div class="form-group">
					<label>Маленькая картинка</label>
					<input type="file" value="" name="img_small" class="form-control">
				</div>
				<div class="form-group">
					<label>Средняя картинка</label>
					<input type="file" value="" name="img_medium" class="form-control">
				</div>
				<div class="form-group">
					<label>Большая картинка</label>
					<input type="file" value="" name="img_large" class="form-control">
				</div>
				<div class="form-group">
				<label>Текст</label>
				<textarea name="text" class="form-control mceEditor"><?echo $text;?></textarea>
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
						$img_large = "";
						$img_small = "";
						$img_medium = "";
						$dir = $_SERVER['DOCUMENT_ROOT'].'/load/images/'.$page_url.'/';
						if (basename($_FILES['img_small']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img_small']['name']));
							$img_small = substr_replace(sha1(microtime(true)), '', 12).'.'.$path_info['extension'];
							move_uploaded_file($_FILES['img_small']['tmp_name'], $dir.$img_small);
							$image = new SimpleImage();
							$image->load($dir.$img_small);
							$image->resizeToWidth(400);
							$image->save($dir.$img_small);
						}
						if (basename($_FILES['img_medium']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img_medium']['name']));
							$img_medium = substr_replace(sha1(microtime(true)), '', 12).'.'.$path_info['extension'];
							move_uploaded_file($_FILES['img_medium']['tmp_name'], $dir.$img_medium);
							$image = new SimpleImage();
							$image->load($dir.$img_medium);
							$image->resizeToWidth(2000);
							$image->save($dir.$img_medium);
						}
						if (basename($_FILES['img_large']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img_large']['name']));
							$img_large = substr_replace(sha1(microtime(true)), '', 12).'.'.$path_info['extension'];
							move_uploaded_file($_FILES['img_large']['tmp_name'], $dir.$img_large);
							$image = new SimpleImage();
							$image->load($dir.$img_large);
							$image->resizeToWidth(2000);
							$image->save($dir.$img_large);
						}

						$SQL = "INSERT INTO `".$table."` (`id`, `name`, `about`, `text`, `date`, `title`, `description`, `keywords`, `img_small`, `img_medium`, `img_large`) VALUES (NULL, '".mysql_real_escape_string($_POST['name'])."', '".mysql_real_escape_string($_POST['about'])."', '".mysql_real_escape_string($_POST['text'])."', '".mysql_real_escape_string($_POST['date'])."', '".mysql_real_escape_string($_POST['title'])."', '".mysql_real_escape_string($_POST['description'])."', '".mysql_real_escape_string($_POST['keywords'])."', '".$img_small."', '".$img_medium."', '".$img_large."');";
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
						$img_large = "";
						$img_small = "";
						$img_medium = "";
						$dir = $_SERVER['DOCUMENT_ROOT'].'/load/images/'.$page_url.'/';
						if (basename($_FILES['img_small']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img_small']['name']));
							$img_small = substr_replace(sha1(microtime(true)), '', 12).'.'.$path_info['extension'];
							move_uploaded_file($_FILES['img_small']['tmp_name'], $dir.$img_small);
							$image = new SimpleImage();
							$image->load($dir.$img_small);
							$image->resizeToWidth(400);
							$image->save($dir.$img_small);
							$img_small = "`img_small`='".$img_small."', ";
						}
						if (basename($_FILES['img_medium']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img_medium']['name']));
							$img_medium = substr_replace(sha1(microtime(true)), '', 12).'.'.$path_info['extension'];
							move_uploaded_file($_FILES['img_medium']['tmp_name'], $dir.$img_medium);
							$image = new SimpleImage();
							$image->load($dir.$img_medium);
							$image->resizeToWidth(2000);
							$image->save($dir.$img_medium);
							$img_medium = "`img_medium`='".$img_medium."', ";
						}
						if (basename($_FILES['img_large']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img_large']['name']));
							$img_large = substr_replace(sha1(microtime(true)), '', 12).'.'.$path_info['extension'];
							move_uploaded_file($_FILES['img_large']['tmp_name'], $dir.$img_large);
							$image = new SimpleImage();
							$image->load($dir.$img_large);
							$image->resizeToWidth(2000);
							$image->save($dir.$img_large);
							$img_large = "`img_large`='".$img_large."', ";
						}
					
						$SQL = "UPDATE ".$table." SET
						".$img_small.$img_medium.$img_large."
						`name`='".mysql_real_escape_string($_POST['name'])."', `about`='".mysql_real_escape_string($_POST['about'])."', `text`='".mysql_real_escape_string($_POST['text'])."', `date`='".mysql_real_escape_string($_POST['date'])."', `title`='".mysql_real_escape_string($_POST['title'])."', `description`='".mysql_real_escape_string($_POST['description'])."', `keywords`='".mysql_real_escape_string($_POST['keywords'])."'
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
			  <th>Название</th>
			  <th>Описание</th>
			  <th style="width: 100px;">Дата</th>
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
					$about = mysql_result($result, $i, 'about');
					$date = mysql_result($result, $i, 'date');
		  ?>
		  
			<tr>
			  <td><?echo $id;?></td>
			  <td><?echo $name;?></td>
			  <td><?echo $about;?></td>
			  <td><?echo $date;?></td>
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