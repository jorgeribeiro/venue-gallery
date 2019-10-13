<?php

namespace App;

class XmlFile extends File
{
	const FILENAME = 'data.xml';

	protected $headers = ['id', 'name', 'image', 'discount_percentage'];

	public function generateContent() {
		$xml = $this->formatXML();
		return $xml;
	}

	protected function formatXML() {
		$xml_document = new \DOMDocument('1.0');
		$xml_document->formatOutput = true;
		$root = $xml_document->createElement('venues');
		$root = $xml_document->appendChild($root);

		foreach ($this->getData() as $value) {
			$venue = $xml_document->createElement('venue');
			foreach ($this->headers as $header) {
				$child = $xml_document->createElement($header);
				$child = $venue->appendChild($child);
				$data = $xml_document->createTextNode($value[$header]);
				$data = $child->appendChild($data);
			}
			$root->appendChild($venue);
		}
		return $xml_document->saveXML();
	}
}
