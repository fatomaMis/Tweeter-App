<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Streamer;

class ConnectToStreamingAPI extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'connect_to_streaming_api';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'connect to tweeter streaming API';
    protected $tweeterStream ;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Streamer $tweeterStream)
    {
        $this->tweeterStream = $tweeterStream;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $twitter_consumer_key = env('TWITTER_CONSUMER_KEY','');
        $twitter_consumer_secret = env('TWITTER_CONSUMER_SECRET','');

        $this->tweeterStream->consumerconsumerSecretKey = $twitter_consumer_key;
        $this->tweeterStream->consumerSecret = $twitter_consumer_secret;
        $this->tweeterStream->setTrack(array('Scotch.io'));
        $this->tweeterStream->consume();
    }
}
