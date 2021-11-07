<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnderecoRequest;
use App\Models\Address;
use App\Models\Endereco;
use Exception;


class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $addresses = Address::all();

            return response()->json($addresses);
        } catch (Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnderecoRequest $request)
    {
        try {
            Address::create($request->validated());

            return response()->json(['msg' => 'Address created successfully'], 201);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEnderecoRequest $request, Address $address, $id)
    {
        try {
            $address = Address::findOrFail($id);
            $address->update($request->validated());

            return response()->json(['msg' => 'Address updated successfully']);
        } catch (Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        try {
            $address->delete();

            return response()->json(['msg' => 'Address deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }
}
