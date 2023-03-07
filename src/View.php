<?php
namespace App;

class View
{

    public function __construct(
        private readonly string $path,
        private readonly array $args = []
    )
    {
    }

    public function __toString(): string
    {
        ob_start();
        include($this->path);
        $var = ob_get_contents();
        ob_end_clean();
    
        return $var;
    }
}