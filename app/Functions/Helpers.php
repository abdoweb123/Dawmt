<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Modules\Country\Entities\Country;

function country_code()
{
    return 'SA';
}
function phone_code()
{
    return 966;
}

function format_number($number)
{
    return number_format($number, Country()->decimals, '.', '');
}

function obfuscateNumber($number) {
    $numberStr = (string)$number;
    
    $prefix = substr($numberStr, 0, 2);
    
    $numAsterisks = strlen($numberStr) - 2;
    
    $obfuscated = $prefix . str_repeat('*', $numAsterisks);
    
    return $obfuscated;
}

function lang($lang = null)
{
    if (isset($lang)) {
        return app()->islocale($lang);
    } else {
        return app()->getlocale();
    }
}

function getLatLong($address) {
    $formattedAddress = urlencode($address);
    $key = env('MAP_KEY');
    $apiUrl = "https://maps.googleapis.com/maps/api/geocode/json?address={$formattedAddress}&key={$key}";
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);
    if ($data['status'] === 'OK') {
        return [
            0 => $data['results'][0]['geometry']['location']['lat'], 
            1 => $data['results'][0]['geometry']['location']['lng']
        ];
    } else {
        return [
            0 => 0.000,    
            1 => 0.000,    
        ];
    }
}



function previous_route($lang = null)
{
    return str_replace(".create", ".index", str_replace(".edit", ".index", app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName()));
}


function location()
{
    if(request('lat') && request('long')){
        return [request('lat'),request('long'),];
    }else{
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (isset($_SERVER['HTTP_FORWARDED'])) {
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        } else {
            $ipaddress = 'UNKNOWN';
        }
        
        return explode(",",json_decode(file_get_contents("http://ipinfo.io/$ipaddress/geo"), true)['loc']);

    }
}

function activeGuard($CheckGuard = NULL)
{
    if($CheckGuard){
        $active = array_filter(explode('/', $_SERVER['REQUEST_URI']))[1];
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth()->guard($guard)->check() && $active == $guard) {
                return $guard == $CheckGuard;
            }
        }
        return str_replace("/", "", Request()->route()->getPrefix());
    }else{
        $active = array_filter(explode('/', $_SERVER['REQUEST_URI']))[1];
        foreach (array_keys(config('auth.guards')) as $guard) {
            if (auth()->guard($guard)->check() && $active == $guard) {
                return $guard;
            }
        }
    }
    return str_replace("/", "", Request()->route()->getPrefix());
}
function Countries()
{
    if (! Config::get('Countries')) {
        Config::set('Countries', Country::Active()->get());
    }

    return Config::get('Countries');
}

function Country($id = 2)
{
    if (! Config::get('Country')) {
        Config::set('Country', Countries()->where('id', $id)->first());
    }

    return Config::get('Country');
}

function Settings()
{
    if (! Config::get('Settings')) {
        Config::set('Settings', Setting::Active()->get());
    }

    return Config::get('Settings');
}

function setting($key)
{
    return Settings()->where('key', $key)->first()?->value;
}

function DT_Lang()
{
    if (lang('ar')) {
        return '//cdn.datatables.net/plug-ins/1.10.16/i18n/Arabic.json';
    } else {
        return '//cdn.datatables.net/plug-ins/1.10.16/i18n/English.json';
    }
}

function percent($percentage, $total)
{
    return ($percentage / 100) * $total;
}

function Client()
{
    if(auth('client')->check()){
        return auth('client')->user();
    }else{
        return NULL;
    }
}


function truncateToLetters($string, $letterCount = 100)
{
    if (mb_strlen($string) > $letterCount) {
        return mb_substr($string, 0, $letterCount) . '...';
    }

    return $string;
}


if (!function_exists('formatName')) {
    function formatName($productName)
    {
        // Replace spaces with hyphens
        $formattedName = str_replace(' ', '-', $productName);

        // Remove trailing hyphen if the final word ends with one
        if (substr($formattedName, -1) === '-') {
            $formattedName = rtrim($formattedName, '-');
        }

        return $formattedName;
    }
}

