<?php

class Utils {

    public static function get_file_hash($filename) {
        return date('YmdHis', filemtime($filename));
    }

	public static function get_post_value($var_name) {
		return isset($_POST[$var_name]) ? $_POST[$var_name] : "";
    }
        
}