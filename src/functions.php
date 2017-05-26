<?php

define('CHAR_LIMIT', 4500);
require_once 'translate.php';

function translateHumanToMorse($stringToTranslate, array $morseCode) {

    if (!is_string($stringToTranslate) || !is_array($morseCode) 
            || strlen($stringToTranslate) > CHAR_LIMIT * 2) { // *2 for multibyte string
        return "";
    }

    $lowerStringToTranslate = trim(strtolower($stringToTranslate));
    $arrayString = preg_split('//u', $lowerStringToTranslate, -1, PREG_SPLIT_NO_EMPTY);
    $retString = "";
//    foreach ($arrayString as $stringChar) {  // slow version
//        foreach ($morseCode as $humanChar => $morseChar) {
//            if ($stringChar === (string) $humanChar) { // (string) for digits
//                $retString .= $morseChar;
//                $retString .= " &nbsp;";
//            } else {
//                $retString .= " ";
//            }
//        }
//    }
    foreach ($arrayString as $stringChar) {  // fast version
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

    $arrayToTranslate = explode(" ", $stringToTranslate);
    $retString = "";
    for ($i = 0; $i <= count($arrayToTranslate) - 1; $i++) {
        foreach ($morseCode as $humanChar => $morseChar) {
            if ($arrayToTranslate[$i] == $morseChar) {
                $retString .= $humanChar;
            }
            $retString .= " ";
        }
    }

    return $retString;
}
