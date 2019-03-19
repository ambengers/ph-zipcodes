<?php

namespace Ambengers\PHZipCodes;

class ZipCode
{
    /**
     * Get the list of zipcodes
     *
     * @return array
     */
    public static function list()
    {
        /**
         * @source https://github.com/arnellebalane/zipcodes-ph/blob/master/source/zipcodes.json
         */
        return json_decode(file_get_contents('directory.json'), true);
    }

    /**
     * Find the location(s) by the given zipcode
     *
     * @param  string $code
     * @return array|null
     */
    public static function find(string $code)
    {
        $directory = self::list();

        if (! array_key_exists($code, $directory)) {
            return null;
        }

        return is_array($results = $directory[$code]) ? $results : [$results];
    }
}
