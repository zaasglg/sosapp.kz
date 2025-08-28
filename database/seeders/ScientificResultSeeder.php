<?php

namespace Database\Seeders;

use App\Models\ScientificResult;
use Illuminate\Database\Seeder;

class ScientificResultSeeder extends Seeder
{
    public function run(): void
    {
        $results = [
            [
                'title' => 'Салауатты өмір салты шкаласы әлемнің 26 елінде қолданылады',
                'description' => '© nege.kz ақпараттық-сараптамалық порталында жарияланған мақала. Жобаның ғылыми нәтижелері туралы толық ақпарат берілген.',
                'type' => 'article',
                'source' => 'nege.kz',
                'url' => 'https://nege.kz/news/baglan-ermahanov-galim-kogamda-dene-tarbies-mamandarina-nemkurayli-karaydi-cc8263',
                'published_at' => '2024-03-15',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Жоба – келешектің стимулы',
                'description' => 'ZANMEDIA.KZ қоғамдық-саяси, құқықтық сайтында жарияланған мақала. Жобаның маңыздылығы мен болашақ перспективалары туралы.',
                'type' => 'article',
                'source' => 'ZANMEDIA.KZ',
                'url' => 'https://zanmedia.kz/zhoba-keleshektingn-stimuly/121795/',
                'published_at' => '2024-04-10',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Жоба – келешектің стимулы',
                'description' => 'QAZAQ UNI сайтында жарияланған мақала. Ғылыми жобаның қоғамдағы рөлі мен маңызы туралы кеңінен баяндалған.',
                'type' => 'article',
                'source' => 'QAZAQ UNI',
                'url' => 'https://qazaquni.kz/news/162761-zoba-kelesektin-stimuly',
                'published_at' => '2024-04-12',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Дене тәрбиесі мамандарына қатысты сұхбат',
                'description' => 'Жобаның жетекшісімен дене тәрбиесі саласындағы мамандардың рөлі туралы берілген сұхбат.',
                'type' => 'interview',
                'source' => 'Республикалық БАҚ',
                'published_at' => '2024-05-20',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Әлеуметтік желілердегі насихат',
                'description' => 'Жобаның нәтижелері әлеуметтік желілерде кеңінен насихатталды. Instagram, Facebook және басқа платформаларда белсенді жұмыс жүргізілді.',
                'type' => 'social_media',
                'source' => 'Әлеуметтік желілер',
                'published_at' => '2024-06-01',
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($results as $result) {
            ScientificResult::create($result);
        }
    }
}
