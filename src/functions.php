<?php

require_once 'translate.php';

function translateHumanToMorse($stringToTranslate, array $morseCode) {

    if (!is_string($stringToTranslate) || !is_array($morseCode)) {
        return "";
    }

    $stringToTranslate = trim(strtolower($stringToTranslate));
    $retString = "";
    for ($i = 0; $i <= strlen($stringToTranslate) - 1; $i++) {
        foreach ($morseCode as $humanWord => $morseChar) {
            if ($stringToTranslate[$i] === $humanWord) {
                $retString .= $morseChar;
                $retString .= " ";
            } else {
                $retString .= " ";
            }
        }
    }

    return $retString;
}
