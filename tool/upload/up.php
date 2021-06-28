<?php
include 'Upload.php';
$up = new Upload(array('path' => 'upload'));
echo $up->up('abc');