<?php

$DBHOST = "localhost";
$DBUSER = "upperlink";
$DBPASS = "upperlink";
$DBNAME = "upperlink";
try {
    $upperlink = new PDO("mysql:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASS);
    $upperlink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
