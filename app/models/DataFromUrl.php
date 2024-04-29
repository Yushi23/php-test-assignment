<?php

namespace App\Models;

class DataFromUrl
{
    public function getData($url)
    {
        return json_decode(file_get_contents($url));
    }


    public function getFilteredData($data)
    {
        $resultData = [];
        if (isset($data)) {
            $posts = $this->getData('https://jsonplaceholder.typicode.com/posts');
            $comments = $this->getData('https://jsonplaceholder.typicode.com/comments');

            $commentsFilter = array_filter($comments, function ($comment) use ($data) {
                return strpos($comment->body, $data);
            });

            foreach ($commentsFilter as $comment) {
                foreach ($posts as $post) {
                    if ($comment->postId === $post->id)
                    {
                        $resultData[$comment->postId]['postTitle'] = $post->title;
                        break;
                    }
                }
                $resultData[$comment->postId]['bodyComments'][] = $comment->body;
            }
        }
        return $resultData;
    }
}