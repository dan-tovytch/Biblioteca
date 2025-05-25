<?php 

namespace Core;

class Model  {
    /**
     * Summary of db
     * @var 
     */
    protected $db;
    /**
     * Summary of __construct
     * @param mixed $db
     */
    public function __construct($db) {
        $this->db = $db;
    }
}