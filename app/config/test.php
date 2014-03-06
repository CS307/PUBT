<?php
    $filename = "mima.dll";
    $handle = fopen($filename, "r");
    $contents = fread($handle, filesize($filename));
    echo $contents;
    fclose($handle);
?>
