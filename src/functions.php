<?php

require_once 'translate.php';


function translateHumanToMorse($stringToTranslate, array $morseCode) {

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


function translateMorseToHuman($stringToTranslate, array $morseCode) {

    if (!is_string($stringToTranslate) || !is_array($morseCode)) {
        return "";
    }

    $arrayToTranslate = explode(" ", $stringToTranslate);
    $retString = "";
    for ($i = 0; $i <= count($arrayToTranslate) - 1; $i++) {
        foreach ($morseCode as $humanChar => $morseChar) {
            if ($arrayToTranslate[$i] === $morseChar) {
                $retString .= $humanChar;
                $retString .= " ";
            } else {
                $retString .= " ";
            }
        }
    }

    return $retString;
}
