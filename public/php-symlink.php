<?php
$target = '/home/wimssph/public_html/wimss_prod/storage/app/public'; // Target directory
$link = '/home/wimssph/public_html/wimss_prod/public/storage'; // Symlink location
echo $target;
echo $link;

try {
    if (symlink($target, $link)) {
        echo "Symlink created successfully.";
    } else {
        throw new Exception("Failed to create symlink.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
