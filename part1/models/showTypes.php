<?php

include_once 'database.php';

class ShowTypes extends Database {
    public $id;
    public $type;  

    public function __constructor() {
        parent::__construct();
    }

    public function getShowTypes() {
        $request = $this->_db_->query('SELECT `type` FROM `showTypes`');
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}