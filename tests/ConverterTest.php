<?php

require 'vendor\autoload.php';
require 'library.php';
use PHPUnit\Framework\TestCase;

class ConverterTest extends TestCase
{
    /**
     * @test
     */
//    function converterWorksCorrectly()
//    {
//        /**
//         * Given I have an english word
//         * When I pass that word to my converter
//         * Then I get back word in which first and last letter are removed
//         */
//        $word = 'esul';
//        $expectedResult = 'esul';
//        $resultFromConverter = convert($word);
//        $this->assertEquals(
//            $expectedResult,
//            $resultFromConverter
//        );
//    }
    function testLogin()
    {
        /**
         * Given I have an english word
         * When I pass that word to my converter
         * Then I get back word in which first and last letter are removed
         */
        $emeil_id_unsafe = 'peeter.pihus@hotmail.com';
        $password_unsafe = 'peeter123';
//        $table = 'unittest@email.com'
        $expectedResult = '0';
        $resultFromConverter = login($emeil_id_unsafe, $password_unsafe, 'users');
        $this->assertEquals(
            $expectedResult,
            $resultFromConverter
        );
    }
}
