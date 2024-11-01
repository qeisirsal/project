<?php

namespace App\Http\Controllers;

use App\Models\PatientExpense;

class DashboardController extends Controller
{
    public function index()
    {
        $expenses = PatientExpense::with('patient')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard', compact('expenses'));
    }
}
