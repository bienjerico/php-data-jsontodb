<?php 

include ("db.php");



function htmlcodes_encode($val){
	return mysql_real_escape_string(htmlspecialchars(addslashes($val)));
}

function htmlcodes_decode($val){
	return htmlspecialchars_decode(stripslashes($val));
}

function tchelicon_artist(){
	$json = file_get_contents("tc-helicon-artist.json");
	$data = json_decode($json);


	foreach($data as $list){
		$artistsName =  htmlcodes_encode($list->artistsName);
		$artistsImage =  htmlcodes_encode($list->artistsImage);
		$artistsMessage =  htmlcodes_encode($list->artistsMessage);
		$artistsAbout =  htmlcodes_encode($list->artistsAbout);

		echo "<br/>";
		echo $artistsName;
		echo "<br/>";
		echo $artistsImage;
		echo "<br/>";
		echo $artistsMessage;
		echo "<br/>";
		echo $artistsAbout;

		echo "<br/>";
		echo "<br/>";
		echo "INSERT INTO  tchelicon_artist (`artistsName`,`artistsImage`,`artistsMessage`,`artistsAbout`)
						 VALUES ('{$artistsName}','{$artistsImage}','{$artistsMessage}','{$artistsAbout}')";


	  		mysql_query("INSERT INTO  tchelicon_artist (`artistsName`,`artistsImage`,`artistsMessage`,`artistsAbout`)
						 VALUES ('{$artistsName}','{$artistsImage}','{$artistsMessage}','{$artistsAbout}')");
			echo "<br/>";
	  		echo 'NO: '.mysql_affected_rows();

	}

	
	$query = mysql_query("SELECT * FROM tchelicon_artist");

	while($row = mysql_fetch_assoc($query)){
		echo htmlcodes_decode($row['artistsName']);
		echo "<br/>";
		echo htmlcodes_decode($row['artistsImage']);
		echo "<br/>";
		echo htmlcodes_decode($row['artistsMessage']);
		echo "<br/>";
		echo htmlcodes_decode($row['artistsAbout']);
		echo "<br/>";
	}
}

function tcelectronic_bass_artists(){
	$json = file_get_contents("tcelectronic-bass-artists.json");
	$data = json_decode($json);

	$values_all = "";
	foreach($data->artists as $list){


		$values = "(";
		foreach($list as $key => $ls){
			$values .= "'".htmlcodes_encode($ls)."',";
		}
		$values = substr($values,0,-1);
		$values .= "),";

	$values_all .= $values;
	}

	$values_all = substr($values_all,0,-1);

	mysql_query("INSERT INTO `tcelectronic_bass_artists` (`image`, `h2`, `h3`, `p`, `desc`, `products`) VALUES {$values_all}");
	echo 'NO: '.mysql_affected_rows();
	
	$query = mysql_query("SELECT * FROM tcelectronic_bass_artists");

	while($row = mysql_fetch_assoc($query)){
		echo htmlcodes_decode($row['image']);
		echo "<br/>";
		echo htmlcodes_decode($row['h2']);
		echo "<br/>";
		echo htmlcodes_decode($row['h3']);
		echo "<br/>";
		echo htmlcodes_decode($row['p']);
		echo "<br/>";
		echo htmlcodes_decode($row['desc']);
		echo "<br/>";
		echo htmlcodes_decode($row['products']);
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
	}
}


function tcelectronic_guitar_artists(){
	$json = file_get_contents("tcelectronic-guitar-artists.json");
	$data = json_decode($json);

	$values_all = "";
	foreach($data->guitarArtists as $list){

		$values = "(";
		foreach($list as $key => $ls){
			$values .= "'".htmlcodes_encode($ls)."',";
		}
		$values = substr($values,0,-1);
		$values .= "),";

	$values_all .= $values;
	}

	$values_all = substr($values_all,0,-1);

	mysql_query("INSERT INTO `tcelectronic_guitar_artists` (`image`, `h2`, `h3`, `p`, `desc`, `products`) VALUES {$values_all}");
	echo 'NO: '.mysql_affected_rows();
	
	$query = mysql_query("SELECT * FROM tcelectronic_guitar_artists");

	while($row = mysql_fetch_assoc($query)){
		echo htmlcodes_decode($row['image']);
		echo "<br/>";
		echo htmlcodes_decode($row['h2']);
		echo "<br/>";
		echo htmlcodes_decode($row['h3']);
		echo "<br/>";
		echo htmlcodes_decode($row['p']);
		echo "<br/>";
		echo htmlcodes_decode($row['desc']);
		echo "<br/>";
		echo htmlcodes_decode($row['products']);
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
	}
}


function tcelectronic_studio_pros(){
	$json = file_get_contents("tcelectronic-studio-pros.json");
	$data = json_decode($json);

	$values_all = "";
	foreach($data->artists as $list){

		$values = "(";
		foreach($list as $key => $ls){
			$values .= "'".htmlcodes_encode($ls)."',";
		}
		$values = substr($values,0,-1);
		$values .= "),";

	$values_all .= $values;
	}

	$values_all = substr($values_all,0,-1);

	mysql_query("INSERT INTO `tcelectronic_studio_pros` (`image`, `h2`, `h3`, `p`, `desc`, `products`) VALUES {$values_all}");
	echo 'NO: '.mysql_affected_rows();
	
	$query = mysql_query("SELECT * FROM tcelectronic_studio_pros");

	while($row = mysql_fetch_assoc($query)){
		echo htmlcodes_decode($row['image']);
		echo "<br/>";
		echo htmlcodes_decode($row['h2']);
		echo "<br/>";
		echo htmlcodes_decode($row['h3']);
		echo "<br/>";
		echo htmlcodes_decode($row['p']);
		echo "<br/>";
		echo htmlcodes_decode($row['desc']);
		echo "<br/>";
		echo htmlcodes_decode($row['products']);
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
	}
}


function tcelectronic_products_manual(){

	$json = file_get_contents("tcelectronic-products-manual.json");
	$data = json_decode($json);

	$values_all = "";
	foreach($data as $list){
		$productName = "";
		$productImage = "";
		$productName = $list->productName;
		$productImage = $list->productImage;

			foreach($list->productManuals as $list2){
				$values = "";
				foreach($list2 as $list3){
					$values .= "(";
					$values .= "'".htmlcodes_encode($productName)."',";
					$values .= "'".htmlcodes_encode($productImage)."',";
					$values .= "'".htmlcodes_encode($list3->manualName)."',";
					$values .= "'".htmlcodes_encode($list3->manualPdf)."',";
					$values .= "'".htmlcodes_encode($list3->manualLang)."',";
					$values = substr($values,0,-1);
					$values .= "),";
				}
				$values_all .= $values;
			}
	}
		$values_all = substr($values_all,0,-1);

	mysql_query("INSERT INTO `tcelectronic_products_manual` (`productName`, `productImage`, `manualName`, `manualPdf`, `manualLang`) VALUES {$values_all} ") or die(mysql_error());
	echo 'NO: '.mysql_affected_rows();

	$query = mysql_query("SELECT * FROM tcelectronic_products_manual");

	while($row = mysql_fetch_assoc($query)){
		echo htmlcodes_decode($row['productName']);
		echo "<br/>";
		echo htmlcodes_decode($row['productImage']);
		echo "<br/>";
		echo htmlcodes_decode($row['manualName']);
		echo "<br/>";
		echo htmlcodes_decode($row['manualPdf']);
		echo "<br/>";
		echo htmlcodes_decode($row['manualLang']);
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
	}

}

function tcelectronic_products(){
	// $json = file_get_contents("tcelectronic-products.json");
	$json = file_get_contents("tcelectronic-products_201702011009.json");
	$data = json_decode($json);

	$cnt = 0;
	$cntValues = 0;
	$values = "";
	foreach($data as $list){
		$values .= "(";
		$values .= "'".htmlcodes_encode($list->productURL)."',";
		$values .= "'".htmlcodes_encode($list->productName)."',";
		$values .= "'".htmlcodes_encode($list->productSectionTitle)."',";
		$values .= "'".htmlcodes_encode($list->productSection)."',";
		$values = substr($values,0,-1);
		$values .= "),";

		$cntValues++;
		$cnt++;

		if(($cntValues==100) || ($cntValues<100 && $cnt==2284)){
			$values = substr($values,0,-1);

			mysql_query("INSERT INTO `tcelectronic_products_201702011009` (`productURL`, `productName`, `productSectionTitle`, `productSection`) VALUES {$values} ") or die(mysql_error());
			echo 'NO: '.mysql_affected_rows();
			$cntValues = 0;
			$values = "";

			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
		}

	}

	$query = mysql_query("SELECT * FROM tcelectronic_products_201702011009");

	while($row = mysql_fetch_assoc($query)){
		echo htmlcodes_decode($row['productURL']);
		echo "<br/>";
		echo htmlcodes_decode($row['productName']);
		echo "<br/>";
		echo htmlcodes_decode($row['productSectionTitle']);
		echo "<br/>";
		echo htmlcodes_decode($row['productSection']);
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
	}

}

function tcelectronic_software_downloads(){
	$json = file_get_contents("tcelectronic-software-downloads.json");
	$data = json_decode($json);

	$cnt = 0;
	$cntValues = 0;

	$values = "";
	foreach($data as $list){
		$softwareProduct = $list->softwareProduct;
		$softwareImage = $list->softwareImage;
		foreach($list->softwareDownloads as $list2){
			$softwareGroup = $list2->softwareGroup;
			foreach($list2->softwareList as $list3){
				$softwareUrl = $list3->softwareUrl;
				$softwareVersion = $list3->softwareVersion;
				$softwarePlatform = $list3->softwarePlatform;
				$softwareIsCurrent = $list3->softwareIsCurrent;

				$values .= "(";
				$values .= "'".htmlcodes_encode($softwareProduct)."',";
				$values .= "'".htmlcodes_encode($softwareImage)."',";
				$values .= "'".htmlcodes_encode($softwareGroup)."',";
				$values .= "'".htmlcodes_encode($softwareUrl)."',";
				$values .= "'".htmlcodes_encode($softwareVersion)."',";
				$values .= "'".htmlcodes_encode($softwarePlatform)."',";
				$values .= "'".htmlcodes_encode($softwareIsCurrent)."',";
				$values = substr($values,0,-1);
				$values .= "),";

				$cntValues++;
				$cnt++;

				if(($cntValues==100) || ($cntValues<100 && $cnt==1387)){
					$values = substr($values,0,-1);

					echo "INSERT INTO `tcelectronic_software_downloads` (`softwareProduct`, `softwareImage`, `softwareGroup`, `softwareUrl`, `softwareVersion`, `softwarePlatform`, `softwareIsCurrent`) VALUES {$values} ";
					mysql_query("INSERT INTO `tcelectronic_software_downloads` (`softwareProduct`, `softwareImage`, `softwareGroup`, `softwareUrl`, `softwareVersion`, `softwarePlatform`, `softwareIsCurrent`) VALUES {$values} ") or die(mysql_error());
					echo 'NO: '.mysql_affected_rows();
					$cntValues = 0;
					$values = "";

					echo "<br/>";
					echo "<br/>";
					echo "<br/>";
				}
			}
		}
	}


	$query = mysql_query("SELECT * FROM tcelectronic_software_downloads");
$values = "";
	while($row = mysql_fetch_assoc($query)){
		echo htmlcodes_decode($row['softwareProduct']);
		echo "<br/>";
		echo htmlcodes_decode($row['softwareImage']);
		echo "<br/>";
		echo htmlcodes_decode($row['softwareGroup']);
		echo "<br/>";
		echo htmlcodes_decode($row['softwareUrl']);
		echo "<br/>";
		echo htmlcodes_decode($row['softwareVersion']);
		echo "<br/>";
		echo htmlcodes_decode($row['softwarePlatform']);
		echo "<br/>";
		echo htmlcodes_decode($row['softwareIsCurrent']);
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
	}

}

function tchelicon_products(){
	
	$json = file_get_contents("tchelicon-products.json");
	$data = json_decode($json);
	$values = "";
		foreach($data as $list){
			 $tchcontainerTitle = $list->tchcontainerTitle;
			 $tchProductName = $list->tchProductName;
			 $tchProductDesc = $list->tchProductDesc;
			 $tchProductHref = $list->tchProductHref;
			 $tchProductImg = $list->tchProductImg;


			$values .= "(";
			$values .= "'".htmlcodes_encode($tchcontainerTitle)."',";
			$values .= "'".htmlcodes_encode($tchProductName)."',";
			$values .= "'".htmlcodes_encode($tchProductDesc)."',";
			$values .= "'".htmlcodes_encode($tchProductHref)."',";
			$values .= "'".htmlcodes_encode($tchProductImg)."',";
			$values = substr($values,0,-1);
			$values .= "),";

		}

	$values = substr($values,0,-1);

	mysql_query("INSERT INTO `tchelicon_products` (`tchcontainerTitle`, `tchProductName`, `tchProductDesc`, `tchProductHref`, `tchProductImg`)  VALUES {$values} ") or die(mysql_error());
	echo 'NO: '.mysql_affected_rows();
}


function labgruppen_products(){
	
	$json = file_get_contents("labgruppen_products.json");
	$data = json_decode($json);
	$values = "";
		foreach($data as $list){
			 $nameSeries = $list->nameSeries;
			 $ListTitle = $list->ListTitle;
			 $images = $list->images;


			$values .= "(";
			$values .= "'".htmlcodes_encode($nameSeries)."',";
			$values .= "'".htmlcodes_encode($ListTitle)."',";
			$values .= "'".htmlcodes_encode($images)."',";
			$values = substr($values,0,-1);
			$values .= "),";

		}

	$values = substr($values,0,-1);

	mysql_query("INSERT INTO `labgruppen_products` (`nameSeries`, `ListTitle`, `images`)  VALUES {$values} ") or die(mysql_error());
	echo 'NO: '.mysql_affected_rows();
}


?>