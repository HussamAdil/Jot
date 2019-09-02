<?php

namespace Tests\Feature;

use App\Contact;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactsTest extends TestCase
{

    use RefreshDatabase;

   /**  @test */

   public function a_contact_can_be_added()
   {
       $this->withoutExceptionHandling();

        $this->post('/api/contacts',
                        ['name' => 'Test Name',
                        'email' => 'email@me.com' ,
                        'birthday' => '05/10/2019' ,
                        'company' => 'ABC COMPANY']
                    );
        $contact = Contact::first();            

        $this->assertEquals('Test Name' , $contact->name);

        $this->assertEquals('email@me.com' , $contact->email);

        $this->assertEquals('05/10/2019' , $contact->birthday);

        $this->assertEquals('ABC COMPANY' , $contact->company);

                
   }

   /** @test */

   public function a_name_is_required()
   {
    
    $response =  $this->post('/api/contacts',
                        ['email' => 'email@me.com' ,
                        'birthday' => '05/10/2019' ,
                        'company' => 'ABC COMPANY']
                    );
        $response->assertSessionHasErrors('name') ;
        
        $this->assertCount(0 , Contact::all());
   }

      /** @test */

      public function a_email_is_required()
      {
       
       $response =  $this->post('/api/contacts',
                           ['name' =>  'Test Name' ,
                           'birthday' => '05/10/2019' ,
                           'company' => 'ABC COMPANY']
                       );
           $response->assertSessionHasErrors('email') ;
           
           $this->assertCount(0 , Contact::all());
      }
}
