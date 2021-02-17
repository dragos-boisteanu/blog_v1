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





Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});


// POSTS
Breadcrumbs::for('admin-posts', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Posts list', route('admin-post.index'));
});

Breadcrumbs::for('admin-post.create', function ($trail) {
    $trail->parent('admin-posts');
    $trail->push('Create new post', route('admin-post.create'));
});


Breadcrumbs::for('admin-posts.edit', function ($trail, $post) {
    $trail->parent('admin-posts');
    $trail->push('Edit: ' . 'ID ' . $post->id . ' - ' . $post->title, route('admin-post.edit', ['id'=>$post->id]));
});



// USERS
Breadcrumbs::for('admin-users', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Users list', route('admin-users.index'));
});

Breadcrumbs::for('admin-users.show', function ($trail, $user) {
    $trail->parent('admin-users');
    $trail->push('User: ' . $user->name, route('admin-users.edit', ['id'=>$user->id]));
});

Breadcrumbs::for('admin-users.edit', function ($trail, $user) {
    $trail->parent('admin-users');
    $trail->push('User: ' . $user->name, route('admin-users.edit', ['id'=>$user->id]));
});


// CATEGORIES
Breadcrumbs::for('admin-categories', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Categories list', route('admin-categories.index'));
});

Breadcrumbs::for('admin-categories.show', function ($trail, $category) {
    $trail->parent('admin-categories');
    $trail->push('Category: ' . $category->name, route('admin-categories.edit', ['id'=>$category->id]));
});

Breadcrumbs::for('admin-categories.edit', function ($trail, $category) {
    $trail->parent('admin-categories');
    $trail->push('Category: ' . $category->name, route('admin-categories.edit', ['id'=>$category->id]));
});


