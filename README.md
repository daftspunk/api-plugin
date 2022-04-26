# API module for October CMS

## Installation

### Require with composer
`composer require rainlab/api-plugin`

### Run migrations & install Passport
`php artisan api:install`

## Basics

### Registering resources

You can register resources for your plugin by using the `registerApiResources` method in your `Plugin.php` file.
```php
public function registerApiResources()
{
    return [
        'blogposts' => \RainLab\Blog\Models\Post::class,
    ];
}
```

<i>Sponsored by Codecycler [(codecycler.com)](https://codecycler.com)</i>