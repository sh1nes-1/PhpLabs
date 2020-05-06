<?php

interface Model {

    function getId();

    static function fromArray($arr);

    function toArray();
}