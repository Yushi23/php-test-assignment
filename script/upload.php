<?php
require_once '../autoloader.php';

use App\Controllers\UploadController;

$load = new UploadController();
$load->run();
