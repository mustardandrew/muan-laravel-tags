# Maun Laravel Tags package

[![Maintainability](https://api.codeclimate.com/v1/badges/ea5d752194dbda8ff1ac/maintainability)](https://codeclimate.com/github/mustardandrew/muan-laravel-tags/maintainability)

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

## Usage (examples)

### Create & attach single tag
```php
// Create tag
$tag = Muan\Tags\Model\Tag::create([
    'title' => $title = 'Laravel',
    'slug' => str_slug($title)
]);

// Attach tag
$post = App\Post::find(1);
$post->tags()->attach($tag->id);
```
### Create & attach multiple tags
```php
$tags = ['Laravel', 'Eloquent', 'Tags'];

foreach ($tags as $index => $tag) {
    $preparedTag = [
        'title' => $tag,
        'slug' => str_slug($tag)
    ];

    $tagId = Muan\Tags\Model\Tag::create($prepareTag)->id;
    $tags[$index] = $tagId;
}

$post = App\Post::find($id = 1);
$post->tags()->sync($tags);
```

### Get tags

```php
$tags = App\Post::find(1)->tags;
```

### Commands

Create new tag
```bash
// Slug is generated automatically using str_slug()

php artisan tag:create "tag title"
```

## License

Muan Laravel Admin package is licensed under the [MIT License](http://opensource.org/licenses/MIT).
