# hunt-quote

Hunt Quote is a simple quote app like BrainQuote, but with swag.

## Setup

This app uses:

- Laravel 4.2
- jQuery
- Twitter Bootstrap 3.x
- Bower (asset management)
- MySQL

#### Requirements

- PHP `>=v.5.x`
- MySQL `>=5.x`
- Composer
- Node.js, npm, bower (for the asset management)

All it takes is cloning the repository, installing the dependencies, and setup the database.

```bash
# clone the repository
$ git clone https://github.com/JcRicaro/hunt-quote.git && cd hunt-quote

# install dependencies
$ composer install && bower install
```

Check `app/config` (particularly `app/config/database.php`) and setup the database configurations there. Afterwards, run the migrations and seeders.

```bash
$ php artisan migrate && php artisan db:seed
```

You're almost there! Last step is to spawn your own web server. And then you're good to go.

## Acknowledgement

**hunt-quote** © 2015+, [JC Ricaro (@JcRicaro)](https://github.com/JcRicaro) and [Kier Borromeo (@srph)](https://github.com/). **swag** is released under the [MIT](mit-license.org) license.
