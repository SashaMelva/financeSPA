<?php

class User 
{
    public function __construct(
        private string $login,
        private string $password,
    ){}
}