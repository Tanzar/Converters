<?php

use PHPUnit\Framework\TestCase;
use Tanzar\Converters\Arrays\ArrayParser;

class ArrayParserTest extends TestCase{

    public function testParse() {
        $input = [
            'name' => "Janusz",
            'surname' => 'Kowalski',
            'email' => 'kowal73@mail.pl',
            'pass' => 'Polak73',
            'description' => 'Nie interesuj się'
        ];

        $required = ['name', 'surname', 'pass', 'tel'];
        $optional = ['email', 'town'];

        $expected = [
            'name' => "Janusz",
            'surname' => 'Kowalski',
            'email' => 'kowal73@mail.pl',
            'pass' => 'Polak73',
            'tel' => 0
        ];

        $result = ArrayParser::parse($input, $required, $optional);
        $this->assertEquals($expected, $result);

    }
}