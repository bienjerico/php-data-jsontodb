 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "datamigrationdb";

$conn = mysql_connect($servername, $username, $password);

if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db($dbname)) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}


?> 