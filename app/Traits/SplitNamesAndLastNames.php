<?php

namespace App\Traits;

trait SplitNamesAndLastNames
{
    /* Método para obtener primer nombre */
    public function splitName($fullName)
    {
        /* separar el nombre completo en espacios */
        $tokens = explode(' ', trim($fullName));
        /* arreglo donde se guardan las "palabras" del nombre */
        $names = array();
        /* palabras de nombres compuetos */
        $special_tokens = array('da', 'de', 'del', 'la', 'las', 'los', 'mac', 'mc', 'van', 'von', 'y', 'i', 'san', 'santa');

        $prev = "";
        foreach ($tokens as $token) {
            $_token = strtolower($token);
            if (in_array($_token, $special_tokens)) {
                $prev .= "$token ";
            } else {
                $names[] = $prev . $token;
                $prev = "";
            }
        }
        $num_names = count($names);
        $firstName = $secondName = "";

        switch ($num_names) {
            case 0:
                $firstName = '';
                break;
            case 1:
                $firstName = $names[0];
                break;
            case 2:
                $firstName    = $names[0];
                $secondName  = $names[1];
                break;
            case 3:
                $firstName = $names[0] . ' ' . $names[1];
                $secondName = $names[2];
            default:
                $firstName = $names[0];
                unset($names[0]);
                unset($names[1]);

                $secondName = implode(' ', $names);
                break;
        }
        $firstName = mb_convert_case($firstName, MB_CASE_TITLE, 'UTF-8');
        $secondName  = mb_convert_case($secondName, MB_CASE_TITLE, 'UTF-8');
        return $firstName;
    }

    /* Método para obtener apellido compuesto */
    public function splitLastName($fullLastName)
    {
        /* separar el apellido completo en espacios */
        $tokens = explode(' ', trim($fullLastName));
        /* arreglo donde se guardan las "palabras" del nombre */
        $lastNames = array();
        /* palabras de apellidos compuetos */
        $special_tokens = array('da', 'de', 'del', 'la', 'las', 'los', 'mac', 'mc', 'van', 'von', 'y', 'i', 'san', 'santa');

        $prev = "";
        foreach ($tokens as $token) {
            $_token = strtolower($token);
            if (in_array($_token, $special_tokens)) {
                $prev .= "$token ";
            } else {
                $lastNames[] = $prev . $token;
                $prev = "";
            }
        }
        $num_lastNames = count($lastNames);
        $firstLastName = $secondLastName = "";

        switch ($num_lastNames) {
            case 0:
                $firstLastName = '';
                break;
            case 1:
                $firstLastName = $lastNames[0];
                break;
            case 2:
                $firstLastName    = $lastNames[0];
                $secondLastName  = $lastNames[1];
                break;
            case 3:
                $firstLastName = $lastNames[0] . ' ' . $lastNames[1];
                $secondLastName = $lastNames[2];
            default:
                $firstLastName = $lastNames[0] . ' ' . $lastNames[1];
                unset($lastNames[0]);
                unset($lastNames[1]);

                $secondLastName = implode(' ', $lastNames);
                break;
        }
        $firstLastName = mb_convert_case($firstLastName, MB_CASE_TITLE, 'UTF-8');
        $secondLastName  = mb_convert_case($secondLastName, MB_CASE_TITLE, 'UTF-8');
        return $firstLastName;
    }

    public function convertDate($date)
    {
        setLocale(LC_ALL, 'spanish_ecuador.utf-8');
        $myDate = str_replace("/", "-", $date);
        $newDate = date('d-m-Y H:i:s', strtotime($myDate));
        return strftime('%A, %d de %B de %T %p', strtotime($newDate));
    }
}
