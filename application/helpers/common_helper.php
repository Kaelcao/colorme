<?php
if (!function_exists('common_value_post')) {
    function common_value_post($value)
    {
        return (!empty($value)) ? trim(htmlspecialchars($value)) : '';
    }

    function keep_only_number($string)
    {

        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^0-9\-]/', '', $string); // Removes special chars.

    }
    function format_date_from_db($day){
        $phpdate = strtotime($day);
        return date('D, jS M Y', $phpdate);
    }

    function format_currency($value)
    {
        return number_format($value, 0) . " đ";
    }


    function deleteFiles($path)
    {
        $path = $_SERVER['DOCUMENT_ROOT']."/colorme/" . $path;

        unlink($path); // delete file

    }
    function dd($var){
        var_dump($var);
        die();
    }
}