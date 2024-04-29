<?php

namespace App\Models;

use Database\DB;

abstract class Model
{
    protected $db;
    protected $count;

    public function __construct(DB $db)
    {
        $this->db = $db::getInstance()->getConnection();
    }

    public function getRecordsAfterChange()
    {
        return $this->count;
    }
}