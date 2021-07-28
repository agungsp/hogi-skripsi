<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Abbr;
use App\Helpers\Stemmer;

class DataSingkatan implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $newBatch = (Abbr::max('batch') ?? 0) + 1;
        foreach ($rows as $row)
        {
            $singkatan = Stemmer::getAbbr($row[0]);

            foreach ($singkatan as $word) {
                $hasWord = !empty(Abbr::where('word', $word)->first());
                if (!$hasWord) {
                    Abbr::create([
                        'word' => $word,
                        'mean' => $word,
                        'batch' => $newBatch
                    ]);
                }
            }
        }
    }
}
