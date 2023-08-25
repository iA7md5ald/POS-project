<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{

    public function index(Request $request)
    {

        $clients = Client::when($request->search , function ($q) use($request){
            return $q->where('name' , 'like' , '%' . $request->search . '%')
                ->orWhere('phone' , 'like' , '%' . $request->search . '%')
                ->orWhere('address' , 'like' , '%'. $request->search . '%');
        })->paginate(5);

        return view('dashboard.clients.index', compact('clients'));

    }// end of index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.clients.create');
    }// end of create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required|unique:clients,phone',
            'phone.0'=>'required',
            'address'=>'required',
        ]);

        Client::create($request->all());
        session()->flash('success' , __('site.added_successfully'));
        return redirect()->route('dashboard.clients.index');

    }// end of store

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('dashboard.clients.edit' , compact('client'));
    }// end of edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>['required' , Rule::unique('clients' , 'phone')->ignore($client->id , 'id')],
            'phone.0'=>'required',
            'address'=>'required',
        ]);

        $client->update($request->all());
        session()->flash('success', __('site_updated_successfully'));
        return redirect()->route('dashboard.clients.index');

    }// end of update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('dashboard.clients.index');
    }// end of destroy
}// end of controller
