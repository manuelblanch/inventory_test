<?php

namespace Tests;

class UserServiceSpec extends ObjectBehavior {

  function let(UserRepository $userRepository)
  {
    $this->beConstructedWith($userRepository);
  }

  function return_user_in_database(UserRepository $userRepository)
  {
    $userRepository->get(1)->willReturn([
        'id' => 1,
        'firstname' => 'John',
        'lastname' => 'Doe',
      ])->shouldBeCalled();

    $response = $this->get(1);

    $response->shouldHaveType(User::class);
    $response->id->shouldBe(1);
    $response->firstname->shouldBe('John');
    $response->lastname->shouldBe('Doe');
  }

  function throw_exception(UserRepository $userRepository)
  {
    $userRepository->get(1)->willReturn(null)->shouldBeCalled();

    $this->shouldThrow(NoSuchUserException::class)->duringGet(1);
  }
}
