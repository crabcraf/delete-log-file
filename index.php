<?php
$file_patch='logs/php-error.log';
Check_LogFileSize($file_patch);

function Check_LogFileSize($FilePatch,$LimitSize='2')
{
    try{
        if(file_exists($FilePatch)){
            $FileSize=filesize($FilePatch);
            if($FileSize>$LimitSize){   // limit 50000000 byte = 50 MB
                // del log file
                chmod($FilePatch,755);
                unlink($FilePatch);
            }
        }
    }catch(Exception $e){
        echo 'Caught exception: ',$e->getMessage(),"\n";
    }
}