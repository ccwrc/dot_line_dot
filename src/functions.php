<?php

define('CHAR_LIMIT', 9500);
require_once 'translate.php';

function translateHumanToMorse($stringToTranslate, array $morseCode) {

    if (!is_string($stringToTranslate) || !is_array($morseCode) 
            || strlen($stringToTranslate) > CHAR_LIMIT * 2) { // *2 for multibyte string
        return "";
    }

    $lowerStringToTranslate = trim(strtolower($stringToTranslate));
    $arrayString = preg_split('//u', $lowerStringToTranslate, -1, PREG_SPLIT_NO_EMPTY);
    $retString = "";
    foreach ($arrayString as $stringChar) {
        if (array_key_exists($stringChar, $morseCode)) {
            $retString .= $morseCode[$stringChar];
            $retString .= " &nbsp;";
        } else {
            $retString .= " ";
        }
    }
    return $retString;
}

function translateMorseToHuman($stringToTranslate, array $morseCode) {

    if (!is_string($stringToTranslate) || !is_array($morseCode) 
            || strlen($stringToTranslate) > CHAR_LIMIT * 2) {
        return "";
    }

    $flipMorseCode = array_flip($morseCode);
    $arrayToTranslate = explode(" ", $stringToTranslate);
    $retString = "";
    for ($i = 0; $i <= count($arrayToTranslate) - 1; $i++) {
        if (array_key_exists($arrayToTranslate[$i], $flipMorseCode)) {
            $retString .= $flipMorseCode[$arrayToTranslate[$i]];
        }
        $retString .= " ";
    }
    return $retString;
}

// http://tinyurl.com/array-key-exists-or-isset
