# Maun Laravel Comments package

Used for create tags.


## Requirements

- "php": ">=7.0"


## Install

1) Type next command in your terminal:

```bash
composer require muan/laravel-tags
```

2) Add the service provider to your config/app.php file in section providers:

> Laravel 5.5 uses Package Auto-Discovery, so does not require you to manually add the ServiceProvider.

```php
'providers' => [
    // ...
    Muan\Tags\Providers\TagsServiceProvider::class,
    // ...
],
```

3) Use the following trait on your model

```php
// Use trait
use Muan\Tags\Traits\Taggable;
 
class Post extends Model
{
    use Taggable;
    
    // ...
}
```

## Usage (example)

```php

// Create tag
$tag = Muan\Tags\Model\Tag::create([
    'title' => $title = 'Laravel',
    'slug' => str_slug($title)
]);

// Sync tag
$post = App\Post::find($id = 1);
$post->tags()->sync([$tag->id]);

// Get tags
$tags = $post->tags;

```

### Commands

Create new tag
```bash
php artisan tag:create "new tag"
```

## License

Muan Laravel Admin package is licensed under the [MIT License](http://opensource.org/licenses/MIT).
