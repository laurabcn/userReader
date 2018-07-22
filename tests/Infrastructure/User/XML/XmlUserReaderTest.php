<?php

namespace Tests\Infrastructure\User\XML;

use App\Domain\User\User;
use App\Infrastructure\User\XML\XmlUserReader;

class XmlUserReaderTest extends \PHPUnit_Framework_TestCase
{
    /** @var  XmlUserReader */
    private $sut;

    public function setUp()
    {
        $this->sut = new XmlUserReader( __DIR__ .'/../../data/data.xml');
    }

    public function testSuccess()
    {

        $files = ($this->sut->read())->users();

        $expectedUsers = [
            new User('Taylor Glover',
                'Taylor.Glover@gmail.com',
                '463-170-9623 x156',
                'Cargill')
        ];

        self::assertEquals($expectedUsers, $files);
    }
}
