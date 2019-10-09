<?php

namespace App;

class JsonFile extends File
{
	const FILENAME = 'data.json';

	public function generateContent() {
		$json = json_encode($this->getData(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
		return $json;
	}
}
