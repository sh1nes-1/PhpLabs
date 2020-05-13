<?php

function get_file_hash($filename) {
    return date('YmdHis', filemtime($filename));
}