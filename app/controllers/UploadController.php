<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\DataFromUrl;
use App\Models\Post;
use Database\DB;

class UploadController
{
    public function run()
    {
        $dataUrl = new DataFromUrl();
        $db = DB::getInstance(parse_ini_file(__DIR__ . '/../../.env'));

        $post = new Post($db);
        $post->insertToTable($dataUrl->getData('https://jsonplaceholder.typicode.com/posts'));

        $comment = new Comment($db);
        $comment->insertToTable($dataUrl->getData('https://jsonplaceholder.typicode.com/comments'));

        echo("Загружено {$post->getRecordsAfterChange()} записей и {$comment->getRecordsAfterChange()} комментариев");
    }
}