<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use Illuminate\Http\Request;

class ChartOfAccountController extends Controller
{
    public function index(Request $request)
    {
        $group = $request->get('group');

        $query = ChartOfAccount::query();

        // Filter berdasarkan dropdown
        if ($group == 'A') {
            $query->whereBetween('code', [1000, 1999]);
        } elseif ($group == 'B') {
            $query->whereBetween('code', [2000, 2999]);
        } elseif ($group == 'C') {
            $query->whereBetween('code', [3000, 3999]);
        } elseif ($group == 'D') {
            $query->whereBetween('code', [4000, 4999]);
        } elseif ($group == 'E') {
            $query->whereBetween('code', [5000, 5999]);
        }

        $accounts = $query->orderBy('code')->get();

        return view('chartofaccounts.index', compact('accounts', 'group'));
    }

    public function create()
    {
        return view('chartofaccounts.create');
    }

    public function store(Request $request)
    {
        ChartOfAccount::create($request->all());
        return redirect()->route('chart-of-accounts.index');
    }

    public function show(ChartOfAccount $chartOfAccount)
    {
        return view('chartofaccounts.show', compact('chartOfAccount'));
    }

    public function edit(ChartOfAccount $chartOfAccount)
    {
        return view('chartofaccounts.edit', compact('chartOfAccount'));
    }

    public function update(Request $request, ChartOfAccount $chartOfAccount)
    {
        $chartOfAccount->update($request->all());
        return redirect()->route('chart-of-accounts.index');
    }

    public function destroy(ChartOfAccount $chartOfAccount)
    {
        $chartOfAccount->delete();
        return redirect()->route('chart-of-accounts.index');
    }
}
