<?php

namespace Sleepness\Tests;

require_once __DIR__ . '/../Shifter.php';
require_once __DIR__ . '/Stubs/User.php';
require_once __DIR__ . '/Stubs/UserDto.php';

use Sleepness\Shifter;
use Sleepness\Tests\Stubs\User;
use Sleepness\Tests\Stubs\UserDto;

class ShifterTest extends \PHPUnit_Framework_TestCase
{
    public function testFromDto()
    {
        $emailAddress = 'test@test.com';
        $phone = '80631257866';

        $dto = new UserDto();
        $dto->firstName = 'test';
        $dto->lastName = 'test';
        $dto->email = $emailAddress;
        $dto->phone = $phone;
        $dto->gender = 'male';

        $shifter = new Shifter();
        $result = $shifter->fromDto($dto, new User());

        $this->assertEquals($emailAddress, $result->getEmail());
        $this->assertEquals($phone, $result->getPhone());

        $this->assertObjectNotHasAttribute('gender', $result);
        $this->assertObjectNotHasAttribute('engine', $result);
    }

    public function testToDto()
    {
        $email = 'test@test.com';
        $phone = '80631257866';

        $domainObject = new User();
        $domainObject->setFirstName('test');
        $domainObject->setSecondName('test');
        $domainObject->setEmail($email);
        $domainObject->setPhone($phone);
        $domainObject->setPassword('test');
        $domainObject->setPlainPassword('4242');
        $domainObject->setUsername('Angelina');

        $shifter = new Shifter();
        $result = $shifter->toDto($domainObject, new UserDto());

        $this->assertEquals($email, $result->email);
        $this->assertEquals($phone, $result->phone);

        $this->assertObjectNotHasAttribute('username', $result);
        $this->assertObjectNotHasAttribute('plainPassword', $result);
    }
}
