<?php

/**
 * 
 */
class Pagination 
{
	public $currentPage;
	public $perpage;
	public $total;
	public $countPages;
	public $uri;
	
	public function __construct($perpage, $page, $total)
	{
		$this->perpage = $perpage;
		$this->total = $total;
		$this->currentPage = $this->getCurrentPage($page);
		$this->countPages = $this->getCountPages();
		$this->uri = $this->getUri();
	}

	public function getCountPages() {
		return ceil($this->total / $this->perpage) ? : 1;
	} 

	public function getCurrentPage($page) {
		if(!$page || $page < 1) $page = 1;
		if($page > $this->getCountPages()) $page = $this->countPages;
	}

	public function getStart() {
		return ($this->currentPage - 1) * $this->perpage;
	}

	public function getParams() {
		$uri = $_SERVER['REQUEST_URI'];
	}

	public function getUri() {
		
	}


}