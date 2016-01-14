<?
	session_start();
	Header("Content-Type: text/html;charset=UTF-8");
	include $_SERVER['DOCUMENT_ROOT']."/pn/classSimpleImage.php";		
	include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	$title = "Баннер";
	include $_SERVER['DOCUMENT_ROOT']."/pn/header.html";
	if (!isset($_SESSION["user_id"]))
	{
		?></br><p align="center"><font color="red">Вы не вошли под своим именем</font></p><?
		include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
		exit;
	}
	$table = 'banner';
	$page_url = 'banner';
	$title_page = 'Баннер';
		
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
			//include $_SERVER['DOCUMENT_ROOT']."/pn/editor.php";

			$SQL = "SELECT * FROM `".$table."` WHERE id=".$_GET['edit']."";
	
			$result = mysql_query($SQL);
			$id = mysql_result($result, 0, 'id');
			$caption_big = mysql_result($result, 0, 'caption_big');
			$caption_small = mysql_result($result, 0, 'caption_small');
			$img = mysql_result($result, 0, 'img');
			$url = mysql_result($result, 0, 'url');
			$text = mysql_result($result, 0, 'text');
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
				<label>Большой заголовок</label>
				<input type="text" value="<?echo $caption_big;?>" name="caption_big" class="form-control">
				</div>
				<div class="form-group">
				<label>Маленький заголовок</label>
				<input type="text" value="<?echo $caption_small;?>" name="caption_small" class="form-control">
				</div>
				<div class="form-group">
				<label>Ссылка</label>
				<input type="text" value="<?echo $url;?>" name="url" class="form-control">
				</div>
				<div class="form-group">
				<label>Картинка</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
				<div class="form-group" >
				<label>Текст</label>
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
					//include $_SERVER['DOCUMENT_ROOT']."/pn/editor.php";
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
				<label>Большой заголовок</label>
				<input type="text" value="<?echo $caption_big;?>" name="caption_big" class="form-control">
				</div>
				
				<div class="form-group">
				<label>Маленький заголовок</label>
				<input type="text" value="<?echo $caption_small;?>" name="caption_small" class="form-control">
				</div>
				<div class="form-group">
				<label>Ссылка</label>
				<input type="text" value="<?echo $url;?>" name="url" class="form-control">
				</div>
				<div class="form-group">
				<label>Картинка</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
				<div class="form-group" >
				<label>Текст</label>
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
						if (basename($_FILES['img']['name']) != '')
						{
							$img = '/images/'.$page_url.'/'.basename($_FILES['img']['name']);
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);
						}
						
						$SQL = "INSERT INTO `".$table."`(
						`id` , 
						`caption_big` ,
						`caption_small` ,
						`text`,
						`url`,
						`img`
						)
						VALUES (
						NULL ,  '".$_POST['caption_big']."', '".$_POST['caption_small']."','".$_POST['text']."','".$_POST['url']."', '".$img."'
						);";
					
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
						
						if (basename($_FILES['img']['name']) != '')
						{
							$img = '/images/'.$page_url.'/'.basename($_FILES['img']['name']);
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);
							$img = "`img`='".$img."', ";
						} 
						
							$SQL = "UPDATE ".$table." SET
							".$img."
							`caption_big`= '".$_POST['caption_big']."',
							`url`= '".$_POST['url']."',
							`caption_small`= '".$_POST['caption_small']."',
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
			<th>Большой заголовок</th>
			<th>Маленький заголовок</th>
			<th>Картинка</th>
			  <th style="width: 7.5em;"></th>
			</tr>
		  </thead>
		  <tbody>
		  
		  <?
				for ($i = 0; $i < $count; ++$i)
				{
					$id = mysql_result($result, $i, 'id');
					$caption_big = mysql_result($result, $i, 'caption_big');
					$img = mysql_result($result, $i, 'img');
					$caption_small = mysql_result($result, $i, 'caption_small');	
				
		  ?>
		  
			<tr>
			  <td><?echo $id;?></td>
		
			  <td><?echo $caption_big;?></td>
			  <td><?echo $caption_small;?></td>
				<td><img src="<?echo $img;?>" style="width: 150px;"></td>

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