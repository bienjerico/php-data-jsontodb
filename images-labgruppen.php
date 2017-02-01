
<?php 

include ("db.php");



function htmlcodes_encode($val){
	return mysql_real_escape_string(htmlspecialchars(addslashes($val)));
}

function htmlcodes_decode($val){
	return htmlspecialchars_decode(stripslashes($val));
}
$query = mysql_query("SELECT * FROM labgruppen_products");
$arrayProducts = "";
while($row = mysql_fetch_assoc($query)){
	$arrayProducts[$row['nameSeries']][$row['ListTitle']][] = 	$row['images'];

}


?>
<html>
	<head>
		<title>TC Labgruppen Images</title>
		<style>

		</style>
	</head>
	<body>
		<?php 
				$count = 1;
				$table = "<table border=1 cellpadding=0 cellspacing=0 width='100%'>";
				$table .= "<thead>
								<tr>
									<th>Count</th>
									<th>Series</th>
									<th>Product Name</th>
									<th>Images</th>
								</tr>
							<thead>
							<tbody>";

							foreach($arrayProducts as $key => $list){
								
								foreach($list as $key2 => $list2){
									$table .= "<tr>";
									$table .= "<td>".$count."</td>";
									$table .= "<td>".$key."</td>";
									$table .= "<td>".$key2."</td>";
									$table .= "<td>";
									foreach($list2 as $key3 => $list3){
										$table .= "<a href='".$list3."' target='_blank'><img src='".$list3."' style='width:200px; height:auto;'></a>";
										$table .= "<br/>";
										$table .= "<br/>";
									}

									$table .= "</td>";
										$table .= "</tr>";
										$count++;
								}
							}

				$table .= "</table>";
				echo $table;
		 ?>
	</body>
</html>