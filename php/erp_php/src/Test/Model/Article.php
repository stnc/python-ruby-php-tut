<?php

namespace Test\Model;

class Article {
	protected $title;
	public function setTitle($title) {
		$this->title = $title;
		return $this->title;
	}
	public function getTitle() {
		return $this->title;
	}
}

