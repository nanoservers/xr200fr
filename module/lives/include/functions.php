<?php

function lives_CleanVars(&$global, $key, $default = '', $type = 'int')
{
    switch ($type) {
        case 'array':
            $ret = (isset($global[$key]) && is_array($global[$key])) ? $global[$key] : $default;
            break;
        case 'date':
            $ret = (isset($global[$key])) ? strtotime($global[$key]) : $default;
            break;
        case 'string':
            $ret = (isset($global[$key])) ? filter_var($global[$key], FILTER_SANITIZE_MAGIC_QUOTES) : $default;
            break;
        case 'int': default:
            $ret = (isset($global[$key])) ? filter_var($global[$key], FILTER_SANITIZE_NUMBER_INT) : $default;
            break;
    }
    if ($ret === false) {
        return $default;
    }
    return $ret;
}

?>