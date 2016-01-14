<?Header("Content-Type: text/html;charset=UTF-8");
include $_SERVER['DOCUMENT_ROOT']."/pn/bd.php";
	$SQL = "SELECT * FROM `floor` WHERE `id`=".$_POST['id_floor']." ORDER BY `id`";
					$result_floor = mysql_query($SQL);
					$count_floor = mysql_num_rows($result_floor);
					$plan_floor = mysql_result($result_floor, 0, 'plan');
?>
<div class="span6">
	<label>Координаты объекта</label>
	<input type="text" name="path" id="path" class="canvas-area input-xxlarge" value="" placeholder="Shape Coordinates" data-image-url="<?echo $plan_floor;?>">
</div>	
<script language="javascript" src="/libs/canvasAreaDraw/jquery.canvasAreaDraw.min.js"></script>