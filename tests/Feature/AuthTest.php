<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            'email' => 'test@gmail.com',
            'name' => 'Test',
            'MSSV' => 1806020052,
            'role_id' => 1,
            'password' => 'Hash::make(1806020052)',
            'class_id'=>0,
        ];
        //Send post request
        $response = $this->json('POST',route('api.register'),$data);
        //Assert it was successful
        $response->assertStatus(201);
        //Assert we received a token
        $this->assertArrayHasKey('name',$response->json());
        //Delete data
        dd($response);
        User::where('email','test@gmail.com')->delete();
    }
}
