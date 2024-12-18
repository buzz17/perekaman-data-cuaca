<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Database extends Controller
{
    public function backup()
{
    $db = \Config\Database::connect();  // Connect to the database
    $dbname = $db->database;            // Get the database name
    $dbHost = $db->hostname;            // Get the database host
    $dbUser = $db->username;            // Get the database username
    $dbPass = $db->password;            // Get the database password

    // Path and filename
    $path = WRITEPATH . 'uploads/';      // Ensure this directory exists and is writable
    $filename = $dbname . '_' . date('dMY_Hi') . '.sql.gz';
    
    // Ensure mysqldump is available
    $command = "mysqldump --opt -h$dbHost -u$dbUser -p$dbPass $dbname | gzip > $path$filename";
    
    // Execute the command and capture output and error
    exec($command, $output, $return_var);

    // Check if the command was successful
    if ($return_var !== 0) {
        // If the command failed, return the error output
        return $this->response->setStatusCode(500)->setBody('Failed to create database backup. Error: ' . implode("\n", $output));
    }

    // Return the file as a download
    return $this->response->download($path . $filename, null)->setFileName($filename);
}


}
