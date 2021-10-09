<?php

function copyAll($source,$dist) {
    $dir = opendir($source);
    @mkdir($dist);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($source . '/' . $file) ) {
                copyAll($source . '/' . $file,$dist . '/' . $file);
            }
            else {
                copy($source . '/' . $file,$dist . '/' . $file);
            }
        }
    }
    closedir($dir);
}