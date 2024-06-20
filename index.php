<?php
require_once 'vendor/autoload.php';

use phpseclib\Net\SFTP;

$sftp = new SFTP('182.23.93.115', 22, 30);
if (!$sftp->login('sftp-pln', '@gppln24')) {
    echo "Failed to connect: " . $sftp->getLastError();
    exit;
}

$remote_file_path = 'GET_FILE/PLN_INSURANCE_230721-01.txt'; // Replace with actual path
$local_file_path = __DIR__.DIRECTORY_SEPARATOR ."storages". DIRECTORY_SEPARATOR . basename($remote_file_path); // Replace with desired name 

$result = $sftp->get($remote_file_path, $local_file_path);

if ($result === false) {
    echo "Failed to download file: " . $sftp->getLastError();
} else {
    echo "File downloaded successfully!".PHP_EOL;

    // Open the CSV file in read mode
    $fp = fopen($local_file_path, 'r');

    // Check if the file was opened successfully
    if ($fp !== FALSE) {

        // Get the column headers from the first row
        $headers = fgetcsv($fp,null,"|");

        // Initialize an array to store the JSON data
        $data = array();

        // Loop through each row of the CSV data
        while (($row = fgetcsv($fp,null,"|")) !== false) {
            // Combine headers and data into an associative array
            $data[] = array_combine($headers, $row);
        }

        // Close the CSV file
        fclose($fp);

        // Encode the data array to JSON format
        $json = json_encode($data, JSON_PRETTY_PRINT);

        // Output the JSON data
        echo $json;
    } else {
        // Handle error if file could not be opened
        echo "Error opening file";
    }
}

$activity_sqlite =".".DIRECTORY_SEPARATOR."storages".DIRECTORY_SEPARATOR."activity.sqlite3";
new SQLite3($activity_sqlite,SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE,"");