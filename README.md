<p align="center">
      <img src="https://vk.com/im?peers=c27&sel=249023423" width="228">
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
Contacts:
vk/tg: @kir_ll_great


## License

This project is distributed under the MIT license
