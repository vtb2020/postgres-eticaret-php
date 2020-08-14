<?php
/*$dbuser = 'postgres';
$dbpass = 'sapass';
$host = 'localhost';
$dbname='makaleSitesi';
$dbh = new PDO("pgsql:host=$host;dbname=$dbname", $dbuser, $dbpass, array(
PDO::ATTR_PERSISTENT => true));	*/

$host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = Pdb";
   $credentials = "user = postgres password=VTB2020";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      //echo "Error : Unable to open database\n";
   } else {
      //echo "Opened database successfully\n";
   }
