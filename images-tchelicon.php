
<?php 

include ("db.php");



function htmlcodes_encode($val){
	return mysql_real_escape_string(htmlspecialchars(addslashes($val)));
}

function htmlcodes_decode($val){
	return htmlspecialchars_decode(stripslashes($val));
}
$query = mysql_query("SELECT * FROM tchelicon_products");

?>
<html>
	<head>
		<title>TC Helicon Product Images</title>
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
									<th>Product Name</th>
									<th>Images</th>
								</tr>
							<thead>
							<tbody>";


					while($row = mysql_fetch_assoc($query)){
						$table .= "<tr>";
						$table .= "<td>".$count."</td>";
						$table .= "<td>".htmlcodes_decode($row['tchProductName'])."</td>";
						$table .= "<td><a href='".htmlcodes_decode($row['tchProductImg'])."' target='_blank'><img src='".htmlcodes_decode($row['tchProductImg'])."' style='width:200px; height:auto;'></a></td>";
						$table .= "</tr>";
						$count++;
					}
				$table .= "</table>";
				echo $table;
		 ?>
	</body>
</html>