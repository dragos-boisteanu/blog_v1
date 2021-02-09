<?php

namespace App\Http\ViewComposers;

use App\Models\Post;
use Illuminate\View\View;
use CyrildeWit\EloquentViewable\Support\Period;

class MostViewedComposer 
{
   private $posts;

   public function compose(View $view)
   {
       $excludedViews = ['admin.*', 'auth.*','user'];

       if(!in_array($view->getName(), $excludedViews)) {
           $this->posts = Post::orderByViews('desc', Period::pastDays(7))->limit(5)->get(); 
           $view->with('mostViewedPosts', $this->posts);
       }      
   }
}
