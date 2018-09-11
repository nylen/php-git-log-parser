<?php
/**
 * Created by PhpStorm.
 * User: Estevao
 * Date: 28-12-2014
 * Time: 19:26
 */

class RealTest extends \PHPUnit_Framework_TestCase
{
    public function testReal()
    {
        $parser = new \Tivie\GitLogParser\Parser();
        $dir = realpath(__DIR__ . '/../');
        $parser->setGitDir($dir);
        $logArray = $parser->parse();
        print_r($logArray);
        self::assertNotEmpty($logArray);
    }
}
