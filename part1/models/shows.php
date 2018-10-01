<?php

include_once 'database.php';

class Shows extends Database {
    public $id;
    public $title;
    public $performer;
    public $date;
    public $showTypesId;
    public $firstGenresId;    
    public $secondGenresId;   
    public $duration;   
    public $startTime;   

    public function __constructor() {
        parent::__construct();
    }

    public function getTitlePerformerDateDurationShows() {
        $request = $this->_db_->query('SELECT `title`, `performer`, DATE_FORMAT(`date`, "%d/%m/%Y") as `date`, `startTime` FROM `shows` ORDER BY `title`');
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}
    