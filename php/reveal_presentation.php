<?php

class RevealPresentation
{
	protected $maintitle      = '';
	protected $subtitle       = '';
	protected $authorname     = '';
	protected $authorhomepage = '';

	public function __construct($init = array())
	{
		if (isset($init['maintitle']))      $this->setMainTitle($init['maintitle']);
		if (isset($init['subtitle']))       $this->setSubTitle($init['subtitle']);
		if (isset($init['authorname']))     $this->setAuthorName($init['authorname']);
		if (isset($init['authorhomepage'])) $this->setAuthorHomepage($init['authorhomepage']);
	}

	// ########## SETTERS ##############################

	public function setMainTitle($string)
	{
		$this->maintitle = $string;
	}

	public function setSubTitle($string)
	{
		$this->subtitle = $string;
	}

	public function setAuthorName($string)
	{
		$this->authorname = $string;
	}

	public function setAuthorHomepage($string)
	{
		$this->authorhomepage = $string;
	}

	// ########## GETTERS ##############################

	public function getMainTitle()
	{
		return $this->maintitle;
	}

	public function getSubTitle()
	{
		return $this->subtitle;
	}

	public function getAuthorName()
	{
		return $this->authorname;
	}

	public function getAuthorHomepage()
	{
		return $this->authorhomepage;
	}

	// ########## SHORTHANDS ##############################

	public function getTitle()
	{
		return ($this->maintitle . ' - ' . $this->subtitle);
	}
}
