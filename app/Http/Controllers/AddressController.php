<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{

    /**
     * Set default rules
     */
    public function __construct()
    {
        $this->rules = [
            'client_id' => 'integer|required', 
            'address' => 'string|required'
        ];

        
        $this->updateRules = [
            'client_id' => 'integer|required_without:address',
            'address' => 'string|required_without:client_id'
        ];
    }
    /**
     * Return all the addresses.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAddresses()
    {
        return response(Address::select('id', 'address')->addSelect([
            'client' => Client::select('name')
                ->whereColumn('client_id', 'clients.id')
        ])->orderBy('client', 'asc')->get());
    }

    /**
     * Stlre an address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), $this->rules);

        if($validate->fails()) {
            return response([
                'messate' => $validate->errors()->all()
            ]);
        }
        
        return response(Address::create($request->all()));
    }

    /**
     * Return an address.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAddress($id)
    {
        return response(Address::all()->where('id', 2));
    }

    /**
     * Return an address per client
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function getAddressesPerClient($id)
    {
        return response(Address::all()->where('client_id', $id));
    }

    /**
     * Update an address.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $validate = Validator::make($request->all(), $this->updateRules);

        if($validate->fails()) {
            return response([
                'message' => $validate->errors()->all()
            ]);
        }

        return response($address->update($request->all()));
    }

    /**
     * Delete an address.
     *
     * @param  \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        return response($address->delete());
    }
}
