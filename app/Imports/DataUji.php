<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Helpers\NaiveBayes;
use App\Models\FullTextClass;
use App\Helpers\Stemmer;

class DataUji implements ToCollection
{

    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $naiveBayes = new NaiveBayes();
        $naiveBayes->setClass(['positif', 'negatif']);
        foreach ($rows as $row) {
            $dataTraining = FullTextClass::all()->toArray();
            $naiveBayes->training($dataTraining);
            $normalizeText = Stemmer::normalize($row[0]);
            $predict = $naiveBayes->predict($normalizeText);
            FullTextClass::create([
                'text' => $normalizeText,
                'class' => $predict,
                'filename' => $this->filename
            ]);
        }
    }
}
