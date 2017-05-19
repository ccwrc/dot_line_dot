<?php

require_once 'translate.php';

// not working correctly with multibyte string !
function translateHumanToMorseOld($stringToTranslate, array $morseCode) {

    if (!is_string($stringToTranslate) || !is_array($morseCode)) {
        return "";
    }

    $lowerStringToTranslate = trim(strtolower($stringToTranslate));
    $retString = "";
    for ($i = 0; $i <= strlen($lowerStringToTranslate) - 1; $i++) {
        foreach ($morseCode as $humanChar => $morseChar) {
            if ($lowerStringToTranslate[$i] === $humanChar) {
                $retString .= $morseChar;
                $retString .= " ";
            } else {
                $retString .= " ";
            }
        }
    }

    return $retString;
}

// slow, but work fine. 
function translateHumanToMorse($stringToTranslate, array $morseCode) {

    if (!is_string($stringToTranslate) || !is_array($morseCode) 
            || strlen($stringToTranslate) > 10000) {
        return "";
    }

    $lowerStringToTranslate = trim(strtolower($stringToTranslate));
    $arrayString = preg_split('//u', $lowerStringToTranslate, -1, PREG_SPLIT_NO_EMPTY);
    $retString = "";
    foreach ($arrayString as $stringChar) { 
        foreach ($morseCode as $humanChar => $morseChar) {           
            if ($stringChar === (string)$humanChar) { // (string) for digits
                $retString .= $morseChar;
                $retString .= " &nbsp;";
            } else {
                $retString .= " ";
            }
        }
    }

    return $retString;
}


function translateMorseToHuman($stringToTranslate, array $morseCode) {

    if (!is_string($stringToTranslate) || !is_array($morseCode) 
            || strlen($stringToTranslate) > 10000) {
        return "";
    }

    $arrayToTranslate = explode(" ", $stringToTranslate);
    $retString = "";
    for ($i = 0; $i <= count($arrayToTranslate) - 1; $i++) {
        foreach ($morseCode as $humanChar => $morseChar) {
            if ($arrayToTranslate[$i] == $morseChar) {
                $retString .= $humanChar;
                $retString .= " ";
            } else {
                $retString .= " ";
            }
        }
    }

    return $retString;
}
