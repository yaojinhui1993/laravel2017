<?php

Route::get('/', 'PostsController@index');

Route::get('/posts/{post}', 'PostsController@show');

// controller -> PostsController
// Eloquent -> Post.php
// migration -> create_posts_table
