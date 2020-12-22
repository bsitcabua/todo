<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\PrimaryIdRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{

    public function validateRequest($request = null)
    {

        // print_r($request->validator->fails());die;
        try {

            if($request->validator){
                return [ 'response' => 201, 'validator' => $request->validator->errors()];
            }
            else{
                return null;
            }

        } catch(\Throwable $e) {
            throw $e;
        }
    }

    public function index()
    {
        try {
            
            $items = Item::orderBy('id', 'desc')->get();
            $response = [ 
                    'success'   => true, 
                    'data'      => [
                    'items' => $items
                ]
            ];

            return response()->json($response);

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function store(StoreItemRequest $request)
    {

        if($response = $this->validateRequest($request)){
            return response()->json($response);
        }

        try {

            $deadline = $request->deadline_date .' '. $request->deadline_time;
            
            $payload = [
                'name'          => strip_tags($request->name),
                'deadline'      => $deadline,
                'completion'    => $deadline,
                'is_completed'  => 0,
            ];

            $item = new Item($payload);

            if ($item->save()){
                $response = [
                    'success'       => true,
                    'success_msg'   => 'New item added successfully'
                ];
            }
            else $response = ['error_msg' => 'Item couldn\'t add'];

            return response()->json($response);

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function get(PrimaryIdRequest $request)
    {
        if($response = $this->validateRequest($request)){
            return response()->json($response);
        }

        try {

            $id = $request->id;

            $item = DB::table('items')->where('id', $id)->first();
            $response = [ 
                'success'   => true, 
                'data'      => [
                    'name'  => $item->name,
                    'deadline_date'  => date('Y-m-d', \strtotime($item->deadline)),
                    'deadline_time'  => date('H:i', \strtotime($item->deadline)),
                ]
            ];

        return response()->json($response);

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function update(UpdateItemRequest $request)
    {
        if($response = $this->validateRequest($request)){
            return response()->json($response);
        }

        try {

            $id = $request->id;

            $deadline = $request->deadline_date .' '. $request->deadline_time;

            $item = Item::find($id);

            // Continue saving
            $item->name         = strip_tags($request->name);
            $item->deadline     = strip_tags($deadline);
            
            if ($item->save()){
                $response = [
                    'success'       => true,
                    'success_msg'   => ['Todo updated successfully']
                ];
            }
            else $response = ['error_msg' => 'Todo couldn\'t update'];

            return response()->json($response);

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function destroy(PrimaryIdRequest $request)
    {
        if($response = $this->validateRequest($request)){
            return response()->json($response);
        }

        try {

            $id = $request->id;

            $item = Item::find($id);
            
            if($item){
                if($item->delete()){
                    $response = [
                        'success'       => true,
                        'success_msg'   => 'Todo deleted successfully'
                    ];
                }
            }
            else $response = ['error_msg' => 'Todo already deleted'];

            return response()->json($response);

        } catch (\Throwable $e) {
            throw $e;
        }
    }

    public function checking(PrimaryIdRequest $request)
    {
        if($response = $this->validateRequest($request)){
            return response()->json($response);
        }

        try {

            $id = $request->id;
            $is_checked = $request->is_checked;

            $item = Item::find($id);

            // Continue saving
            $item->is_completed  = $is_checked;
            $item->completion  = date('Y-m-d H:i:s');
            
            if ($item->save()){
                $response = [
                    'success'       => true,
                    'success_msg'   => ['Todo updated successfully']
                ];
            }
            else $response = ['error_msg' => 'Todo couldn\'t update'];

            return response()->json($response);

        } catch (\Throwable $e) {
            throw $e;
        }
    }
}
