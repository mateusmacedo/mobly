<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * @test
     */
    public function createUserTest()
    {
        $data = [
            'username' => 'joaosilva',
            'first_name' => 'João',
            'last_name' => 'Silva',
            'password' => '10203040'
        ];

        $expectResponse = [
            'success' => true,
            'data' => 1
        ];

        $this->post(route('api.v1.users.store'), $data)
            ->assertStatus(200)
            ->assertJson($expectResponse);
    }

    /**
     * @test
     */
    public function listUserTest()
    {
        $expectResponse = [
            'success' => true,
            'data' => [
                [
                    'id' => 1,
                    'username' => 'joaosilva',
                    'first_name' => 'João',
                    'last_name' => 'Silva',
                    'password' => '10203040'
                ]
            ]
        ];

        $this->get(route('api.v1.users.index'))
            ->assertStatus(200)
            ->assertJson($expectResponse);
    }

    /**
     * @test
     */
    public function listOneUserTest()
    {
        $expectResponse = [
            'success' => true,
            'data' => [
                [
                    'id' => 1,
                    'username' => 'joaosilva',
                    'first_name' => 'João',
                    'last_name' => 'Silva',
                    'password' => '10203040'
                ]
            ]
        ];
        $this->get(route('api.v1.users.index', [1]))
            ->assertStatus(200)
            ->assertJson($expectResponse);
    }

    /**
     * @test
     */
    public function updateUserTest()
    {
        $data = [
            'username' => 'joaosilva',
            'first_name' => 'João',
            'last_name' => 'da Silva',
            'password' => '10203040'
        ];

        $expectResponse = [
            'success' => true,
            'data' => 1
        ];

        $this->put(route('api.v1.users.update', [1]), $data)
            ->assertStatus(200)
            ->assertJson($expectResponse);
    }

    /**
     * @test
     */
    public function deleteUserTest()
    {
        $expectResponse = [
            'success' => true
        ];

        $this->delete(route('api.v1.users.destroy', [1]))
            ->assertStatus(200)
            ->assertJson($expectResponse);
    }

    /**
     * @test
     */
    public function searchUserTest()
    {
        $data = [
            'params' => [
                [
                    'field' => 'last_name',
                    'value' => 'da Silva'
                ]
            ]
        ];

        $expectResponse = [
            'success' => true,
            'data' => [
                [
                    'id' => 1,
                    'username' => 'joaosilva',
                    'first_name' => 'João',
                    'last_name' => 'da Silva',
                    'password' => '10203040'
                ]
            ]
        ];

        $this->post(route('api.v1.users.search'), $data)
            ->assertStatus(200)
            ->assertJson($expectResponse);

    }
}
