<?
	session_start();
	Header("Content-Type: text/html;charset=UTF-8");
	include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	$title = "Заказы";
	include $_SERVER['DOCUMENT_ROOT']."/pn/header.html";
	if (!isset($_SESSION["user_id"]))
	{
		?></br><p align="center"><font color="red">Вы не вошли под своим именем</font></p><?
		include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
		exit;
	}
	$table = 'order';
	$page_url = 'order';
	$title_page = $title;
	
	
	if (isset($_GET['del']))
	{
			$sql = "DELETE FROM `".$table."` WHERE `id` = ".$_GET['del']."";
			mysql_query($sql);
	}
	if (isset($_GET['status']))
	{
			$sql = "UPDATE `".$table."` SET `status`=1 WHERE `id` = ".$_GET['status']."";
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

      
						<div class="header">
					
					<h1 class="page-title"><?echo $title_page;?></h1>
							<ul class="breadcrumb">
					<li><a href="/pn/">Главная</a> </li>
					<li class="active"><?echo $title_page;?></li>
				</ul>

				</div>
				<div class="main-content">
				
				<?
				
					
			$SQL = "SELECT * FROM `".$table."` ORDER BY `id` DESC LIMIT ".$count_data.", 20";
			$result = mysql_query($SQL);

			$count = mysql_num_rows($result);
				?>
	
		<table class="table">
		  <thead>
			<tr>
			  <th>#</th>
			  <th>Иформация о заказчике</th>
			  <th>Заказ</th>
			  <th class="text-center">Статус</th>
			  <th class="text-center">Дата заказа</th>
		
			  <th style="width: 3.5em;"></th>
			</tr>
		  </thead>
		  <tbody>
		  
		  <?
				for ($i = 0; $i < $count; ++$i)
				{
					$id = mysql_result($result, $i, 'id');
					$fio = mysql_result($result, $i, 'fio');
					$email = mysql_result($result, $i, 'email');
					$tel = mysql_result($result, $i, 'tel');
					$delivery = mysql_result($result, $i, 'delivery');
					$addr = mysql_result($result, $i, 'addr');
					$about = mysql_result($result, $i, 'about');
					$status = mysql_result($result, $i, 'status');
					$sum = mysql_result($result, $i, 'sum');
					$pay = mysql_result($result, $i, 'pay');
					$date = mysql_result($result, $i, 'date');
					$date_delivery = mysql_result($result, $i, 'date_delivery');
					$time_delivery = mysql_result($result, $i, 'time_delivery');
					$fio_receive = mysql_result($result, $i, 'fio_receive');
		  ?>
		  
			<tr>
			  <td><?echo $id;?></td>
			  <td><?echo "ФИО: ".$fio."<br/>Email: ".$email."<br/>Телефон: ".$tel;?></td>
			  <td><?
				$res = mysql_query("SELECT * FROM `order_prod`, `prod` WHERE `order_prod`.`id_prod`=`prod`.`id` and `order_prod`.`id_order`=".$id."");
				$count_p = mysql_num_rows($res);
				if ($count_p > 0) {
					?><table class="table-inside"><tr><th>Название</th><th class="text-center">Кол-во</th><th class="text-center">Цена (р.)</th><th class="text-center">Сумма (р.)</th></tr><?
					for ($j = 0; $j < $count_p; ++$j)
					{
						$name_prod = mysql_result($res, $j, 'name');
						$count_prod = mysql_result($res, $j, 'count');
						$price_prod = mysql_result($res, $j, 'price');
						$sum_prod = (int)$count_prod * (double)$price_prod;
						?>
						<tr><td><?echo $name_prod;?></td><td class="text-center"><?echo $count_prod;?></td><td class="text-center"><?echo $price_prod;?></td><td class="text-center"><?echo $sum_prod;?></td></tr>
						<?
					}
					?></table><?
				}
				echo "<p>Общая сумма: ".$sum."</p>";
				echo "<br/><p>Доставка: ".$delivery."</p>";
				echo "<p>Оплата: ".$pay."</p>";
				if ($delivery == "Самовывоз") {
					$text = "<p>Салон: ".$addr."</p><p>Дата получения: ".$date_delivery."</p><p>Время получения: ".$time_delivery."</p>";
				} else {
					$text = "<p>Адрес доставки: ".$addr."</p><p>Дата доставки: ".$date_delivery."</p><p>Время доставки: ".$time_delivery."</p><p>Фио получателя: ".$fio_receive."</p>";
				}
				echo $text;
			  ?></td>
			  <td class="text-center"><?if ($pay != "Оплата при доставке") {
				  if ($status == 1) {
					  ?>Оплачено<?
				  } else {
					  ?>Не оплачено<br/><a href="/pn/<?echo $page_url;?>.php?page=<?echo $page;?>&status=<?echo $id;?>">Оплата проведена</a><?
				  }
			  } else {
				  ?>-<?
			  }?></td>
			  <td class="text-center"><?echo $date;?></td>
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


	  
<?
	
	include $_SERVER['DOCUMENT_ROOT']."/pn/footer.html";
?>