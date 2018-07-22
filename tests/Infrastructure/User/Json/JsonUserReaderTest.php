<?php

namespace App\Infrastructure\User\Json;

use App\Domain\User\User;
use PHPUnit\Framework\TestCase;

class JsonUserReaderTest extends TestCase
{
    /** @var  JsonUserReader */
    private $sut;


    public function setUp()
    {
        $user = [
            ['id' => '1',
                'name' => 'Agatha Christie',
                'username' => 'Agatha',
                'email' => 'agatha@gmail.com',
                'address' => [
                    'street' => 'isla bonita',
                    'suite' => '22',
                    'city' => 'Tarragona',
                    'zipcode' => '82828-0',
                    'geo' => [
                        'lat' => '-909',
                        'lng' => '0'
                    ]
                ],
                'phone' => '5666288-00',
                'website' => 'holiju.com',
                'company' => [
                    'name' => 'conguitos',
                    'catchPhrase' => 'cubiertos de chocolate',
                    'bs' => 'spy'
                ]
            ]
        ];
        $this->sut = new JsonUserReader(__DIR__.'/../../data/data.json');
    }

    public function testSuccess()
    {
        $users = ($this->sut->read())->users();

        $expectedUsers = [
            new User(
                'Leanne Graham',
                'Sincere@april.biz',
                '1-770-736-8031 x56442',
                'Romaguera-Crona'
            )
        ];

        self::assertEquals($expectedUsers, $users);
    }
}
