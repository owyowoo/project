<?php

namespace App\Listeners;

use App\Events\PostSaved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveDataToCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostSaved  $event
     * @return void
     */
    public function handle(PostSaved $event)
    {
        //
        $post = $event->post;
        $key = 'post_'.$post->id;
        Cache::put($key,$post,60*24*7);
        Log::info('保存文章到缓存成功！',['id'=>$post->id,'title'=>$post->title]);
    }
}
