<?php

namespace App\Jobs;

use App\Models\BlogPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BlogPostAfterCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $blogPost;

    /**
     * Create a new job instance.
     *
     * @param BlogPost $blogPost
     */
    public function __construct(BlogPost $blogPost)
    {
        $this->blogPost = $blogPost;
        $this->onQueue('post_created');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        logs()->info("Created new Blog Post [{$this->blogPost->id}].");
    }
}
