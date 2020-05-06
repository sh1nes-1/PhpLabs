<?php

/**
 * Base interface for models
 */
interface Model {

    function getId();

    static function fromArray($arr);

    function toArray();
}