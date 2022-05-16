<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade;

class ScrapeDanTri extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:dantri';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    public $category = [
//        'suc-khoe.htm',    // id=1
        'the-gioi.htm',    // id=2
//        'suc-manh-so.htm', // id=3
//        'the-thao.htm',    // id=4
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach ($this->category as $category) {
            print ("Lấy bài viết của danh mục ".$category."\n");
            $l = env("DAN_TRI")."/".$category;

            $crawler = GoutteFacade::request('GET', $l);
            $linkPost = $crawler->filter('h3.article-title a')->each(function ($node) {
                return $node->attr("href");
            });

            foreach ($linkPost as $link) {
                $l = env("DAN TRI").$link;
                self::scarpePost($l);
            }
        }
    }

    public function scarpePost($url)
    {
        $crawler = GoutteFacade::request('GET', $url);
        $crawler2 = GoutteFacade::request('GET', $url);

        $title = $this->crawlData('h1.title-page', $crawler);

        $sub_title = $this->crawlData('h2.singular-sapo', $crawler);

        $sub_title = str_replace('(Dân trí) - ', '', $sub_title);

        $details = $this->crawlData('div.singular-content', $crawler);

        $title_image = $this->crawlData('figcaption', $crawler);

        $image = $this->crawlData2('.image img', $crawler2);
        $category_id = 2;
        $data = [
            'title' => $title,
            'sub_title' => $sub_title,
            'details' => $details,
            'image' => $image,
            'title_image' => $title_image,
            'category_id' => $category_id,
        ];

        Post::create($data);

        print ("Lấy dữ liệu thành công"."\n");
    }

    protected function crawlData(string $type, $crawler)
    {
        $result = $crawler->filter($type)->each(function ($node) {
            return $node->text();
        });

        if (!empty($result)) {
            return $result[0];
        }
        return '';


    }

    protected function crawlData2(string $type2, $crawler2)
    {
        $result2 = $crawler2->filter($type2)->each(function ($node) {
            return $node->attr("src");
        });

        if (!empty($result2)) {
            return $result2[0];
        }
        return '';

    }
}
