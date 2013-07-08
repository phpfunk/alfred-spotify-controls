<?php
include dirname(__FILE__) . '/autoload.php';
if (isset($argv[1]) && ! empty($argv[1])) {
    Releases::update(trim($argv[1]));
}
else {
    print 'Could NOT find correct release to download and install';
}