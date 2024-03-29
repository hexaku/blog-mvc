<?php

namespace App\Model;

use App\Model\AbstractManager;

class CommentsManager extends AbstractManager
{
    const TABLE = 'comments';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }



    public function insert(array $comment): int
    {
        $statement = $this->pdo->prepare("INSERT INTO $this->table (`articles_id`, `nickname`, `message`) 
        VALUES (:article_id, :nickname, :message)");
        $statement->bindValue('article_id', $comment['user_article_id'], \PDO::PARAM_INT);
        $statement->bindValue('nickname', $comment['user_nickname'], \PDO::PARAM_STR);
        $statement->bindValue('message', $comment['user_message'], \PDO::PARAM_STR);

        if ($statement->execute()) {
            return (int)$this->pdo->lastInsertId();
        }
    }
}
