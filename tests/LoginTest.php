<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{

    /**
     * Testing login failure.
     *
     * @return void
     */
    public function testLoginFail(){

    	$this->visit("/")
    	     ->type("diretoria.iesr@gmail.com", "email")
    	     ->type("123", "password")
    	     ->press("Login")
    	     ->see("These credentials do not match our records");

    }

    /**
     * Testing login success.
     *
     * @return void
     */
    public function testLoginSuccess()
    {
        $this->visit("/")
             ->type("diretoria.iesr@gmail.com", "email")
             ->type("1","password")
             ->press("Login")
             ->seePageIs("/dashboard");
    }

}
