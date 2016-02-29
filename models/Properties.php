<?php

class Properties
{
    public $language = "nl"; //en, de, nl,...
    public $pagetitle = "untitled";
    public $pagemeta = "Website from Michel Michaux";
    public $debugging = 0;


    /*Stylesheets*/
    public $stylesheets = array(

    );

    /*scripts top of page - local files need ./assets/js/ to support CDN links*/
    public $javascript_top = array(

    );

    /*scripts bottom of page - local files need ./assets/js/ to support CDN links*/
    public $javascript_bot = array(

    );

    public function __construct($lang, $title)
    {
        $this->language = $lang;
        $this->pagetitle = $title;
    }
}