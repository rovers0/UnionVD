<?php

namespace Tests\Unit;



use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
        
        $response->assertStatus(200);
        //Assert we received a token
        $this->assertArrayHasKey('token',$response->json());
        //Delete data
        User::where('email','test@gmail.com')->delete();
    }
}
