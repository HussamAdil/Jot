<?php

namespace Tests\Feature;

use App\Contact;
use Carbon\Carbon;
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

        $this->assertEquals('05/10/2019' , $contact->birthday->format('m/d/Y'));

        $this->assertEquals('ABC COMPANY' , $contact->company);
                
   }

      /**  @test */


   public function fields_are_required()
   {
    collect(['name' , 'email' , 'birthday','company'])

    ->each(function($field){

        $response = $this->post('/api/contacts' , array_merge($this->data() , [$field => '']));

        $response->assertSessionHasErrors($field);

        $this->assertCount(0 , Contact::all());

    }); 
}
   /**  @test */
   public function email_must_be_a_valid_email()
   {
       
    $response = $this->post('/api/contacts' , array_merge(  $this->data(),['email' => 'not an email']));

    $response->assertSessionHasErrors('email');

    $this->assertCount(0 , Contact::all());

   }

     /**  @test */

     public function birthdays_are_properly_stored()
     {

        $response = $this->post('/api/contacts' ,   $this->data() );

        $this->assertCount(1 , Contact::all());

        $this->assertInstanceOf(Carbon::class , Contact::first()->birthday);

        $this->assertEquals('05-10-2019' , Contact::first()->birthday->format('m-d-Y') );

     }

     /** @test */

    public function a_contact_can_be_retrieved()
    {
        $contact = factory(Contact::class)->create();
        
        $response = $this->get('/api/contacts/'.$contact->id);
        
        $response->assertJson([
            'name'       => $contact->name ,
            'email'      => $contact->email,
            'birthday'   => $contact->birthday ,
            'company'    => $contact->company,
        ]);
    }
    /** @test */

    public function a_contact_can_be_patched()
    {

        $contact = factory(Contact::class)->create();

        $response = $this->patch('/api/contacts/'.$contact->id , $this->data() );

        $contact = $contact->fresh();

        $this->assertEquals('Test Name' , $contact->name);

        $this->assertEquals('email@me.com' , $contact->email);

        $this->assertEquals('05/10/2019' , $contact->birthday->format('m/d/Y'));

        $this->assertEquals('ABC COMPANY' , $contact->company);

    }

   private function data()
   {
       return   
            ['name' => 'Test Name',
            'email' => 'email@me.com' ,
            'birthday' => '05/10/2019' ,
            'company' => 'ABC COMPANY']
            ;
   }

}