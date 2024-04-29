<?php
require_once 'autoloader.php';

use App\Controllers\CommentController;

$comments = new CommentController();
$comments->show();
