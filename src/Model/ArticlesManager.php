<?php

namespace App\Model;

use App\Model\AbstractManager;

class ArticlesManager extends AbstractManager
{
    const TABLE = "articles";

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}
