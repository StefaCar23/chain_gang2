<?php

    $header = false;
    $date = [];
    $file = fopen($filename, 'r');
    
    while( !feof($file) ){
        $row = fgetcsv($file, 0, ', ');
    if($row == [NULL] || $row === false ){
        continue;
    }else{
        data[] = array_combine($header, $row);
    }
    }
    
    fclose($file);

