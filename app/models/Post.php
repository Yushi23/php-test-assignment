<?php

namespace App\Models;
class Post extends Model
{
    private $table = 'posts';
    private $schema = 'jsonplaceholder';

    public function insertToTable($posts)
    {
        try {
            $this->db->beginTransaction();
            foreach ($posts as $post) {
                $postQuery = "INSERT INTO {$this->schema}.{$this->table} (id, user_id, title, body) VALUES (:id, :user_id, :title, :body)";
                $result = $this->db->prepare($postQuery);
                $result->bindParam(':id', $post->id);
                $result->bindParam(':user_id', $post->userId);
                $result->bindParam(':title', $post->title);
                $result->bindParam(':body', $post->body);
                $result->execute();
                $this->count++;
            }
            $this->db->commit();
        } catch (\POOException $е) {
            $this->db->rollBack();
            print_r('Ошибка выполнения запроса' . $e->getMessage());
        }
    }
}