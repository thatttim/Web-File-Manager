<?php
require_once 'config.php';

$baseDir = realpath($appFolder);

if (!is_dir($baseDir)) {
    die('Invalid base directory. Please check the configuration.');
}

if ($appMode !== 'compact' && $appMode !== 'full') {
    die('Invalid app mode. Please check the configuration.');
}

$currentDir = isset($_GET['dir']) && !empty($_GET['dir']) ? realpath($baseDir . '/' . $_GET['dir']) : $baseDir;

if (!is_dir($currentDir) || strpos($currentDir, $baseDir) !== 0) {
    $currentDir = $baseDir;
}

$parentDir = dirname(str_replace($baseDir, '', $currentDir));

// Handle file uploads
if (isset($_FILES['files']) && !empty($_FILES['files']['name'][0])) {
    foreach ($_FILES['files']['name'] as $key => $name) {
        $uploadPath = $currentDir . '/' . basename($name);
        move_uploaded_file($_FILES['files']['tmp_name'][$key], $uploadPath);
    }
}

// Function to delete a directory and all its contents
function deleteDirectory($dir)
{
    if (!is_dir($dir)) {
        return false;
    }

    $items = array_diff(scandir($dir), ['.', '..']);
    foreach ($items as $item) {
        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            deleteDirectory($path);
        } else {
            unlink($path);
        }
    }
    return rmdir($dir);
}

// Handle file or directory deletion
if (isset($_POST['delete'])) {
    $deletePath = realpath($baseDir . '/' . $_POST['delete']);

    if (strpos($deletePath, $baseDir) === 0 && file_exists($deletePath)) {
        if (is_dir($deletePath)) {
            if (!deleteDirectory($deletePath)) {
                echo "Unable to delete the directory.";
            }
        } else {
            if (!unlink($deletePath)) {
                echo "Unable to delete the file.";
            }
        }
    }
}

// Handle renaming files
if (isset($_POST['rename_from']) && isset($_POST['rename_to'])) {
    $oldPath = realpath($baseDir . '/' . $_POST['rename_from']);
    $newPath = realpath($baseDir) . '/' . $_POST['rename_to'];
    if (strpos($oldPath, $baseDir) === 0 && file_exists($oldPath)) {
        rename($oldPath, $newPath);
    }
}

// Handle creating new directories
if (isset($_POST['new_dir']) && !empty($_POST['new_dir'])) {
    $newDirName = basename($_POST['new_dir']);
    $newDirPath = $currentDir . '/' . $newDirName;
    $counter = 1;

    while (is_dir($newDirPath)) {
        $newDirPath = $currentDir . '/' . $newDirName . " ($counter)";
        $counter++;
    }

    mkdir($newDirPath);
    $relativePath = str_replace($baseDir, '', $newDirPath);
    header('Location: ?dir=' . urlencode(trim($relativePath, '/')));
    exit;
}

// Exclude hidden files from the list
$files = array_filter(array_diff(scandir($currentDir), ['.', '..']), function($file) {
    return $file[0] !== '.';
});

// Generate URL for directories
function generateDirUrl($baseDir, $file, $currentDir)
{
    $relativePath = str_replace($baseDir, '', $currentDir);
    $relativePath = trim($relativePath, '/') . '/' . $file;
    return '?dir=' . urlencode(trim($relativePath, '/'));
}

$baseDirDirs = array_filter(glob($baseDir . '/*'), 'is_dir');

function isCurrentOrParentDir($dir, $currentDir)
{
    return strpos($currentDir, realpath($dir)) === 0;
}
