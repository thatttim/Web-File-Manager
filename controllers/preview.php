<?php

require_once 'config.php';

// Ensure that the path is provided and valid
if (!isset($_GET['file']) || empty($_GET['file'])) {
    die("File not specified.");
}

$file = $_GET['file'];
$fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
$directory = dirname($file); // Get the directory of the file
$parentDirName = basename($directory); // Get the name of the parent directory

// Validate the file type
$validImageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
$validVideoExtensions = ['mp4', 'webm', 'ogg'];

// Get all files from the directory, regardless of type
$files = glob("$directory/*");

// Ensure the current file exists
if (!in_array($file, $files)) {
    die("File not found.");
}

// Find the current file index
$currentFileIndex = array_search($file, $files);
$previousFile = isset($files[$currentFileIndex - 1]) ? $files[$currentFileIndex - 1] : null;
$nextFile = isset($files[$currentFileIndex + 1]) ? $files[$currentFileIndex + 1] : null;
