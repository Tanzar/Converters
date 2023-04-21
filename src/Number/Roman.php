<?php

namespace Tanzar\Converters\Number;

class Roman {

    /**
     * Converts given number to its representation in Roman number format
     *
     * @param int $number value to format
     * 
     * @return string formatted value
     * 
     */
    public static function toRoman(int $number) : string {
        $map = self::mapNumbers();
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    /**
     * Converts given roman value to int
     * If given value cointains characters that are not roman number returned value is 0
     *
     * @param string $roman text consisting of roman number, acceptable characters are: M, C, D, L, X, V and I
     * 
     * @return int converted value, if incorrect value is given returns 0
     * 
     */
    public static function fromRoman(string $roman) : int {
        $romans = self::mapNumbers();
        $result = 0;
        if(! preg_match('/^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/', $roman)){
            return 0;
        }
        foreach ($romans as $key => $value) {
            while (strpos($roman, $key) === 0) {
                $result += $value;
                $roman = substr($roman, strlen($key));
            }
        }
        return (int) $result;
    }

    private static function mapNumbers() : array {
        return array(
            'M' => 1000, 
            'CM' => 900, 
            'D' => 500, 
            'CD' => 400, 
            'C' => 100, 
            'XC' => 90, 
            'L' => 50, 
            'XL' => 40, 
            'X' => 10, 
            'IX' => 9, 
            'V' => 5, 
            'IV' => 4, 
            'I' => 1
        );
    }
}