<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer 
{
   private $categories;

   public function compose(View $view)
   {
       $excludedViews = ['admin.*', 'auth.*','user'];

       if(!in_array($view->getName(), $excludedViews)) {
           $this->categories = Category::all();
           $view->with('categories', $this->categories);
       }      
   }
}
