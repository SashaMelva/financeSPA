<?php
namespace App;

class Response 
{
    public function __construct(
        private readonly string $status,
        private readonly string $html
    )
    {
      /*  $this->status = 'failed';
        $this->html = $html;*/
    }

    public function getResponse() {
        echo json_encode(['status' => $this->status, 'html' => $this->html]);
    }
}