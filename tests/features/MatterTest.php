<?php

use App\Models\Matter;
use App\Models\Serie;
use App\Models\User;

class MatterTest extends TestCase
{

	public function setUp(){

		parent::setUp();

		// Authenticating user for testing
		$user = new User(['email' => 'diretoria.iesr@gmail.com']);
		$this->be($user);
	}

	/** @test */
	function testUserCanClickAddingNewMatter()
	{

		// Arrange

		// Act

		// Visiting the list of matters' page
		$this->visit('/matters');

		// Assert

		// Am I in the right place?
		$this->see('Matérias')
		     ->see('Nova');

		// Can I make a call to add a new matter?
		$this->press('Nova')
		     ->seePageIs('/matters/create');
	    
	}

    /**
     * Adding a new matter.
     *
     * @return void
     */
    function testUserCanCreateNewMatter()
    {

    	// Arrange

    	// Create a serie
    	$serie = factory(Serie::class)->create();

    	// Act

    	// Add new matter
    	$matter = factory(Matter::class)->make();

    	$this->visit("/matters/create")
    		 ->type( $matter->serie_id, 'serie_id' )
    		 ->type( $matter->name, 'name' )
    		 ->select( $matter->category, 'category' )
    		 ->press('Salvar');

    	// Assert

    	// Make sure the "OK" message was indicated
    	$this->seePageIs('/matters')
    		 ->see('sucesso');

    	// Make sure the new matter was created through the page
    	$this->seeInDatabase('matters', ['name' => $matter->name, 'serie_id' => $matter->serie_id]);

    }

}
