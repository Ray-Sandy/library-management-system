<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historyBorrow = DB::select("
            SELECT 
                h.id, 
                u.name AS user_name, 
                s.title AS book_title, 
                h.borrowed_at, 
                h.returned_at, 
                h.status
            FROM history h
            JOIN users u ON h.user_id = u.id
            JOIN stocks s ON h.stock_id = s.id
            ORDER BY h.updated_at DESC
        ");
        
        $historyAccount = DB::select("
        SELECT id, name, email, role, created_at, updated_at 
        FROM users 
        ORDER BY updated_at DESC
        ");
        
        $historyStok = DB::select("
        SELECT id, title, author, publisher, isbn, stock, created_at, updated_at 
        FROM stocks 
        ORDER BY updated_at DESC
        ");
        
        return view('page.admin.history.history', compact('historyBorrow', 'historyAccount', 'historyStok'));
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
        //
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
