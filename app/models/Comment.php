<?php

namespace App\Models;

class Comment extends Model
{
    private $table = 'comments';
    private $schema = 'jsonplaceholder';
    public function insertToTable($comments)
    {
        try {
            $this->db->beginTransaction();
            foreach ($comments as $comment) {
                $postQuery = "INSERT INTO {$this->schema}.{$this->table} (id, post_id, name, email, body) VALUES (:id, :post_id, :name, :email, :body)";
                $result = $this->db->prepare($postQuery);
                $result->bindParam(':id', $comment->id);
                $result->bindParam(':post_id', $comment->postId);
                $result->bindParam(':name', $comment->name);
                $result->bindParam(':email', $comment->email);
                $result->bindParam(':body', $comment->body);
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