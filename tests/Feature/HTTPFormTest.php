<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HTTPFormTest extends TestCase
{
    /**
     * Test the validation of the form
     * Im passing correct data to the controller and ensure that we get the correct response
     * If mail or inserting in the database or validation fails the test will be not valid
     * @return void
     */
    public function test_example()
    {   
        //pass data to controller
        $name = 'Some Name';
        $email = 'email@abv.bg';
        $phone = '0885588111';
        $message = 'Test Example Message';
        $response = $this->postJson('/contact', [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
        ]);

        $response
        ->assertStatus(200)
        ->assertExactJson([
                'text' => "Thank you for contacting us!",
                'sent' => true
            ]);


    }

     /**
     * Test the validation of the form
     * Im passing correct data to the controller and ensure that we get the correct response
     * If mail or inserting in the database or validation fails the test will be not valid
     * @return void
     */
    public function test_validation_form()
    {   
        //pass data to controller
        $name = 'Some Name Asd';
        $email = 'email@';
        $phone = '088558811112312312312';
        $message = 'Test Example Message Test Example MessageTest Example message Test Example Message Test Example Message Test Example Message Test Example Message Test Example Message Test Example Message Test Example MessageTest Example MessageTest Test Example Message Test Example Message Test Example Message Test Example Message Test Example Message Test Example Message Test Example Message Test Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example Message Test Example Message Test Example MessageTest Example message Test Example Message Test Example Message Test Example Message Test Example Message Test Example Message Test Example Message Test Example MessageTest Example MessageTest Test Example Message Test Example Message Test Example Message Test Example Message Test Example Message Test Example Message Test Example Message Test Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example MessageTest Example Message';
        $response = $this->postJson('/contact', [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
        ]);

        $response
        ->assertStatus(422)
        ->assertJson([
                'message' => "The given data was invalid.",
            ]);


    }
}
