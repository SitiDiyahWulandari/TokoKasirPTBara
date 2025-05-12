<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $sales = Sale::where('user_id', Auth::id())->latest()->get();
        return view('history.index', compact('sales'));
    }

    public function show(Sale $sale)
    {
        $this->authorize('view', $sale);
        return view('history.show', compact('sale'));
    }
}