<?php
$relativePath = trim(str_replace($baseDir, '', $currentDir), '/');
$parts = array_filter(explode('/', $relativePath));

if ($parts) {
    echo '<div class="breadcrumbs">';
    echo '<a href="?dir=">Home</a>';

    $linkPath = '';
    foreach ($parts as $part) {
        $linkPath .= '/' . $part;
        echo ' / <a href="?dir=' . urlencode(ltrim($linkPath, '/')) . '">' . htmlspecialchars($part) . '</a>';
    }

    echo '</div>';
}
