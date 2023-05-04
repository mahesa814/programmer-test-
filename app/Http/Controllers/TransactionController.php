<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::orderBy('id', 'DESC')->paginate(10);
        $nasabah = Nasabah::get();
        return view('transaction.index', compact('transactions', 'nasabah'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'transaction_date' => ['required'],
            'description' => ['required'],
            'debit_credit_status' => ['required'],
            'amount' => ['required']
        ]);
        $amount = (int) $request->amount;
        DB::beginTransaction();
        try {
            Transaction::create([
                'nasabah_id' => $request->nasabah_id,
                'transaction_date' => $request->transaction_date,
                'description' => $request->description,
                'debit_credit_status' => $request->debit_credit_status,
                'amount' => (int) $amount
            ]);
            DB::commit();
            return back()->with('success', 'berhasil menambahkan transaction');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('success', 'gagal menambahkan transaction' . $e->getMessage());

        }
    }

    public function getPoints()
    {

        $points = DB::table('transactions')
            ->select('nasabah.id', 'nasabah.name', 'amount', DB::raw('CASE
                    WHEN description = "Beli Pulsa" THEN
                        CASE
                            WHEN amount <= 10000 THEN 0
                            WHEN amount <= 30000 THEN FLOOR((amount - 10000) / 1000)
                            ELSE FLOOR((amount - 30000) / 1000) * 2 + 20
                        END
                    WHEN description = "Bayar Listrik" THEN
                        CASE
                            WHEN amount <= 50000 THEN 0
                            WHEN amount <= 100000 THEN FLOOR((amount - 50000) / 2000)
                            ELSE FLOOR((amount - 100000) / 2000) * 2 + 25
                        END
                END as point'))
            ->join('nasabahs as nasabah', 'transactions.nasabah_id', '=', 'nasabah.id')
            ->get();
        return view('point.index', compact('points'));
    }
}
