<?php

$isError = false;
$msg = [];

$arrErrors = [
    'required' => 'Pole %s% jest wymagane!',
	'email' => 'Adres E-mail w polu %s% jest niepoprawny!'
];

function fieldRequired($fieldName, $fieldVal)
{
    global $isError, $msg, $arrErrors;
    if (empty($fieldVal))
    {
        $isError = true;
        $msg[] = str_replace('%s%', $fieldName, $arrErrors['required']);
    }
}

function displayErrors()
{
    global $isError, $msg;
    if($isError)
    {
        $html = '<div class="message"><ul class="error">';
        foreach ($msg as $m)
        {
            $html .= '<li>' . $m . '</li>';
        }

        $html .= "</ul></div>";
        echo $html;
    }
    else
    {
        return null;
    }
}
function isEmail($fieldName, $fieldVal){
    if(filter_var($fieldVal, FILTER_VALIDATE_EMAIL)){
        $isError = true;
        $msg[]= str_replace('%s%', $fieldName, $arrErrors['email']);
}
}