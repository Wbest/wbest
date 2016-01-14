<?
	session_start();
	Header("Content-Type: text/html;charset=UTF-8");

	include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	$title = "Квартира";
	include $_SERVER['DOCUMENT_ROOT']."/pn/header.html";
	if (!isset($_SESSION["user_id"]))
	{
		?></br><p align="center"><font color="red">Вы не вошли под своим именем</font></p><?
		include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
		exit;
	}
	$table = 'flat';
	$page_url = 'flat';
	$title_page = $title;
	
	if (!is_dir($_SERVER['DOCUMENT_ROOT']."/images/".$page_url))
	{
		mkdir($_SERVER['DOCUMENT_ROOT']."/images/".$page_url, 0777);
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

			$SQL = "SELECT * FROM `".$table."` WHERE `id`=".$_GET['edit']."";
	
			$result = mysql_query($SQL);
			$id = mysql_result($result, 0, 'id');
			$number = mysql_result($result, 0, 'number');
			$plan = mysql_result($result, 0, 'plan');
			$path = mysql_result($result, 0, 'path');
			$about = mysql_result($result, 0, 'about');
			$id_complex = mysql_result($result, 0, 'id_complex');
			$id_floor = mysql_result($result, 0, 'id_floor');
			?>
			
			<div class="header">
            
            <h1 class="page-title"><?echo $title_page;?></h1>
                    <ul class="breadcrumb">
            <li><a href="/pn/">Главная</a> </li>
			<li><a href="/pn/complex.php">ЖК</a> </li>
            <li class="active">Изменить</li>
        </ul>

        </div>
        <div class="main-content">
			<div class="row">
		  <div class="col-md-4">
		
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane active in" id="home">
			  <form name="tab" id="tab" action="/pn/<?echo $page_url;?>.php?page=<?echo $_GET['page'];?>" method="post"  enctype="multipart/form-data">
				<div class="form-group">
				<label>Номер</label>
				<input type="text" value="<?echo $number;?>" name="number" class="form-control">
				</div>
				<?
					$SQL = "SELECT * FROM `floor` WHERE `id_complex`=".$id_complex." ORDER BY `id`";
					$result_floor = mysql_query($SQL);
					$count_floor = mysql_num_rows($result_floor);
					$plan_floor = mysql_result($result_floor, 0, 'plan');
				?>
				<div class="form-group">
				<label>Этаж</label>
					<select name="id_floor" class="form-control" onChange="load_coord();">
						<?for ($j = 0; $j < $count_floor; ++$j)
							{
								$id_floor_temp = mysql_result($result_floor, $j, 'id');
								$name_floor = mysql_result($result_floor, $j, 'name');
							?>
							<option <?if ($id_floor == $id_floor_temp) {$plan_floor = mysql_result($result_floor, $j, 'plan');?>selected<?}?> value="<?echo $id_floor_temp;?>"><?echo $name_floor;?></option>
						<?}?>
					</select>
				</div>
				<div class="form-group">
				<label>План квартиры</label>
				<p><img src="<?echo $plan;?>" width="300px;"></p>
				<input type="file" name="plan" class="form-control">
				</div>
				<div class="form-group" id="load_coord">
				<div class="span6">
					<label>Координаты объекта</label>
					 <input type="text" name="path" id="path" class="canvas-area input-xxlarge" value="<?echo str_replace("z", "", str_replace("L", "", str_replace("M","",$path)))?>" placeholder="Shape Coordinates" data-image-url="<?echo $plan_floor;?>">
				</div>	
				</div>
			   <div class="form-group">
				<label>Описание</label>
				<textarea  name="about" class="form-control"><?echo $about;?></textarea>
				</div>
				
			   
			  </div>
			</div>
			<input type="hidden" name="id_complex" value="<?echo $id_complex;?>">
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
					<li><a href="/pn/complex.php">ЖК</a></li>
					<li class="active">Добавить данные</li>
				</ul>

				</div>
				<div class="main-content">
					<div class="row">
		  <div class="col-md-4">
		
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane active in" id="home">
			  <form name="tab" id="tab" action="/pn/<?echo $page_url;?>.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label>Номер</label>
				<input type="text" value="<?echo $number;?>" name="number" class="form-control">
				</div>
				<?
					$SQL = "SELECT * FROM `floor` WHERE `id_complex`=".$_GET['add']." ORDER BY `id`";
					$result_floor = mysql_query($SQL);
					$count_floor = mysql_num_rows($result_floor);
					$plan_floor = mysql_result($result_floor, 0, 'plan');
				?>
				<div class="form-group">
				<label>Этаж</label>
					<select name="id_floor" class="form-control" onChange="load_coord();">
						<?for ($j = 0; $j < $count_floor; ++$j)
							{
								$id_floor = mysql_result($result_floor, $j, 'id');
								$name_floor = mysql_result($result_floor, $j, 'name');
							?>
							<option value="<?echo $id_floor;?>"><?echo $name_floor;?></option>
						<?}?>
					</select>
				</div>
				<div class="form-group">
				<label>План квартиры</label>
				<input type="file" name="plan" class="form-control">
				</div>
				<div class="form-group" id="load_coord">
				<div class="span6">
					<label>Координаты объекта</label>
					 <input type="text" name="path" id="path" class="canvas-area input-xxlarge" value="" placeholder="Shape Coordinates" data-image-url="<?echo $plan_floor;?>">
				</div>	
				</div>
			   <div class="form-group">
				<label>Описание</label>
				<textarea  name="about" class="form-control"><?echo $about;?></textarea>
				</div>
			  </div>
			</div>
			<input type="hidden" name="id_complex" value="<?echo $_GET['add'];?>">
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
						$plan = "";
						$SQL = "SELECT MAX(`id`) as `max_id` FROM `".$table."`";
						$result = mysql_query($SQL);
						if (mysql_num_rows($result) > 0) {
							$max_id = mysql_result($result, 0, 'max_id') + 1;
						} else {
							$max_id = 1;
						}
						if (basename($_FILES['plan']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['plan']['name']));
							$plan = '/images/'.$page_url.'/plan_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['plan']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$plan);	
						}
						$path = "M".$_POST['path']."z";
						$SQL = "INSERT INTO ".$table."  (`id`, `id_floor`, `id_complex`, `number`, `plan`, `path`, `about`) VALUES (NULL, '".$_POST['id_floor']."', '".$_POST['id_complex']."' , '".$_POST['number']."', '".$plan."', '".$path."', '".$_POST['about']."');";
						
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
						$plan = mysql_result($result, 0, 'plan');
						$max_id = $_POST['edit_data'];
						
						if (basename($_FILES['plan']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['plan']['name']));
							$plan = '/images/'.$page_url.'/plan_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['plan']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$plan);	
						}
						
						$path = "M".$_POST['path']."z";
						
							$SQL = "UPDATE ".$table." SET
							`path`='".$path."',
							`number`='".$_POST['number']."',
							`about`='".$_POST['about']."',
							`id_floor`='".$_POST['id_floor']."',
							`plan`='".$plan."'
							
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
		
				?><br/>
				<a href="/pn/complex.php">Назад</a>
		
		<?}
		}?>

	<script language="javascript" src="/libs/canvasAreaDraw/jquery.canvasAreaDraw.min.js"></script>  
	<script>
		function load_coord() {
			$.ajax({
				url: "/pn/load_coord.php", 
				type: "POST",       
				data: {"id_floor": document.tab.id_floor.value},
				cache: false,			
				success: function(response){
						document.getElementById('load_coord').innerHTML = '';
						$("#load_coord").append(response);			
				}
			});
		}
	</script>
<?
	include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
?>