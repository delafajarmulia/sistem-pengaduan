<?php

namespace App\Helpers;

class commit
{
    public $icon;
    public $point;
    public $description;

    public function __construct($icon, $point, $description)
    {
        $this->icon = $icon;
        $this->point = $point;
        $this->description = $description;
    }
}