<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});


Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, route('category.show', $category->name));
});

Breadcrumbs::for('search', function ($trail) {
    $trail->parent('home');
    $trail->push('Search', route('search'));
});


Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post.show', ['category'=>$post->category->name, 'slug'=>$post->slug]));
});