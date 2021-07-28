<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataSingkatan;
use App\Models\Abbr;

class AbbrController extends Controller
{
    public function index()
    {
        return view('singkatan');
    }

    public function upload(Request $request)
    {
        ini_set('max_execution_time', 0);
        $request->validate([
            'excelFile' => ['required', 'file', 'mimes:xlsx']
        ]);

        Excel::import(new DataSingkatan, $request->excelFile);

        $lastBatch = Abbr::max('batch');
        $abbrs = Abbr::where('batch', $lastBatch)->get();

        return [
            'success' => true,
            'count' => $abbrs->count(),
            'html' => view('includes.singkatanListEditor', compact('abbrs'))->render()
        ];
    }

    public function edit(Request $request)
    {
        $isUses = $request->isUses;
        $words = $request->words;
        $means = $request->means;

        for ($i = 0; $i < count($words); $i++) {
            if ($words[$i] !== $means[$i]) {
                Abbr::where('word', $words[$i])
                    ->update([
                        'mean' => $means[$i] ?? ''
                    ]);
            }
        }

        $lastBatch = Abbr::max('batch');
        Abbr::where('batch', $lastBatch)->whereNotIn('word', $words)->delete();

        return redirect()->route('singkatan.index');
    }
}
