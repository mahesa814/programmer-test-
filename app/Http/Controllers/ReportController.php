<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $transaction = Transaction::with('nasabah')->select();
        if ($request->has('search')) {
            $id = $request->id;
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $reports = $transaction->where('id', 'like', '%' . $id . '%')->whereBetween('transaction_date', [$start_date, $end_date])->paginate(10);
            return view('report.index', compact('reports', 'id', 'start_date', 'end_date'));
        }
        $id = null;
        $start_date = Carbon::now()->firstOfMonth()->format('Y-m-d') ?? '';
        $end_date = Carbon::now()->format('Y-m-d') ?? '';
        $reports = $transaction->paginate(10);
        return view('report.index', compact('reports', 'id', 'start_date', 'end_date'));
    }


}
