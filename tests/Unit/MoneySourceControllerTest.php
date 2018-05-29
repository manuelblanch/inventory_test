<?php

namespace Tests\Unit;

class MoneySourceControllerTest extends \PHPUnit_Framework_TestCase
{
  public function testHome(){
  $this->be(User::find(1));
  $response = $this->call('GET', '/projects');
  //CHECK IF AUTH USER
  $this->assertTrue($response->isOk());

  $this->assertViewHas('projects', 'expected value for projects');
  $this->assertViewHas('users', 'expected value for users');
  $this->assertViewHas('roles', 'expected value for roles');
}
}
