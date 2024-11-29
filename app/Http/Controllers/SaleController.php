<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Client;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::all();
        $branches = Branch::all();
        $clients = Client::all();
        return view('layouts.admin.sales', compact(['sales', 'branches', 'clients']));
    }

    public function salesBranch(Request $request)
    {
        $request->validate([
            "branch_id" => ["required"]
        ]);

        $branch = Branch::findOrFail($request->branch_id);

        $sales = Sale::join('sale_stocks', 'sale_stocks.sale_id', '=', 'sales.id')
                    ->join('stocks', 'stocks.id', '=', 'sale_stocks.stock_id')
                    ->join('branches', 'branches.id', '=', 'stocks.branch_id')
                    ->join('payments', 'payments.id', '=', 'sales.payment_id')
                    ->join('clients', 'clients.id', '=', 'sales.client_id')
                    ->join('users', 'users.id', '=', 'clients.user_id')
                    ->where('branches.id', '=', $request->branch_id)
                    ->get(['sales.*', 'sale_stocks.id as sale_stock_id', 'stocks.id as stock_id', 'branches.id as branch_id', 'payments.amount as amount', "users.*"]);

        return view('layouts.admin.sales.branch', compact(['sales', 'branch']));
    }


    public function salesClient(Request $request)
    {
        $request->validate([
            "client_id" => ["required"]
        ]);

        $client = Client::findOrFail($request->client_id);
        $sales = Sale::where('client_id', '=', $client->id)->get();

        return view('layouts.admin.sales.client', compact(['sales', 'client']));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sale = Sale::findOrFail($id);

        return view('layouts.admin.sales.sale', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
