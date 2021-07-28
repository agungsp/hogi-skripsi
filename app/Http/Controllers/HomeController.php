<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\NaiveBayes;
use App\Helpers\Translate;
use App\Imports\DataTraining;
use App\Models\FullTextClass;
use App\Models\Abbr;
use Illuminate\Support\Facades\Cache;
use App\Helpers\Stemmer;
use App\Rules\minWords;
use Carbon\Carbon;

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
        return view('home');
    }

    public function inputDataTraining(Request $request)
    {
        $request->validate([
            'dataTraining' => ['required', 'file', 'mimes:xlsx']
        ]);

        FullTextClass::truncate();

        Excel::import(new DataTraining, $request->dataTraining);

        return redirect()->back();
    }

    public function inputText(Request $request)
    {
        $request->validate([
            'textArea' => [new minWords(3)]
        ]);

        $dataTraining = FullTextClass::all()->toArray();
        $naiveBayes = new NaiveBayes();
        $naiveBayes->setClass(['positif', 'negatif']);
        $naiveBayes->training($dataTraining);
        $normalizeText = Stemmer::normalize($request->textArea);
        $predict = $naiveBayes->predict($normalizeText);
        FullTextClass::create([
            'text' => $normalizeText,
            'class' => $predict
        ]);

        return redirect()->route('home.index')->with('isNewImput', true);
        // return view('home', compact('predict'));
    }

    public function classifiedWords(Request $request)
    {
        $maxData = 10;
        $lastId = $request->lastId;
        if ($request->order == 'desc' && $request->lastId == 0) {
            $lastId = FullTextClass::latest()->first()->id + 1;
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
