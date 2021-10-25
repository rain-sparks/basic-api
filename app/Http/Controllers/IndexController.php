<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;


class IndexController extends Controller
{

    /**
     * Test API Connected
     *
     * @param null
     * @return json
     *      string status
     */

    public function index(request $request)
    {
        //save input given key and value in body(json)

        $input =json_decode($request->getContent(), true);
        
        if(!empty($input)){
            foreach($input as $key => $value) {
                $key = trim($key);
                $value = trim($value);
                if(!empty($key) && !empty($value)){
                    $find_key = Table::where('key',$key)->first();
                    if($find_key){
                        //if key exists, update value and timestamp
                        $find_key->value = $value;
                        $find_key->timestamp = date('Y-m-d H:i:s');
                        $find_key->save();
                    }
                    else{
                        //insert new entry
                        $table = new Table();
                        $table->key = $key;
                        $table->value = $value;
                        $table->timestamp = date('Y-m-d H:i:s');
                        $table->save();
                    }
                }
            }
            
            return response()->json([
                    'status' => 'Successfully saved changes!',
            ]);
        }            
    }
    public function getValue(request $request, $key){
        // get value based on key
        if($key <> 'get_all_records') {
        $find_key = Table::where('key',$key)->first();
            if($find_key){
                if(!empty($request->all())){
                    // get value based on key and timestamp; unix timestamp
                    $time = array_keys($request->all())[0]; //first parameter
                    $converted_time = date('Y-m-d H:i:s', $time / 1000 );
                    $find_key_time = Table::where('key',$key)->where('timestamp',$converted_time)->first();
                    if($find_key_time){
                        return response()->json([
                            'Value is:' => $find_key_time->value,
                        ]);
                    }
                }
                return response()->json([
                    'Value is:' =>  $find_key->value,
                ]);
            }
        }
    }
    public function getAll(){
        // get all records
        $all = Table::get();
        $all->toArray();
        return response()->json([
            'all_records' => $all,
        ]);
    }
}