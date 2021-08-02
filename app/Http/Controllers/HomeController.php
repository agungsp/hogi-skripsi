<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\NaiveBayes;
use App\Helpers\Translate;
use App\Imports\DataTraining;
use App\Imports\DataUji;
use App\Models\FullTextClass;
use App\Models\Abbr;
use Illuminate\Support\Facades\Cache;
use App\Helpers\Stemmer;
use App\Rules\minWords;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct() {
        if (!Cache::has('abbrs')) {
            $abbrs = Abbr::all();
            Cache::put('abbrs', $abbrs, now()->addYear());
        }
        ini_set('max_execution_time', 0);
    }

    public function index(Request $request)
    {
        $classifiedSummary = FullTextClass::groupBy(['filename', 'class'])
                             ->select(['filename', 'class', DB::raw('count(`class`) as `count`')])
                             ->get()
                             ->groupBy('filename');
        return view('home', compact('classifiedSummary'));
    }

    public function inputDataTraining(Request $request)
    {
        $request->validate([
            'dataTraining' => ['required', 'file', 'mimes:xlsx']
        ]);

        $filename = pathinfo($request->dataTraining->getClientOriginalName(), PATHINFO_FILENAME);

        FullTextClass::truncate();

        Excel::import(new DataTraining($filename), $request->dataTraining);

        return redirect()->back();
    }

    public function inputText(Request $request)
    {
        $request->validate([
            'dataUji' => ['required', 'file', 'mimes:xlsx']
        ]);

        $filename = pathinfo($request->dataUji->getClientOriginalName(), PATHINFO_FILENAME);

        Excel::import(new DataUji($filename), $request->dataUji);

        return redirect()->route('home.index');
    }

    public function classifiedWords(Request $request)
    {
        $maxData = 10;
        $lastId = $request->lastId;
        if ($request->order == 'desc' && $request->lastId == 0) {
            $lastId = FullTextClass::latest()->first()->id ?? -1 + 1;
        }

        $operator = '>';
        if ($request->order == 'desc') {
            $operator = '<';
        }

        $dateStart = Carbon::create($request->dateStart);
        $dateEnd = Carbon::create($request->dateEnd)->addDay();

        $query = FullTextClass::where('created_at', '>=', $dateStart)
                              ->where('created_at', '<', $dateEnd)
                              ->where('id', $operator, $lastId)
                              ->limit($maxData)
                              ->orderBy('created_at', $request->order);

        $total = $query->count();
        $classifiedWords = $query->get();
        $html = view('includes.classifiedWords', ['rows' => $classifiedWords])->render();
        $lastId = $classifiedWords->last()->id ?? 0;
        $hasNext = intVal($request->showed) < $total;
        return compact('html', 'lastId', 'hasNext');
    }
}
