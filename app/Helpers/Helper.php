<?php

use App\Models\Brand;

if (!function_exists('urlClear')) {
    function urlClear($url, $params)
    {
        $isEmpty = false;
        foreach ($params as $k => $param) {
            if ($param == null) {
                $isEmpty = true;
                unset($params[$k]);
            }
        }
        if ($isEmpty) {
            return $url . ($params ? '?' . http_build_query($params) : '');
        }
        return false;
    }
}

if (!function_exists('str_starts_with_route')) {
    function str_starts_with_any($path, array $prefixs)
    {
        foreach ($prefixs as $prefix) {
            if (str_starts_with($path, $prefix)) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('checkRole')) {
    function checkRole()
    {
        $position = auth()->user()->position_id;

        if ($position == ROLES['admin']) {
            return 'admin';
        }
        if ($position == ROLES['system_admin']) {
            return 'system_admin';
        }
        if ($position == ROLES['super_admin']) {
            return 'super_admin';
        }
        return false;
    }
}

if(!function_exists("searchSpecialCharacters")) {
    function searchSpecialCharacters($search) {
        $specialCharacters = '%_\\?*[]()+|';
        return addcslashes($search, $specialCharacters);
    }
}

if (! function_exists('getAllBrands')) {
    /**
     * Lấy tất cả các thương hiệu (brands) từ database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function getAllBrands() {
        return Brand::all();
    }
}