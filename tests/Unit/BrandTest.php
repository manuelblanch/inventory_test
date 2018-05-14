<?php
namespace Tests;
class Brand extends \PHPUnit_Framework_TestCase {
  function testlet(Repository $Repository)
  {
    $this->beConstructedWith($Repository);
  }
  function return_user_in_database(Repository $Repository)
  {
    $userRepository->get(1)->willReturn([
        'id' => 1,
        'firstname' => 'Marca',
        'lastname' => 'Sound',
      ])->shouldBeCalled();
    $response = $this->get(1);
    $response->shouldHaveType(User::class);
    $response->id->shouldBe(1);
    $response->firstname->shouldBe('Marca');
    $response->lastname->shouldBe('Sound');
  }
  function testthrow_exception(Repository $Repository)
  {
    $Repository->get(1)->willReturn(null)->shouldBeCalled();
    $this->shouldThrow(NoSuchUserException::class)->duringGet(1);
  }
}
