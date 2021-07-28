<?php

namespace App\Helpers;

use Sastrawi\Stemmer\StemmerFactory;
use Illuminate\Support\Facades\Cache;
use App\Helpers\Translate;

class Stemmer
{
    /**
     * Stemmer factory.
     *
     * @var StemmerFactory
     */
    protected $stemmerFactory;

    /**
     * Stemmer object.
     *
     * @var StemmerFactory
     */
    protected $stemmer;

    /**
     * Stemmed words.
     *
     * @var array
     */
    protected $words;

    /**
     * Constructor.
     *
     * @param void
     * @return void
     */
    public function __construct()
    {
        $this->stemmerFactory = new StemmerFactory();
        $this->stemmer = $this->stemmerFactory->createStemmer();
    }

    /**
     * Stemming process.
     *
     * @param string $text
     * @return string
     */
    public function stem(string $text)
    {
        $stemmed = $this->stemmer->stem($text);
        $words = explode(' ', $stemmed);
        foreach ($words as $word) {
            $this->words[] = $word;
        }

        return $stemmed;
    }

    /**
     * Get all words.
     *
     * @param void
     * @return array
     */
    public function getWords()
    {
        $unique = array_unique($this->words);
        $this->words = array_values($unique);
        return $this->words;
    }


    /**
     *
     */
    public static function getAbbr($words, $fullText = false)
    {
        $singkatan = [];
        $vocalChar = ['a', 'i', 'u', 'e', 'o'];
        $words = strtolower(preg_replace('/[^\p{L}\p{N}\s]/u', '', $words));
        $words = collect(explode(' ', $words));
        $words = $words->filter();
        if ($fullText) {
            return $words;
        }

        $words = $words->filter()->values()
                       ->filter(function ($value, $key) use ($vocalChar) {
                           return (!in_array($value[0], $vocalChar) && !isset($value[1])) ||
                               (!in_array($value[0], $vocalChar) && !in_array($value[1], $vocalChar));
                       })->values()
                       ->unique()->values();
        return $words;
    }

    public static function normalize($words)
    {
        $abbrs = Cache::get('abbrs');
        $normalize = static::getAbbr($words, true);
        $fixedWords = collect();
        foreach ($normalize as $word) {
            $abbr = $abbrs->firstWhere('word', $word);
            $fixedWords->push($abbr->mean ?? $word);
        }

        $enCheck = json_decode(Translate::getTranslate('en', 'id', $fixedWords->join(' ')), true)['sentences']['0']['trans'] ?? $fixedWords->join(' ');
        $spellCheck = json_decode(Translate::getTranslate('id', 'id', $enCheck), true)['spell']['spell_res'] ?? $enCheck;

        return $spellCheck;
    }
}
