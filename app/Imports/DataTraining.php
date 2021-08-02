<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\FullTextClass;
use App\Helpers\Stemmer;

class DataTraining implements ToCollection
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
        foreach ($rows as $row)
        {
            $normalize = Stemmer::normalize($row[0]);
            FullTextClass::create([
                'text' => $normalize,
                'class' => $row[1],
                'filename' => $this->filename
            ]);
        }
    }
}
