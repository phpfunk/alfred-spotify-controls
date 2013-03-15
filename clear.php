<?php
$folder   = 'artwork';
$bytes    = 0;
$total    = 0;
if ($handle = opendir($folder)) {

    while (false !== ($file = readdir($handle))) {
        if (stristr($file, '.png')) {
            $fs = filesize($folder . '/' . $file);
            if (unlink($folder . '/' . $file)) {
                $bytes    += $fs;
                $total    += 1;
            }
        }
    }

    closedir($handle);
}

$mb = ($bytes > 0) ? number_format(($bytes / 1024) / 1024, 2, '.', ',') : 0;
print '(' . $total . ') file(s) removed and ' . $mb . ' MB of space regained.';