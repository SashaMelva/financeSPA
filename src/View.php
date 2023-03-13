<?php
namespace App;

class View
{

    public function __construct(
        private string $path,
        private array $args = []
    )
    {
    }

    public function __toString(): string
    {
        return $this->getRenderedFileAsString($this->path);
    }

    /** Рендеринг страницы */
    private function getRenderedFileAsString(string $filePath): string
    {
        //Включает буферизацию вывода
        ob_start();
        require_once($filePath);
        //Возвращение контента буферизации
        $var = ob_get_contents();
        //Очищение буфера
        ob_end_clean();
        return $var;
    }
}