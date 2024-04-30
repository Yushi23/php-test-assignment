<?php
require_once __DIR__ . '/../autoloader.php';

use App\Controllers\UploadController;

$load = new UploadController();
$load->run();
