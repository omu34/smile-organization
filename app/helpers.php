<?php
if (!function_exists('env')) {
    function env(string $key, $default = null) {
        $value = getenv($key);
        if ($value === false) {
            return $default;
        }
        if ($value === 'true') return true;
        if ($value === 'false') return false;
        if ($value === 'null') return null;
        if (is_numeric($value) && strpos($value, '.') === false) {
            return (int)$value;
        }
        if (is_numeric($value) && strpos($value, '.') !== false) {
            return (float)$value;
        }
        return $value;
    }
}