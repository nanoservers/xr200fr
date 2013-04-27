<?php

function tv_CleanVars(&$global, $key, $default = '', $type = 'int') {

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

function tv_setwords($meta) {
	// Get regular expression from module setting. default setting is : `[^a-z0-9]`i
    $regular_expression = xoops_getModuleOption('regular_expression', 'tv');
    
    $meta = strip_tags($meta);
    $meta = preg_replace("`\[.*\]`U", "", $meta);
    $meta = preg_replace('`&(amp;)?#?[a-z0-9]+;`i', ',', $meta);
    $meta = htmlentities($meta, ENT_COMPAT, 'utf-8');
    $meta = preg_replace("`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i", "\\1", $meta);
    $meta = preg_replace(array($regular_expression, "`[,]+`"), ",", $meta);
    $meta = ($meta == "") ? $type : strtolower(trim($meta, ','));
    return $meta;
}

?>