<?php

namespace App;

class Response
{
    public function __construct(
        private string $status,
        private string $html
    )
    {
        /*  $this->status = 'failed';
          $this->html = $html;*/
    }

    public function getResponse(): void
    {
        echo json_encode(['status' => $this->status, 'html' => $this->html]);
    }
}