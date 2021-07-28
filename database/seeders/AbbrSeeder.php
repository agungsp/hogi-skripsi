<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Abbr;
use Illuminate\Support\Facades\DB;

class AbbrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Abbr::create([
                'word'  => 'yg',
                'mean'  => 'yang',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'trus',
                'mean'  => 'terus',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'ndrenges',
                'mean'  => 'mengabaikan',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'gk',
                'mean'  => 'gak',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'sgt',
                'mean'  => 'sangat',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'tdk',
                'mean'  => 'tidak',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'ngecer',
                'mean'  => 'mengecer',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'mcdonalds',
                'mean'  => 'McDonald\'s',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'mcdonald',
                'mean'  => 'McDonald\'s',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'ngiritnyasekelas',
                'mean'  => 'ngiritnya sekelas',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'mcd',
                'mean'  => 'McDonald\'s',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'tp',
                'mean'  => 'tapi',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'klo',
                'mean'  => 'kalau',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'drivetrhu',
                'mean'  => 'drive thru',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'ngga',
                'mean'  => 'nggak',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'ngasih',
                'mean'  => 'memberi',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'tpi',
                'mean'  => 'tapi',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'dg',
                'mean'  => 'dengan',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'g',
                'mean'  => 'gak',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'ngerti',
                'mean'  => 'mengerti',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'jg',
                'mean'  => 'juga',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'ngajak',
                'mean'  => 'mengajak',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'dpt',
                'mean'  => 'dapat',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'sblm',
                'mean'  => 'sebelum',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'skrg',
                'mean'  => 'sekarang',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'bwa',
                'mean'  => 'bawa',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'plg',
                'mean'  => 'pulang',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'klu',
                'mean'  => 'kalau',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'spd',
                'mean'  => 'sepeda',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'bgaimana',
                'mean'  => 'bagaimana',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'gpp',
                'mean'  => 'gak apa apa',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'khususnice',
                'mean'  => 'khususnya',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'drivethru',
                'mean'  => 'drive thru',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'n',
                'mean'  => 'dan',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'btw',
                'mean'  => 'ngomong ngomong',
                'batch' => 1,
            ]);

            Abbr::create([
                'word'  => 'dr',
                'mean'  => 'dari',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'spiker',
                'mean'  => 'pengeras suara',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'nyadar',
                'mean'  => 'sadar',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => '28rb',
                'mean'  => '28 ribu',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'trs',
                'mean'  => 'terus',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => '20rb',
                'mean'  => '20 ribu',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'ngobrol2',
                'mean'  => 'ngobrol ngobrol',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'dgn',
                'mean'  => 'dengan',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'proses',
                'mean'  => 'proses',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'speed',
                'mean'  => 'kecepatan',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'through',
                'mean'  => 'melalui',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'jd',
                'mean'  => 'jadi',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'cm',
                'mean'  => 'cuma',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'dpn',
                'mean'  => 'depan',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'blas',
                'mean'  => 'sama sekali',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'dtg',
                'mean'  => 'datang',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'tgn',
                'mean'  => 'tangan',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'ngerjain',
                'mean'  => 'mengerjakan',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'lgsg',
                'mean'  => 'langsung',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'bsetiap',
                'mean'  => 'setiap',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'qt',
                'mean'  => 'kita',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'drmh',
                'mean'  => 'di rumah',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'pk',
                'mean'  => 'pakai',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'nyarikan',
                'mean'  => 'mencarikan',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'cz',
                'mean'  => 'karena',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'sby',
                'mean'  => 'surabaya',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'prefer',
                'mean'  => 'lebih suka',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'ngaturnya',
                'mean'  => 'mengaturnya',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'mbakya',
                'mean'  => 'mbaknya',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'blg',
                'mean'  => 'bilang',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'bnbvkyoknoukihn',
                'mean'  => '',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'nbkknm',
                'mean'  => '',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'k',
                'mean'  => 'ke',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'lkllilkiluylolillbpjbnb',
                'mean'  => '',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'nyamanparkiran',
                'mean'  => 'nyaman parkiran',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'lg',
                'mean'  => 'lagi',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'nyoba',
                'mean'  => 'mencoba',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'kl',
                'mean'  => 'kalau',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'mlm',
                'mean'  => 'malam',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'nyamukice',
                'mean'  => 'nyamuknya',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'bs',
                'mean'  => 'bisa',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'sdh',
                'mean'  => 'sudah',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'sdg',
                'mean'  => 'sedang',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'ttp',
                'mean'  => 'tetap',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'nyantai',
                'mean'  => 'santai',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'nyamanada',
                'mean'  => 'nyaman ada',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'cmn',
                'mean'  => 'cuma',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'q',
                'mean'  => 'aq',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => '1jm',
                'mean'  => '1 jam',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'mkn',
                'mean'  => 'makan',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'pdahal',
                'mean'  => 'padahal',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'pramusaji',
                'mean'  => 'pramu saji',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'grg',
                'mean'  => 'goreng',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'bgt',
                'mean'  => 'banget',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'srta',
                'mean'  => 'serta',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'dn',
                'mean'  => 'dan',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'playananx',
                'mean'  => 'pelayanannya',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'cpt',
                'mean'  => 'cepat',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'stg',
                'mean'  => 'setangah',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'khusus',
                'mean'  => 'khusus',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'staff',
                'mean'  => 'staff',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'nyobain',
                'mean'  => 'mencoba',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'dpnnya',
                'mean'  => 'depannya',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'msh',
                'mean'  => 'masih',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'sprt',
                'mean'  => 'seperti',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'kranya',
                'mean'  => 'krannya',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'nyamuknyaaa',
                'mean'  => 'nyamuknya',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'mcdmakyuzzz',
                'mean'  => 'McDonald\'s enak',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'jgn',
                'mean'  => 'jangan',
                'batch' => 2,
            ]);

            Abbr::create([
                'word'  => 'msk',
                'mean'  => 'masuk',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'hs',
                'mean'  => 'hand sanitizer',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'two',
                'mean'  => 'dua',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'thumbs',
                'mean'  => 'jempol',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'lgi',
                'mean'  => 'lagi',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'mskpn',
                'mean'  => 'meskipun',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'skalimau',
                'mean'  => 'sekali mau',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'pgawai',
                'mean'  => 'pegawai',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'mnyemprotkan',
                'mean'  => 'menyemprotkan',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'ngatur',
                'mean'  => 'mengatur',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'ksehatannya',
                'mean'  => 'kesehatannya',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'pgawainya',
                'mean'  => 'pegawainya',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'ngebentak',
                'mean'  => 'membentak',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'mls',
                'mean'  => 'malas',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'sy',
                'mean'  => 'saya',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'ndang',
                'mean'  => 'segera',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'd',
                'mean'  => 'di',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'ttg',
                'mean'  => 'tentang',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'ndak',
                'mean'  => 'tidak',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'skg',
                'mean'  => 'sekarang',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => '2021tempat',
                'mean'  => '2021 tempat',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'pke',
                'mean'  => 'pakai',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'nyampah',
                'mean'  => 'sampah',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'ngumpul',
                'mean'  => 'berkumpul',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'mcdonals',
                'mean'  => 'McDonald\'s',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'protokal',
                'mean'  => 'protokol',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'mbk',
                'mean'  => 'mbak',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'slalu',
                'mean'  => 'selalu',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'nyamansayang',
                'mean'  => 'nyaman sayang',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 't4',
                'mean'  => 'tempat',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'drive',
                'mean'  => 'drive',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'thru',
                'mean'  => 'thru',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'plastic',
                'mean'  => 'plastik',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'tmpt',
                'mean'  => 'tempat',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'njajal',
                'mean'  => 'mencoba',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'hny',
                'mean'  => 'hanya',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'trll',
                'mean'  => 'terlalu',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'krn',
                'mean'  => 'karena',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'mba',
                'mean'  => 'mbak',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'trampil',
                'mean'  => 'terampil',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'ngangenin',
                'mean'  => 'kangen',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'dlceksuhu',
                'mean'  => 'dulu cek suhu',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'jgbagus',
                'mean'  => 'juga bagus',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'ngerasa',
                'mean'  => 'merasa',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'standby',
                'mean'  => 'siaga',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'breakfast',
                'mean'  => 'sarapan',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'ngebuat',
                'mean'  => 'membuat',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'smt',
                'mean'  => 'semester',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'bgtu',
                'mean'  => 'begitu',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => '19pintu',
                'mean'  => '19 pintu',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => '2hr',
                'mean'  => '2 hari',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'thank',
                'mean'  => 'terima kasih',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'shopping',
                'mean'  => 'berbelanja',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'kbetulan',
                'mean'  => 'kebetulan',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'skalian',
                'mean'  => 'sekalian',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'brubah',
                'mean'  => 'berubah',
                'batch' => 3,
            ]);

            Abbr::create([
                'word'  => 'true',
                'mean'  => 'thru',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'ngobrol',
                'mean'  => 'ngobrol',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'nya',
                'mean'  => 'nya',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'dsb',
                'mean'  => 'dan sebagainya',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'thrue',
                'mean'  => 'thru',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'small',
                'mean'  => 'kecil',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'thigh',
                'mean'  => 'paha',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'promo2',
                'mean'  => 'promo promo',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'ngak',
                'mean'  => 'tidak',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'dharmo',
                'mean'  => 'darmo',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'nggowes',
                'mean'  => 'bersepeda',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'nggak',
                'mean'  => 'tidak',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'nggu',
                'mean'  => 'menunggu',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'grabfood',
                'mean'  => 'grab food',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'gtw',
                'mean'  => 'tidak tahu',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'sbg',
                'mean'  => 'sebagai',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'lt',
                'mean'  => 'lantai',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'ksh',
                'mean'  => 'kasih',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'jln',
                'mean'  => 'jalan',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'crowded',
                'mean'  => 'ramai',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'kyk',
                'mean'  => 'seperti',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'pdhl',
                'mean'  => 'padahal',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'nyiapi',
                'mean'  => 'menyiapkan',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'kresekjadi',
                'mean'  => 'kresek jadi',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'cs',
                'mean'  => 'pelanggan',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'shopee',
                'mean'  => 'shopee',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'cream',
                'mean'  => 'cream',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'dsini',
                'mean'  => 'disini',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'bgtati',
                'mean'  => 'banget ati',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'tmpat',
                'mean'  => 'tempat',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'trima',
                'mean'  => 'terima',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'place',
                'mean'  => 'tempat',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'strategic',
                'mean'  => 'strategis',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'blom',
                'mean'  => 'belum',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'sdikit',
                'mean'  => 'sedikit',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'thrupas',
                'mean'  => 'thru pas',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'ntah',
                'mean'  => 'entah',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'drivetru',
                'mean'  => 'drive thru',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'sma',
                'mean'  => 'sama',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'ngerjakan',
                'mean'  => 'mengerjakan',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'rb',
                'mean'  => 'ribu',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'sm',
                'mean'  => 'sama',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'dll',
                'mean'  => 'dan lain lain',
                'batch' => 4,
            ]);

            Abbr::create([
                'word'  => 'trouble',
                'mean'  => 'gangguan',
                'batch' => 4,
            ]);
        });
    }
}
