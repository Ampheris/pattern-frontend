# SparkiFy frontend

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Ampheris/pattern-frontend/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/Ampheris/pattern-frontend/?branch=main)

[![Build Status](https://scrutinizer-ci.com/g/Ampheris/pattern-frontend/badges/build.png?b=main)](https://scrutinizer-ci.com/g/Ampheris/pattern-frontend/build-status/main)

[![Code Intelligence Status](https://scrutinizer-ci.com/g/Ampheris/pattern-frontend/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)

## Table of content
* [Contributing](#get-started-with-developing)
* [Code quality](#code-quality)

## Get started with developing
* Download repo
* Install requirements:
    ```text
    composer install
    npm install
    ```
* .env
    * API_URL ex. http://localhost:8000/sparkapi/v1/
    * API_TOKEN (contact admin)

* Run development server:
    ```text
    php artisan serve
    ```
* To compile css and js:
	```text
    npm run dev
    ```
    or
	```text
    npm run watch
    ```

## Code quality
Make sure you keep a good code standard when contributing

```text
make install
make test
```
