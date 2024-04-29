<?php

namespace App\Controllers;

use App\Models\DataFromUrl;

class CommentController
{
    public function show()
    {
        $data = $_GET['text'] ?? null;
        $dataUrl = new DataFromUrl();
        $resultData = $dataUrl->getFilteredData($data);
        include_once 'app/views/app.php';
    }

}