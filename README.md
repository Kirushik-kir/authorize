<p align="center">
      <img src="https://i.postimg.cc/c4cJQ7RC/2024-03-31-224436044.png" width="40%" height="40%" >
</p>

## About

This is a laravel-project, which realize the api CRUD (login and authorize)

## Downloading

Run these commands to run the app
* ```cp .env.example .env```
* ```docker-compose up --build```
* ```docker compose exec app composer install```
* ```docker compose exec app php artisan migrate```
* ```docker compose exec app php artisan key:generate```
* ```docker compose exec app php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"```
* ```docker compose exec app php artisan jwt:secret```


## endpoints
* localhost/api/register
* localhost/api/authorize
* localhost/api/feed


## Developer

Welcome to my Github!) [Kirill Ivanov](https://github.com/Kirushik-kir)
<p>Contacts:</p>
<p>vk/tg: @kir_ll_great</p>


## License

This project is distributed under the MIT license
