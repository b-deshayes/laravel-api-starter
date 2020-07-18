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
- [x] docker-compose local stack

## 🗺 Roadmap

- [ ] ACL system based on permissions and roles
- [ ] Artisan command to generate an API endpoint model based on entity
- [ ] Production Dockerfile that can be set in production's docker-compose stack and build by a CI/CD service
- [ ] Dynamic settings system
- [ ] 

## 📦 Packages used

- mpociot/laravel-apidoc-generator - Auto-generated documentation
- laravel/passport - Laravel Passport

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

## 📎 Sources

- [https://laravel.com/docs/7.x/authorization#policy-methods](https://laravel.com/docs/7.x/authorization#policy-methods)
- [https://github.com/aschmelyun/docker-compose-laravel](https://github.com/aschmelyun/docker-compose-laravel)

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
