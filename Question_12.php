<?php
/**
 * Question 12:
 * consider file_get_contents("TSLA.csv");
 * Parse the CSV data and demonstrate a simple php script populating the relevant
 * data into the provided MySQL schema which keeps the data rows updated or created;
 *
 * CREATE TABLE `codetest` (
 * `RecordID`  int(11) NOT NULL AUTO_INCREMENT,
 * `Date`  datetime NULL,
 * `OpenPrice`  double NULL,
 * `HighPrice`  double NULL,
 * `LowPrice`  double NULL,
 * `ClosePrice`  double NULL,
 * `AdjClosePrice`  double NULL,
 * `Volume`  double NULL,
 * PRIMARY KEY (`RecordID`)
 * );
 */

//DB details
$dbHost     = '127.0.0.1';
$dbUsername = 'root';
$dbPassword = 'my-secret-pw';
$dbName     = 'codetest';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
  die("Unable to connect database: " . $db->connect_error);
}

$csvFile = fopen('./data/TSLA.CSV', 'r');
fgetcsv($csvFile);
while (($line = fgetcsv($csvFile)) !== FALSE) {
  //check whether member already exists in database with same email
  $date          = $db->real_escape_string($line[0]);
  $openPrice     = $db->real_escape_string($line[1]);
  $highPrice     = $db->real_escape_string($line[2]);
  $lowPrice      = $db->real_escape_string($line[3]);
  $closePrice    = $db->real_escape_string($line[4]);
  $adjClosePrice = $db->real_escape_string($line[5]);
  $volume        = $db->real_escape_string($line[6]);
  $prevQuery     = "SELECT `RecordID` FROM codetest WHERE `Date` = '$date'";
  $prevResult    = $db->query($prevQuery);
  if ($prevResult->num_rows > 0) {
    //update member data
    $updateQuery = "UPDATE codetest SET `Date` = '$date', `OpenPrice` = '$openPrice', `HighPrice` = '$highPrice', `LowPrice` = '$lowPrice', `ClosePrice` = '$closePrice', `AdjClosePrice` = '$adjClosePrice', `Volume` = '$volume' WHERE `Date` = '$date'";
    $db->query($updateQuery);
  }
  else {
    //insert member data into database
    $insertQuery = "INSERT INTO codetest (`Date`, `OpenPrice`, `HighPrice`, `LowPrice`, `ClosePrice`, `AdjClosePrice`, `Volume`) VALUES ('$date','$openPrice','$highPrice','$lowPrice','$closePrice','$adjClosePrice','$volume')";
    $db->query($insertQuery);
  }
}

fclose($csvFile);
$db->close();