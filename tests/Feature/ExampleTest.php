<?php

namespace Tests\Feature;

use App\Models\SMS;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{



    /** @test */

    public function unauthenticated_user_can_not_see_contacts_page()
    {
        
        $response = $this->post('/sms',['name' => 'amir',"number" => "091054644245" , "msg" => "askdh aishdia iakdnkasn kiasndnsidnaidn aidnai dnasi dnh"]);
        $smses = SMS::factory()->count(1000)->create();
        foreach ($smses as $sms) {
            $r = rand(1 , 5);
            $model=SMS::factory()->count(2)->create([
                "name" => $sms->name
            ]);
        }
        
    }

}

