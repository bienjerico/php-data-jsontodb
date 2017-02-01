<?php 

include ("db.php");



function htmlcodes_encode($val){
	return mysql_real_escape_string(htmlspecialchars(addslashes($val)));
}

function htmlcodes_decode($val){
	return htmlspecialchars_decode(stripslashes($val));
}
$query = mysql_query("SELECT * FROM tcelectronic_products WHERE `productSectionTitle`='Images'");

?>
<html>
	<head>
		<title>TC Electronics Product Images</title>
		<style>
			#gallery-menu {
				display:none;
			}
			.gallery-slide a img {
				width: 500px !important;
				height: auto !important;
			}
		</style>
	</head>
	<body>
		<?php 
				$count = 1;
				$table = "<table border=1 cellpadding=0 cellspacing=0>";
				$table .= "<thead>
								<tr>
									<th>Count</th>
									<th>URL</th>
									<th>Product Name</th>
									<th>Images</th>
								</tr>
							<thead>
							<tbody>";


					while($row = mysql_fetch_assoc($query)){
						$table .= "<tr>";
						$table .= "<td>".$count."</td>";
						$table .= "<td>".htmlcodes_decode($row['productURL'])."</td>";
						$table .= "<td>".htmlcodes_decode($row['productName'])."</td>";
						$table .= "<td>".htmlcodes_decode($row['productSection'])."</td>";
						$table .= "</tr>";
						$count++;
					}
				$table .= "</table>";
				echo $table;
		 ?>
	</body>
</html>
