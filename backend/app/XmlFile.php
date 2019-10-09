<?php

namespace App;

use Spatie\ArrayToXml\ArrayToXml;

class XmlFile extends File
{
	const FILENAME = 'data.xml';

	public function generateContent() {
		$xml = ArrayToXml::convert(['__numeric' => $this->getData()]);
		return $xml;
	}
}
