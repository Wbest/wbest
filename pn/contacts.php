<?
	session_start();
	Header("Content-Type: text/html;charset=UTF-8");
	include $_SERVER['DOCUMENT_ROOT']."/pn/classSimpleImage.php";
	include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	$title = "Контакты";
	include $_SERVER['DOCUMENT_ROOT']."/pn/header.html";
	if (!isset($_SESSION["user_id"]))
	{
		?></br><p align="center"><font color="red">Вы не вошли под своим именем</font></p><?
		include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
		exit;
	}
	$table = 'contacts';
	$page_url = 'contacts';
	$title_page = 'Контакты';
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
<script src="//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU" type="text/javascript"></script>

  
        <?
		if (isset($_GET['edit']))
		{
			include $_SERVER['DOCUMENT_ROOT']."/pn/editor.php";

			$SQL = "SELECT * FROM `".$table."` WHERE id=".$_GET['edit']."";
	
			$result = mysql_query($SQL);
			$id = mysql_result($result, 0, 'id');
			$street = mysql_result($result, 0, 'street');
			$tel = mysql_result($result, 0, 'tel');
			$lat = mysql_result($result, 0, 'lat');
			$lan = mysql_result($result, 0, 'lan');
			$img = mysql_result($result, 0, 'img');
			?>
			<script type="text/javascript">
	ymaps.ready(init);
	var myMap;

	function init () {
	 <?if ($lat == ""){?>

		var myMap = new ymaps.Map("map", {
			center: [59.133773, 37.905570],
			zoom: 12,
				behaviors:['default', 'scrollZoom']
			});
			<?}else{?>
				var myMap = new ymaps.Map("map", {

			center: [<?echo $lat;?>, <?echo $lan;?>],
			 zoom: 16,
				behaviors:['default', 'scrollZoom']
			}),
		   // Создаем метку с помощью вспомогательного класса.
			myPlacemark1 = new ymaps.Placemark([<?echo $lat;?>, <?echo $lan;?>], {
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
				document.form_contacts.lat.value = coords[0].toPrecision(6);
				document.form_contacts.lan.value = coords[1].toPrecision(6);
				
			}
			else {
				myMap.balloon.close();
			}
		});
		<?if ($lat != ""){?>
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
		
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane active in" id="home">
			  <form id="tab" name="form_contacts" action="/pn/<?echo $page_url;?>.php" method="post"  enctype="multipart/form-data">
				<div class="form-group">
				<label>Адрес</label>
				<input type="text" value="<?echo $street;?>" name="street" class="form-control">
				</div>
				<div class="form-group">
				<label>Телефон</label>
				<input type="text" value="<?echo $tel;?>" name="tel" class="form-control">
				</div>
				<div class="form-group">
				<label>Картинка</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
					<div class="input-group" style="width: 100%;">
							Для выбора объекта щелкните левой кнопкой мыши на карте.
							<div id="map" style="width:100%; height:300px"></div>
						</div>
						<br/>
                    <input type="hidden" name="lat" value="<?echo $lat;?>">
					<input type="hidden" name="lan" value="<?echo $lan;?>">
			   
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
			document.form_contacts.lat.value = coords[0].toPrecision(6);
			document.form_contacts.lan.value = coords[1].toPrecision(6);
			
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
		
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane active in" id="home">
			  <form id="tab" name="form_contacts" action="/pn/<?echo $page_url;?>.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
				<label>Адрес</label>
				<input type="text" value="<?echo $street;?>" name="street" class="form-control">
				</div>
				<div class="form-group">
				<label>Телефон</label>
				<input type="text" value="<?echo $tel;?>" name="tel" class="form-control">
				</div>
				<div class="form-group">
				<label>Картинка</label>
				<p><img src="<?echo $img;?>" width="300px;"></p>
				<input type="file" name="img" class="form-control">
				</div>
					<div class="input-group" style="width: 100%;">
							Для выбора объекта щелкните левой кнопкой мыши на карте.
							<div id="map" style="width:100%; height:300px"></div>
						</div>
						<br/>
                    <input type="hidden" name="lat" value="<?echo $lat;?>">
					<input type="hidden" name="lan" value="<?echo $lan;?>">
			   
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
							$img = '/images/'.$page_url.'/contacts_'.$max_id."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);
							$image = new SimpleImage();
							$image->load($_SERVER['DOCUMENT_ROOT'].$img);
							$image->resizeToWidth(300);
							$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($img));
						}
						$SQL = "INSERT INTO `".$table."`(
						`id` , 
						`street` ,
						`tel`,
						`lat`,
						`lan`,
						`img`
						)
						VALUES (
						NULL ,  '".$_POST['street']."', '".$_POST['tel']."', '".$_POST['lat']."', '".$_POST['lan']."', '".$img."'
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
							$path_info = pathinfo(basename($_FILES['img']['name']));
							$img = '/images/'.$page_url.'/contacts_'.$_POST['edit_data']."_".rand(0,1000).".".$path_info['extension'];
							move_uploaded_file($_FILES['img']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$img);
							$image = new SimpleImage();
							$image->load($_SERVER['DOCUMENT_ROOT'].$img);
							$image->resizeToWidth(300);
							$image->save($_SERVER['DOCUMENT_ROOT'].'/images/'.$page_url.'/small_'.basename($img));
							$img = "`img`='".$img."', ";
						} 
							$SQL = "UPDATE `".$table."` SET
							".$img."
							`street`= '".$_POST['street']."',
							`lat`= '".$_POST['lat']."',
							`lan`= '".$_POST['lan']."',
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
			  
			  <th>Адрес</th>
			<th>Телефон</th>
			  <th style="width: 7.5em;"></th>
			</tr>
		  </thead>
		  <tbody>
		  
		  <?
				for ($i = 0; $i < $count; ++$i)
				{
					$id = mysql_result($result, $i, 'id');
					$street = mysql_result($result, $i, 'street');
					$tel = mysql_result($result, $i, 'tel');
		  ?>
		  
			<tr>
			  <td><?echo $id;?></td>
		
			  <td><?echo $street;?></td>
			  <td><?echo $tel;?></td>
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