<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
  <img alt="PHP Unit" src="https://github.com/Kotus-s/laravel-api-starter/workflows/phpunit/badge.svg?branch=master" />
  <img alt="PHP Insights" src="https://github.com/Kotus-s/laravel-api-starter/workflows/insights/badge.svg?branch=master" />
  <img alt="GitHub" src="https://img.shields.io/github/license/Kotus-s/laravel-api-starter">
</p>

## 📣 About this respository

This repository is a prepared template which can be used to create an API. It contains all the necessary a pre-configured packages needed to concentrate yourself on the essential of the API.

## 📌 Current features

- [x] Auto generated documentation
- [x] Development docker-compose
- [x] JWT token system
- [x] GitHub Action PHPInsights and PHPUnit workflows
- [x] Repository pattern
- [x] Artisan command to generate repository (artisan make:repository ModelName)
- [x] Dynamic settings system

## 🗺 Roadmap

- [ ] ACL system based on permissions and roles
- [ ] Artisan command to generate an API endpoint model based on entity
- [ ] Production docker compose stack

## 📦 Packages used

- [mpociot/laravel-apidoc-generator](https://github.com/mpociot/laravel-apidoc-generator) - Auto-generated documentation
- [tymon/jwt-auth](https://github.com/tymondesigns/jwt-auth) - JWT token handler
- [kotus/laravel-settings](https://github.com/Kotus-s/laravel-settings) - laravel-settings

## 🐳 How to use docker-compose local stack

```shell
docker-compose up -d --build # Build and up the stack
```

```shell
docker-compose run --rm composer update # Execute a composer
```

```shell
docker-compose run --rm npm run dev # Execute an npm command
```

```shell
docker-compose run --rm artisan migrate # Execute artisan command
```

```shell
docker-compose run --rm artisan apidoc:generate # Generate the API documentation
```

```shell
docker-compose run --rm artisan make:repository User # Generate the user repository
```

## 📎 Sources

- [https://laravel.com/docs/7.x/authorization#policy-methods](https://laravel.com/docs/7.x/authorization#policy-methods)
- [https://github.com/aschmelyun/docker-compose-laravel](https://github.com/aschmelyun/docker-compose-laravel)
- https://medium.com/@ripoche.b/cr%C3%A9er-une-spa-avec-authentification-par-r%C3%B4les-avec-laravel-et-vue-js-e69782ac6896
- https://stackoverflow.com/questions/46103215/laravel-permissions-and-roles-with-gate-can
- https://code.tutsplus.com/tutorials/gates-and-policies-in-laravel--cms-29780
- https://docs.spatie.be/laravel-permission/v3/introduction/

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
