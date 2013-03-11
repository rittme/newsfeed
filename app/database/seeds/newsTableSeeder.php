<?php 

class NewsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('news')->delete();

        News::create(array(
            'name' => 'Builders interviews',
            'url'  => 'http://www.webuildatnight.com/',
            'category' => 'news',
            'user_id' => 1
        ));
        News::create(array(
            'name' => 'Hacker newss extension',
            'url'  => 'http://blog.tommoor.com/post/45072871249/hacker-new',
            'category' => 'news',
            'user_id' => 1
        ));
        News::create(array(
            'name' => 'Seattle Bar That Banned Google Glasses Admits It Was a PR Stunt',
            'url'  => 'http://www.forbes.com/sites/kellyclay/2013/03/10/seattle-bar-that-banned-google-glasses-admits-it-was-a-pr-stunt/',
            'category' => 'news',
            'user_id' => 1
        ));
        News::create(array(
            'name' => 'Using SVG',
            'url'  => 'http://css-tricks.com/using-svg/',
            'category' => 'tutorial',
            'user_id' => 1
        ));
        
    }

}