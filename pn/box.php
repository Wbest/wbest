<?
	session_start();
	Header("Content-Type: text/html;charset=UTF-8");
	include $_SERVER['DOCUMENT_ROOT']."/pn/url_translit.php";
	include $_SERVER['DOCUMENT_ROOT']."/pn/classSimpleImage.php";	
		
			
	include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	$title = "Гаражные боксы";
	include $_SERVER['DOCUMENT_ROOT']."/pn/header.html";
	if (!isset($_SESSION["user_id"]))
	{
		?></br><p align="center"><font color="red">Вы не вошли под своим именем</font></p><?
		include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
		exit;
	}
	$table = 'box';
	$page_url = 'box';
	$title_page = $title;
	if (!is_dir($_SERVER['DOCUMENT_ROOT']."/images/".$page_url)) {
		mkdir($_SERVER['DOCUMENT_ROOT']."/images/".$page_url, 0777);
	}
	if (!is_dir($_SERVER['DOCUMENT_ROOT']."/files/".$page_url)) {
		mkdir($_SERVER['DOCUMENT_ROOT']."/files/".$page_url, 0777);
	}
	if (isset($_GET['del']))
	{
		$sql = "DELETE FROM `".$table."` WHERE `id` = ".$_GET['del']."";
		mysql_query($sql);
	}
	if (isset($_GET['del_floor']))
	{
		$sql = "DELETE FROM `floor_box` WHERE `id` = ".$_GET['del_floor']."";
		mysql_query($sql);
	}
	if (isset($_GET['del_flat']))
	{
		$sql = "DELETE FROM `flat_box` WHERE `id` = ".$_GET['del_flat']."";
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
<script src="//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
        <?
		if (isset($_GET['edit']))
		{
			include $_SERVER['DOCUMENT_ROOT']."/pn/editor.php";

			$SQL = "SELECT * FROM `".$table."` WHERE `id`=".$_GET['edit']."";
	
			$result = mysql_query($SQL);
			$id = mysql_result($result, 0, 'id');
			$name = mysql_result($result, 0, 'name');
			$about = mysql_result($result, 0, 'about');
			$img = mysql_result($result, 0, 'img');
			$banner = mysql_result($result, 0, 'banner');
			$declaration = mysql_result($result, 0, 'declaration');
			$progress_build = mysql_result($result, 0, 'progress_build');
			$otdelka = mysql_result($result, 0, 'otdelka');
			$x = mysql_result($result, 0, 'x');
			$y = mysql_result($result, 0, 'y');
			$status = mysql_result($result, 0, 'status');
			$plan = mysql_result($result, 0, 'plan');
			?>
<script type="text/javascript">
	ymaps.ready(init);
	var myMap;

	function init () {
	 <?if ($x == ""){?>

		var myMap = new ymaps.Map("map", {
			center: [59.133773, 37.905570],
			zoom: 12,
				behaviors:['default', 'scrollZoom']
			});
			<?}else{?>
				var myMap = new ymaps.Map("map", {

			center: [<?echo $x;?>, <?echo $y;?>],
			 zoom: 16,
				behaviors:['default', 'scrollZoom']
			}),
		   // Создаем метку с помощью вспомогательного класса.
			myPlacemark1 = new ymaps.Placemark([<?echo $x;?>, <?echo $y;?>], {
				// Свойства.
				// Содержимое иконки, балуна и хинта.
				iconContent: '',
				balloonContent: '',
				hintContent: ''
			}, {
				// Опции.
				// Стандартная фиолетовая иконка.
				preset: 'twirl#blueStretchyIcon'
			});

		<?}?>
		// Для добавления элемента управления на карту
		// используется поле map.controls.
		// Это поле содержит ссылку на экземпляр класса map.control.Manager.
		
		// Добавление элемента в коллекцию производится
		// с помощью метода add.

		// В метод add можно передать строковый идентификатор
		// элемента управления и его параметры.
		myMap.controls
			// Кнопка изменения масштаба.
			.add('zoomControl', { left: 5, top: 5 })
			// Список типов карты
			.add('typeSelector')
			// Стандартный набор кнопок
			.add('mapTools', { left: 35, top: 5 });


		
		// Обработка события, возникающего при щелчке
		// левой кнопкой мыши в любой точке карты.
		// При возникновении такого события откроем балун.
		myMap.events.add('click', function (e) {
			if (!myMap.balloon.isOpen()) {
				var coords = e.get('coordPosition');
				myMap.balloon.open(coords, {
					contentHeader:'Событие!',
					contentBody:'<p>Координаты объекта выбраны.</p>' +
						'<p>Координаты щелчка: ' + [
						coords[0].toPrecision(6),
						coords[1].toPrecision(6)
						].join(', ') + '</p>',
					contentFooter:'<sup></sup>'
				});
				document.tab.x.value = coords[0].toPrecision(6);
				document.tab.y.value = coords[1].toPrecision(6);
				
			}
			else {
				myMap.balloon.close();
			}
		});
		<?if ($x != ""){?>
		// Добавляем все метки на карту.
		myMap.geoObjects
			.add(myPlacemark1);
		<?}?>
		// Обработка события, возникающего при щелчке
		// правой кнопки мыши в любой точке карты.
		// При возникновении такого события покажем всплывающую подсказку
		// в точке щелчка.
		myMap.events.add('contextmenu', function (e) {
			myMap.hint.show(e.get('coordPosition'), 'Кто-то щелкнул правой кнопкой');
		});
		

	}
</script>			
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
			<form name="tab" id="tab" action="/pn/<?echo $page_url;?>.php" method="post"  enctype="multipart/form-data">
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane active in" id="home">
			  
				<div class="form-group">
				<label>Название</label>
				<input type="text" value="<?echo $name;?>" name="name" class="form-control">
				</div>
				
				<div class="form-group">
				<label>Картинка ГБ</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" value="" name="img" class="form-control">
				</div>
				
				<div class="form-group">
				<label>Баннер</label>
				<p><img src="<?echo $banner;?>" width="300px;"></p>
				<input type="file" value="" name="banner" class="form-control">
				</div>
				
				<div class="form-group">
				<label>План этажей</label>
				<p><img src="<?echo $plan;?>" width="300px;"></p>
				<input type="file" value="" name="plan" class="form-control">
				</div>
				
				<div class="form-group">
				<label>Проектная декларация</label>
					<p>
					 <?
						$declaration = explode("\n", $declaration);
						if ($declaration[0] != '') {
							for ($i = 0; $i < count($declaration) - 1; ++$i)
							{
								?><div id="declaration_<?echo $i;?>" class="img_edit_Element">
								<?echo basename($declaration[$i]);?>
								<a href="javascript:void(0)" onClick="delete_element_img('declaration','<?echo $id;?>','<?echo $i;?>')">Удалить</a>
								</div><?
							}
						}
						?>
								  </p>
				<input type="file" value="" name="declaration[]" multiple class="form-control">
				</div>
				
				<div class="form-group">
				<label>Ход строительства</label>
					<p>
					 <?
						$progress_build = explode("\n", $progress_build);
						if ($progress_build[0] != '') {
							for ($i = 0; $i < count($progress_build) - 1; ++$i)
							{
								?><div id="progress_build_<?echo $i;?>" class="img_edit_Element">
								<img  src="<?if (file_exists($_SERVER['DOCUMENT_ROOT'].dirname($progress_build[$i]).'/small_'.basename($progress_build[$i]))) {echo dirname($progress_build[$i]).'/small_'.basename($progress_build[$i]);} else { echo $progress_build[$i];}?>" width="70" >
								<a href="javascript:void(0)" onClick="delete_element_img('progress_build','<?echo $id;?>','<?echo $i;?>')">Удалить</a>
								</div><?
							}
						}
						?>
					</p>
				<input type="file" value="" name="progress_build[]" multiple class="form-control">
				</div>
				
				
				<div class="form-group">
				<label style="vertical-align:top;line-height:2.2;">Реализованный объект</label>
				<input type="checkbox" value="1" <?if ($status == '1') {?>checked<?}?>  name="status" class="" style="width:24px;height:24px;">
				</div>
				
				<div class="form-group">
				<label>Отделка</label>
				<textarea  name="otdelka" class="form-control"><?echo $otdelka;?></textarea>
				</div>
				<div class="form-group">
				<label>Описание</label>
				<textarea  name="about" class="form-control"><?echo $about;?></textarea>
				</div>
				<div class="input-group" style="width: 100%;">
					Для выбора объекта щелкните левой кнопкой мыши на карте.
					<div id="map" style="width:100%; height:300px"></div>
				</div>
				
			  </div>
			</div>
			<br/>
			<input type="hidden" name="x" value="<?echo $x;?>">
			<input type="hidden" name="y" value="<?echo $y;?>">
			<div class="btn-toolbar list-toolbar">
			  <input type="submit" class="btn btn-primary" value="Изменить">
			  <a href="/pn/<?echo $page_url;?>.php" class="btn btn-danger">Отмена</a>
					  <input type="hidden" name="edit_data" value="<?echo $id;?>">
			   
			</div>
			</form>
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
<script type="text/javascript">
ymaps.ready(init);
var myMap;

function init () {
    myMap = new ymaps.Map("map", {
        center: [59.133773, 37.905570],
        zoom: 11,
		        // Включим поведения по умолчанию (default)
        // и добавим масштабирование колесом мыши.
        behaviors:['default', 'scrollZoom']
    }, {
        balloonMaxWidth: 200
    });

	
    // Для добавления элемента управления на карту
    // используется поле map.controls.
    // Это поле содержит ссылку на экземпляр класса map.control.Manager.
    
    // Добавление элемента в коллекцию производится
    // с помощью метода add.

    // В метод add можно передать строковый идентификатор
    // элемента управления и его параметры.
    myMap.controls
        // Кнопка изменения масштаба.
        .add('zoomControl', { left: 5, top: 5 })
        // Список типов карты
        .add('typeSelector')
        // Стандартный набор кнопок
        .add('mapTools', { left: 35, top: 5 });


	
    // Обработка события, возникающего при щелчке
    // левой кнопкой мыши в любой точке карты.
    // При возникновении такого события откроем балун.
    myMap.events.add('click', function (e) {
        if (!myMap.balloon.isOpen()) {
            var coords = e.get('coordPosition');
            myMap.balloon.open(coords, {
                contentHeader:'Событие!',
                contentBody:'<p>Координаты объекта выбраны.</p>' +
                    '<p>Координаты щелчка: ' + [
                    coords[0].toPrecision(6),
                    coords[1].toPrecision(6)
                    ].join(', ') + '</p>',
                contentFooter:'<sup></sup>'
            });
			document.tab.x.value = coords[0].toPrecision(6);
			document.tab.y.value = coords[1].toPrecision(6);
			
        }
        else {
            myMap.balloon.close();
        }
    });

    // Обработка события, возникающего при щелчке
    // правой кнопки мыши в любой точке карты.
    // При возникновении такого события покажем всплывающую подсказку
    // в точке щелчка.
    myMap.events.add('contextmenu', function (e) {
        myMap.hint.show(e.get('coordPosition'), 'Кто-то щелкнул правой кнопкой');
    });
}
</script>					
					
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
		 <form name="tab" id="tab" action="/pn/<?echo $page_url;?>.php" method="post" enctype="multipart/form-data">
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane active in" id="home">
			 
				<div class="form-group">
				<label>Название</label>
				<input type="text" value="<?echo $name;?>" name="name" class="form-control">
				</div>
				
				<div class="form-group">
				<label>Картинка ГБ</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" value="" name="img" class="form-control">
				</div>
				
				<div class="form-group">
				<label>План этажей</label>
				<p><img src="<?echo $plan;?>" width="300px;"></p>
				<input type="file" value="" name="plan" class="form-control">
				</div>
				
				<div class="form-group">
				<label>Баннер</label>
				<p><img src="<?echo $banner;?>" width="300px;"></p>
				<input type="file" value="" name="banner" class="form-control">
				</div>
				
				<div class="form-group">
				<label>Проектная декларация</label>
					
				<input type="file" value="" name="declaration[]" multiple class="form-control">
				</div>
				
				<div class="form-group">
				<label>Ход строительства</label>
					
				<input type="file" value="" name="progress_build[]" multiple class="form-control">
				</div>
				
				
				<div class="form-group">
				<label style="vertical-align:top;line-height:2.2;">Реализованный объект</label>
				<input type="checkbox" value="1" <?if ($status == '1') {?>checked<?}?>  name="status" class="" style="width:24px;height:24px;">
				</div>
				
				<div class="form-group">
				<label>Отделка</label>
				<textarea  name="otdelka" class="form-control"><?echo $otdelka;?></textarea>
				</div>
				<div class="form-group">
				<label>Описание</label>
				<textarea  name="about" class="form-control"><?echo $about;?></textarea>
				</div>
				<div class="input-group" style="width: 100%;">
					Для выбора объекта щелкните левой кнопкой мыши на карте.
					<div id="map" style="width:100%; height:300px"></div>
				</div><br/>
			   <input type="hidden" name="x" value="<?echo $x;?>">
			<input type="hidden" name="y" value="<?echo $y;?>">
			  </div>
			</div>

			<div class="btn-toolbar list-toolbar">
			  <input type="submit" class="btn btn-primary" value="Добавить">
			  <a href="/pn/<?echo $page_url;?>.php" class="btn btn-danger">Отмена</a>
			  	<input type="hidden" name="add_data">
			</div>
			</form>
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
						$url = str2url($_POST['name']);
						$img = '';
						$banner = '';
						$plan = '';
						$progress_build = '';
						$declaration = '';
						$SQL = "SELECT MAX(`id`) as `max_id` FROM `".$table."`";
						$result = mysql_query($SQL);
						if (mysql_num_rows($result) > 0) {
							$max_id = mysql_result($result, 0, 'max_id') + 1;
						} else {
							$max_id = 1;
						}
						
						if (basename($_FILES['banner']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['banner']['name']));
							$banner = '/images/'.$page_url.'/banner_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['banner']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$banner);	
						}
						if (basename($_FILES['plan']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['plan']['name']));
							$plan = '/images/'.$page_url.'/plan_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['plan']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$plan);	
						}
						
						if (basename($_FILES['img']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img']['name']));
							$img = '/images/'.$page_url.'/img_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);	
						}
							$number = 0;
							if(count($_FILES['progress_build'])) { 
								foreach ($_FILES['progress_build']['name'] as $key => $value) {
									if ($value != '') {
										$path_info = pathinfo(basename($value));
										$upload_file = '/images/'.$page_url.'/progress_build_'.$max_id."_".$number."_".rand(0,1000).".".$path_info['extension'];					
										move_uploaded_file($_FILES['progress_build']['tmp_name'][$key], $_SERVER['DOCUMENT_ROOT'].$upload_file); 
										$progress_build = $progress_build.$upload_file."\n";
										$number++;
										$image = new SimpleImage();
										$image->load($_SERVER['DOCUMENT_ROOT'].$upload_file);
										$image->resizeToWidth(300);
										$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($upload_file));
									}
								}
							}
							$number = 0;
							if(count($_FILES['declaration'])) { 
								foreach ($_FILES['declaration']['name'] as $key => $value) {
									if ($value != '') {
										//$path_info = pathinfo(basename($value));
										//$upload_file = '/files/'.$page_url.'/declaration_'.$max_id."_".$number."_".rand(0,1000).".".$path_info['extension'];
										$upload_file = '/files/'.$page_url.'/'.$value;
										move_uploaded_file($_FILES['declaration']['tmp_name'][$key], $_SERVER['DOCUMENT_ROOT'].$upload_file); 
										$declaration = $declaration.$upload_file."\n";
										$number++;
									}
								}
							}
						$SQL = "INSERT INTO ".$table." (`id`, `name`, `about`, `img`, `banner`, `declaration`, `progress_build`, `otdelka`, `x`, `y`, `status`, `url`, `date`, `plan`) VALUES
						(NULL, '".$_POST['name']."', '".$_POST['about']."', '".$img."', '".$banner."', '".$declaration."', '".$progress_build."', '".$_POST['otdelka']."', '".$_POST['x']."', '".$_POST['y']."', '".$_POST['status']."', '".$url."', '".date('Y-m-d')."', '".$plan."');";
						
						
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
						$url = str2url($_POST['name']);
						$SQL = "SELECT * FROM `".$table."` WHERE `id`=".$_POST['edit_data']."";
						$result = mysql_query($SQL);
						$img = mysql_result($result, 0, 'img');
						$plan = mysql_result($result, 0, 'plan');
						$banner = mysql_result($result, 0, 'banner');
						$progress_build = mysql_result($result, 0, 'progress_build');
						$declaration = mysql_result($result, 0, 'declaration');
						$max_id = $_POST['edit_data'];
						
						if (basename($_FILES['plan']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['plan']['name']));
							$plan = '/images/'.$page_url.'/plan_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['plan']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$plan);	
						}
						if (basename($_FILES['banner']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['banner']['name']));
							$banner = '/images/'.$page_url.'/banner_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['banner']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$banner);	
						}
						if (basename($_FILES['img']['name']) != '')
						{
							$path_info = pathinfo(basename($_FILES['img']['name']));
							$img = '/images/'.$page_url.'/img_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);	
						}
							$number = 0;
							if(count($_FILES['progress_build'])) { 
								foreach ($_FILES['progress_build']['name'] as $key => $value) {
									if ($value != '') {
										$path_info = pathinfo(basename($value));
										$upload_file = '/images/'.$page_url.'/progress_build_'.$max_id."_".$number."_".rand(0,1000).".".$path_info['extension'];					
										move_uploaded_file($_FILES['progress_build']['tmp_name'][$key], $_SERVER['DOCUMENT_ROOT'].$upload_file); 
										$progress_build = $progress_build.$upload_file."\n";
										$number++;
										$image = new SimpleImage();
										$image->load($_SERVER['DOCUMENT_ROOT'].$upload_file);
										$image->resizeToWidth(300);
										$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($upload_file));
									}
								}
							}
							$number = 0;
							if(count($_FILES['declaration'])) { 
								foreach ($_FILES['declaration']['name'] as $key => $value) {
									if ($value != '') {
										//$path_info = pathinfo(basename($value));
										//$upload_file = '/files/'.$page_url.'/declaration_'.$max_id."_".$number."_".rand(0,1000).".".$path_info['extension'];	
										$upload_file = '/files/'.$page_url.'/'.$value;
										move_uploaded_file($_FILES['declaration']['tmp_name'][$key], $_SERVER['DOCUMENT_ROOT'].$upload_file); 
										$declaration = $declaration.$upload_file."\n";
										$number++;
									}
								}
							}
						
							$SQL = "UPDATE `".$table."` SET
							`url`= '".$url."',
							`img`= '".$img."',
							`plan`= '".$plan."',
							`banner`= '".$banner."',
							`declaration`= '".$declaration."',
							`progress_build`= '".$progress_build."',
							`name`= '".$_POST['name']."',
							`x`= '".$_POST['x']."',
							`y`= '".$_POST['y']."',
							`date`= '".date('Y-m-d')."',
							`status`= '".$_POST['status']."',
							`about`= '".str_replace("'","",$_POST['about'])."',
							`otdelka`= '".str_replace("'","",$_POST['otdelka'])."'
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
			  <th>Картинка</th>
			  <th>Название ГБ</th>
			  <th>Описание</th>
			  <th>Этажи</th>
			  <th>Квартиры</th>
			  <th style="width: 2.5em;"></th>
			  <th style="width: 2.5em;"></th>
			</tr>
		  </thead>
		  <tbody>
		  
		  <?
				for ($i = 0; $i < $count; ++$i)
				{
					$id = mysql_result($result, $i, 'id');
					$name = mysql_result($result, $i, 'name');
					$about = mysql_result($result, $i, 'about');
					$img = mysql_result($result, $i, 'img');
					
		  ?>
		  
			<tr>
			  <td><img src="<?echo $img;?>" alt="" width="150" /></td>
			  <td><?echo $name;?></td>
			  <td><?echo $about;?></td>
			  <td>
				  <table>
				  <?
					$SQL = "SELECT * FROM `floor_box` WHERE `id_complex`=".$id." ORDER BY `id`";
					$result_floor = mysql_query($SQL);
					$count_floor = mysql_num_rows($result_floor);
					for ($j = 0; $j < $count_floor; ++$j)
					{
						$id_floor = mysql_result($result_floor, $j, 'id');
						$name_floor = mysql_result($result_floor, $j, 'name');
						?><tr><td style="width: 4.5em;"><?echo $name_floor;?></td><td style="width: 2.0em;"><a href="/pn/floor_box.php?edit=<?echo $id_floor;?>"><i class="fa fa-pencil"></i></a></td><td style="width: 2.0em;"><a href="/pn/<?echo $page_url;?>.php?page=<?echo $page;?>&del_floor=<?echo $id_floor;?>"><i class="fa fa-trash-o"></i></a></td></tr><?
					}
				  ?>
				  </table>
					<a href="/pn/floor_box.php?add=<?echo $id;?>">Добавить этаж</a>
			  </td>
			  <td>
				  <table>
				  <?
					$SQL = "SELECT * FROM `flat_box` WHERE `id_complex`=".$id." ORDER BY `id`";
					$result_flat = mysql_query($SQL);
					$count_flat = mysql_num_rows($result_flat);
					for ($j = 0; $j < $count_flat; ++$j)
					{
						$id_flat = mysql_result($result_flat, $j, 'id');
						$number_flat = mysql_result($result_flat, $j, 'number');
						?><tr><td style="width: 8.5em;">Бокс № <?echo $number_flat;?></td><td style="width: 2.0em;"><a href="/pn/flat_box.php?edit=<?echo $id_flat;?>"><i class="fa fa-pencil"></i></a></td><td style="width: 2.0em;"><a href="/pn/<?echo $page_url;?>.php?page=<?echo $page;?>&del_flat=<?echo $id_flat;?>"><i class="fa fa-trash-o"></i></a></td></tr><?
					}
				  ?>
				  </table>
					<a href="/pn/flat_box.php?add=<?echo $id;?>">Добавить бокс</a>

			  </td>
			  <td>
				  <a href="/pn/<?echo $page_url;?>.php?edit=<?echo $id;?>"><i class="fa fa-pencil"></i></a></td>
			  <td>
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