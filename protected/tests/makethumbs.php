<?php

$inpath = '/home/intrado1/electronic_docs/361';
foreach (glob("$inpath/*.pdf") as $filename) {
    //echo "$filename size " . filesize($filename) . "\n";
    $p = pathinfo("$inpath/$filename");
    echo "convert '$filename'[0] -resize 50% '/home/intrado1/www/images/thumbnails/361/" . $p['filename'] . ".png'\r\n";
    echo shell_exec("convert '$filename'[0] -resize 50% '/home/intrado1/www/images/thumbnails/361/" . $p['filename'] . ".png'");
}
?>