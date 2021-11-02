<?php

namespace Tests\Feature;

use App\Mail\SendEmailAdmin;
use App\Mail\SendEmailCustomer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SendEmailInquiryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_send_email_inquiry()
    {
        $param = (object) [
            'subject' => "Thank you for inquiry",
            'contact_person'=>'test email', 
            'link_inquiry' => 'link_inquiry'
        ];
        $mailable = new SendEmailCustomer($param);
 
        $mailable->assertSeeInHtml('Unique Jewelry');
    }

    public function test_send_email_admin()
    {
        $param = (object) [
            'subject' => "A new inquiry received",
            'link_inquiry' => 'link_inquiry',
            'email'=>'test@mailinator.com',
            'min_order' => '10',
            'type' => 'ring'
        ];
        $mailable = new SendEmailAdmin($param);
 

        $mailable->assertSeeInHtml('minimum order');
    }
}
