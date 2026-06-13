<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Filters\ClientFilter;

class ClientController extends Controller
{

    public function index(Request $request, ClientFilter $filter)
    {
        $clients = $filter->apply(
            Client::query(),
            $request->all()
        )->latest()->get();

        return Inertia::render('Clients/Index', [
            'clients' => $clients,
            'filters' => $request->all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Clients/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'number' => 'required'
        ]);

        Client::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'number' => $request->number,
            'adding_date' => now()
        ]);

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return Inertia::render('Clients/Edit', [
            'client' => $client
        ]);
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email',
            'number' => 'required'
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return back();
    }
}
