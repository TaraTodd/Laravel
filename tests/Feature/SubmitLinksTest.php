<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;


class SubmitLinksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guest_can_submit_a_new_link()//Verify that valid links get saved in the database
    {
        $response = $this->post('/submit', [
            'title' => 'Example Title',
            'url' => 'http://example.com',
            'description' => 'Example description.',
        ]);

        $this->assertDatabaseHas('links', [
            'title' => 'Example Title'
        ]);

        $response
            ->assertStatus(302)
            ->assertHeader('Location', url('/'));

        $this
            ->get('/')
            ->assertSee('Example Title');
    }

    function link_is_not_created_if_validation_fails()//When validation fails, links are not in the database
	{
    	$response = $this->post('/submit');

    	$response->assertSessionHasErrors(['title', 'url', 'description']);
	}

	function link_is_not_created_with_an_invalid_url()//Invalid URLs are not allowed
	{
    	$this->withoutExceptionHandling();

    	$cases = ['//invalid-url.com', '/invalid-url', 'foo.com'];

    	foreach ($cases as $case) {
        	try {
            	$response = $this->post('/submit', [
                	'title' => 'Example Title',
                	'url' => $case,
                	'description' => 'Example description',
            	]);
        	} catch (ValidationException $e) {
            	$this->assertEquals(
                	'The url format is invalid.',
                	$e->validator->errors()->first('url')
            	);
            	continue;
        	}

        	$this->fail("The URL $case passed validation when it should have failed.");
    	}
	}

	function max_length_fails_when_too_long()//Validation should fail when the fields are longer than the max:255 validation rule
	{
    	$this->withoutExceptionHandling();

    	$title = str_repeat('a', 256);
    	$description = str_repeat('a', 256);
    	$url = 'http://';
    	$url .= str_repeat('a', 256 - strlen($url));

    	try {
        	$this->post('/submit', compact('title', 'url', 'description'));
    	} catch(ValidationException $e) {
        	$this->assertEquals(
            	'The title may not be greater than 255 characters.',
            	$e->validator->errors()->first('title')
        	);

        	$this->assertEquals(
            	'The url may not be greater than 255 characters.',
            	$e->validator->errors()->first('url')
        	);

        	$this->assertEquals(
            	'The description may not be greater than 255 characters.',
            	$e->validator->errors()->first('description')
        	);

        	return;
    	}

    	$this->fail('Max length should trigger a ValidationException');
	}

	function max_length_succeeds_when_under_max()//Validation should succeed when the fields are long enough according to max:255
	{
    	$url = 'http://';
    	$url .= str_repeat('a', 255 - strlen($url));

    	$data = [
        	'title' => str_repeat('a', 255),
        	'url' => $url,
        	'description' => str_repeat('a', 255),
    	];

    	$this->post('/submit', $data);

    	$this->assertDatabaseHas('links', $data);
	}
}