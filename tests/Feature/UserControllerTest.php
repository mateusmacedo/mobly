<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testCreateUser()
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

    public function testListUser()
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

    public function testListOneUser()
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

    public function testUpdateUser()
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

    public function testDeleteUser()
    {
        $expectResponse = [
            'success' => true
        ];

        $this->delete(route('api.v1.users.destroy', [1]))
            ->assertStatus(200)
            ->assertJson($expectResponse);
    }

    public function testSearchUser()
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
