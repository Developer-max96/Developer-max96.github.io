<?php
class MetaTagsAndH1
{
    public $title;
    public $description;
    public $keywords;
    public $h1;

    public function show_title()
    {
        return $this->title;
    }
    public function show_description()
    {
        return $this->description;
    }
    public function show_keywords()
    {
        return $this->keywords;
    }
    public function show_h1()
    {
        return $this->h1;
    }
}

?>