<?php

function live_CleanVars(&$global, $key, $default = '', $type = 'int') {

    switch ($type) {
        case 'string':
            $ret = (isset($global[$key])) ? $global[$key] : $default;
            //$ret = ( isset( $global[$key] ) ) ? filter_var( $global[$key], FILTER_SANITIZE_MAGIC_QUOTES ) : $default;
            break;
        case 'int':
        default:
            $ret = (isset($global[$key])) ? intval($global[$key]) : intval($default);
            //$ret = ( isset( $global[$key] ) ) ? filter_var( $global[$key], FILTER_SANITIZE_NUMBER_INT ) : $default;
            break;
    }
    if ($ret === false) {
        return $default;
    }
    return $ret;
}

?>