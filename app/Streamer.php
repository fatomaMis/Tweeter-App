<?php

namespace App;

use OauthPhirehose;
use App\Jobs\ProcessTweet;
use Illuminate\Foundation\Bus\DispatchesJobs;

class Streamer extends OauthPhirehose{
	use DispatchesJobs;

	public function enqueueStatus($status){
		$this->dispatch(new ProcessTweet($status));
	}
}