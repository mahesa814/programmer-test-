<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabahs = Nasabah::paginate(10);
        return view('nasabah.index', compact('nasabahs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);
        DB::beginTransaction();
        try {
            //code...
            Nasabah::create([
                'name' => $request->name,
            ]);
            DB::commit();
            return back()->with('success', 'berhasil menambahkan nasbaah');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('success', 'gagal menambahkan nasbaah karena' . $e->getMessage());
        }
    }
}
