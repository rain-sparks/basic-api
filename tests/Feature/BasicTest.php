<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Table;
use Illuminate\Http\Request;
use Input;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_add_update()
    {
        $data = [
            'test7' => 'Test 7'
        ];
        $create = 0;

        $this->withoutExceptionHandling();
        foreach($data as $key => $value){
            $find_key = Table::where('key',$key)->first();
            if($find_key){
                //if key exists, update value and timestamp
                $find_key->value = $value;
                $find_key->timestamp = date('Y-m-d H:i:s');
                $find_key->save();
            }
            else{
                $create = 1;
            }
        }
        
        $response = $this->json('POST', '/api', $data);
        $this->assertNotNull($response);
        $this->assertEquals(200, $response->status());
        
        if($create == 1)
            $this->assertTrue(count(Table::all()) > 1);
    }

    public function test_retrieve_by_key()
    {   
        $key = 'test7';

        $this->withoutExceptionHandling();
        $response = $this->get('/api/'.$key);
        $this->assertNotNull($response);
        $this->assertEquals(200, $response->status());

    }

    public function test_retrieve_by_key_timestamp()
    {
        $key = 'test7';
        $timestamp = '1635771175';

        $this->withoutExceptionHandling();
        $response = $this->get('/api/'.$key, [
            'timestamp' => $timestamp
        ]);
        $this->assertNotNull($response);
        $this->assertEquals(200, $response->status());

    }
 
    public function test_get_all()
    {
        $this->withoutExceptionHandling();
        $response = $this->json('GET', '/api/get_all_records');
        $this->assertNotNull($response);
        $this->assertEquals(200, $response->status());

    }
    

}
