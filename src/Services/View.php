<?php
namespace App\Services;

class View
{
    public function __construct(
        private ViewPath $viewPath,
        private array    $arguments = []
    )
    {
    }

    public function __toString(): string
    {
        return $this->getRenderedFileAsString($this->viewPath->value);
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