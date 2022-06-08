<?php


namespace App\Helpers;


class Helpers
{
    public static function formatZipCode(string $zipCode): string
    {
        $string = preg_replace("[^0-9]", "", $zipCode);
        return substr($string, 0, 5) . '-' . substr($string, 5, 3);
    }

    public static function formatMoney(float $value, bool $currency = true, int $precision = 2): string
    {
        if ($currency) {
            return "R$ " . number_format($value, $precision, ',', '.');
        }

        return number_format($value, $precision, ',', '.');
    }

    public static function pathPhotos(string $resource, string $path): string
    {
        return "http://" . $_SERVER['HTTP_HOST'] . "/assets/{$path}/" . $resource;
    }
}