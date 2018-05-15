<?php

namespace Tests;

class BrandTest extends TestCase
{
    public function let(Repository $Repository)
    {
        $this->beConstructedWith($Repository);
    }

    public function return_user_in_database(Repository $Repository)
    {
        $userRepository->get(1)->willReturn([
        'id'        => 1,
        'firstname' => 'Marca',
        'lastname'  => 'Sound',
      ])->shouldBeCalled();

        $response = $this->get(1);

        $response->shouldHaveType(User::class);
        $response->id->shouldBe(1);
        $response->firstname->shouldBe('Marca');
        $response->lastname->shouldBe('Sound');
    }

    public function throw_exception(Repository $Repository)
    {
        $Repository->get(1)->willReturn(null)->shouldBeCalled();

        $this->shouldThrow(NoSuchUserException::class)->duringGet(1);
    }
}
