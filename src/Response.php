<?php

namespace App;

class Response
{
    public function __construct(
        private string $status,
        private string $html,
        private ?array $args
    )
    {
    }

    public function getResponse(): void
    {
        echo json_encode(['status' => $this->status, 'html' => $this->html, 'args' => $this->args]);
    }
}