# Laravel Vite Starter

## To get running

If on windows, run from administrative powershell:
```
php artisan vite:link
```
This creates a symbolic link of your resources folder to vite/resources

```
yarn
yarn watch (for dev)
yarn build (for production builds)
```

## Installing in an existing project

Copy the `/vite` folder into your project.

Run: `yarn add -D @vue/compiler-sfc vite` and `yarn add vue@next`

Update your scripts in package.json:
```json
"scripts": {
    "watch": "cd vite && npx vite",
    "build": "cd vite && npx vite build --entry=\"../resources/js/app.js\""
},
```

If your main js file isn't `resources/js/app.js`, update the path both in the build script above and in `vite/vite.config.js`.

Add the following to your layout blade file:

```php
@if(env('APP_ENV') === 'production')
    @if(isset($manifest['style.css']))
        <link rel="stylesheet" href="/assets/{{ $manifest['style.css'] }}">
    @endif
    @if(isset($manifest['index.js']))
        <script type="module" src="/assets/{{ $manifest['index.js'] }}"></script>
    @endif
@else
    <script type="module" src="http://localhost:3000/vite/client"></script>
    <script type="module" src="http://localhost:3000/resources/js/app.js"></script>
@endif
```

Add the following to your `AppServiceProvider`'s `boot` method.

```php
View::share('manifest', json_decode(file_get_contents(public_path('assets/manifest.json')), true));
```