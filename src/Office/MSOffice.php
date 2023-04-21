<?php

namespace Tanzar\Converters\Office;

class MSOffice {

    /**
     * Converts given row and column number to excell cell address, values should start from 1
     * Negative values are treated like positive.
     * Zero is treated like 1
     *
     * @param int $row number representing row
     * @param int $col number representing column
     * 
     * @return string cell address
     * 
     */
    public static function toExcelAddress(int $row, int $col) : string {
        if($row === 0){
            $row = 1;
        }
        if($col === 0){
            $col = 1;
        }
        return self::getColFromNumber($col) . abs($row);
    }

    private static function getColFromNumber(int $num) : string {
        $numeric = (abs($num) - 1) % 26;
        $letter = chr(65 + $numeric);
        $num2 = intval((abs($num) - 1) / 26);
        if ($num2 > 0) {
            return self::getColFromNumber($num2) . $letter;
        } else {
            return $letter;
        }
    }

    /**
     * Converts given time to excel formula
     * Excel sometimes is strange when it comes to calculate time, in some cases this can be helpful
     *
     * @param int $time time in minutes
     * 
     * @return string formula to insert into excel cell
     * 
     */
    public static function toExcelTimeInMin(int $time) : string {
        $remaining = ($time - floor($time / 60) * 60);
        if($remaining < 10){
            $remaining = '0' . $remaining;
        }
        $hours = floor($time / 60);
        return '=('.$hours.'/24+TIME(0,'.$remaining.',0))';
    }
    
    /**
     * Converts given time to excel formula
     * Excel sometimes is strange when it comes to calculate time, in some cases this can be helpful
     *
     * @param int $time time in ms
     * 
     * @return string formula to insert into excel cell
     * 
     */
    public static function toExcelTimeInMs(int $time) : string {
        $mins = floor($time / 1000 / 60);
        $remaining = ($mins - floor($mins / 60) * 60);
        if($remaining < 10){
            $remaining = '0' . $remaining;
        }
        $hours = floor($mins / 60);
        return '=('.$hours.'/24+TIME(0,'.$remaining.',0))';
    }
}