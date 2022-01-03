<?php

namespace App;

class NotModifiedField
{
    /** @var NotModifiedField */
    private static $instance = null;

    /** NotModifiedField constructor.*/
    private function __construct()
    {
    }

    /** @return NotModifiedField */
    public static function getInstance()
    {
        if (!NotModifiedField::$instance instanceof NotModifiedField) {
            NotModifiedField::$instance = new NotModifiedField();
        }

        return NotModifiedField::$instance;
    }
}
