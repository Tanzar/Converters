<?php

namespace Tanzar\Converters\Arrays;

class ArrayParser {

    /**
     * Parses array from one to another with selected keys
     *
     * @param array $arrayToParse array with keys and values to parse
     * @param array $requiredKeys array with required keys, if key is not set 0 is set as default value
     * @param array $optionalKeys array with optional keys, if key is not found it is ignored
     * 
     * @return array parsed array
     * 
     */
    public static function parse(array $arrayToParse, array $requiredKeys, array $optionalKeys = []) : array {
        $result = [];
        foreach($requiredKeys as $key){
            $result[$key] = (isset($arrayToParse[$key])) ? $arrayToParse[$key] : 0;
        }
        foreach($optionalKeys as $key){
            if(isset($arrayToParse[$key])){
                $result[$key] = $arrayToParse[$key];
            }
        }
        return $result;
    }
}