<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessTweet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;


    protected $tweet;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tweet)
    {
        $this->tweet = $tweet;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       $tweet = json_decode($this->tweet,true);
       $tweet_text = isset($tweet['text'])? $tweet['text'] : null ;
       $user_id = isset($tweet['user']['id_str'])? $tweet['user']['id_str'] : null ;
       $user_screen_name = isset($tweet['user']['screen_name']  ) ? $tweet['user']['screen_name'] : null;
       $user_avatar_url = isset($tweet['user']['profile_image_url_https']) ? $tweet['user']['profile_image_url_https'] : null  ;

       if(isset($tweet['id'])){
        Tweet::create([
            'id' => $tweet['id_str'],
            'json' => $this->tweet,
            'tweet_text' => $tweet_text ,
            'user_id' => $user_id,
            'user_screen_name' => $user_screen_name,
            'user_avatar_url' => $user_avatar_url,
            'approved' => 0 

        ]);
       }
    }
}
