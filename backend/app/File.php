<?php

namespace App;

class File
{
	protected $data = [];

    public function __construct($data) {
    	$this->data = $data;
    }

    public function saveFile() {
        $file_content = $this->generateContent();
    	file_put_contents(base_path(static::FILENAME), $file_content);
    }

    public function getData() {
    	return $this->data;
    }

    public function setData($data) {
    	$this->data = $data;
    	return $this;
    }
}
