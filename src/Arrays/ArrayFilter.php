<?php

namespace Tanzar\Converters\Arrays;

class ArrayFilter {
    
    /**
     * Filters keys with values from given array
     *
     * @param array $arrayToFilter array to filter
     * @param array $keysToKeep array with keys to keep in result
     * 
     * @return array filtered array
     * 
     */
    public static function filter(array $arrayToFilter, array $keysToKeep) : array {
        $result = [];
        foreach($keysToKeep as $key){
            if(isset($arrayToFilter[$key])){
                $result[$key] = $arrayToFilter[$key];
            }
        }
        return $result;
    }
}