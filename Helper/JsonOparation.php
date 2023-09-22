<?php 
namespace Helper;

class JsonOparation {

    
    private $filename; 

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function ReadUserData() {
        if (file_exists($this->filename)) {
            $userdata = json_decode(file_get_contents($this->filename), true);
            return $userdata;
        }else{
            return [];
        }
    }
    public function WriteUserData($data) {
        $userdata = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents($this->filename, $userdata);
    }






}