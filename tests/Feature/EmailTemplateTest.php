<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\EmailTemplate;

class EmailTemplateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testParseContent()
    {
        $template = new EmailTemplate;
        $template->content = "Hi {{firstname}} {{lastname}}";

        $data = [
             'firstname' => 'John',
             'lastname'  => 'Doe'
         ];

        $parsed = $template->parse($data);
        $this->assertEquals('Hi John Doe', $parsed);
    }

    // public function testNonExistentShortCode()
    // {
    //     $template          = new EmailTemplate;
    //     $template->id      = 1;
    //     $template->content = "Hi {{nonExistentVariable}}";
    //     $data              = [];
    //
    //     $this->setExpectedException(Exception::class, 'Shortcode {{nonExistentVariable}} not found in template id 1');
    //     $parsed = $template->parse($data);
    // }
}
