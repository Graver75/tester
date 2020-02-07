<?php


class Common {
    static function is_employee_id_set($post_obj) {
        return array_key_exists('employee_id', $post_obj);
    }
}