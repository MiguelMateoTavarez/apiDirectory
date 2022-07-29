<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{

    /**
     * Set default rules
     */
    public function __construct()
    {
        $this->rules = [
            'name' => 'string|required', 
        ];
    }

    /**
     * Return all the clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClients()
    {
        return response(Client::select('id', 'name')->orderBy('name', 'asc')->get());
    }

    /**
     * Store a client.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), $this->rules);

        if($validate->fails()) {
            return response([
                'message' => $validate->errors()->all()
            ]);
        }

        return response(Client::create($request->all()));
    }

    /**
     * Return a client.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getClient($id)
    {
        return response(Client::all()->where('id', $id));
    }

    /**
     * Update a client.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validate = Validator::make($request->all(), $this->rules);

        if($validate->fails()) {
            return response([
                'message' => $validate->errors()->all()
            ]);
        }

        return response($client->update($request->all()));
    }

    /**
     * Delete a client.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        return response($client->delete());
    }
}
