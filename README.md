# laravel-vault-423
A Password Protection Middleware For Laravel Applications That Fits Your Brand.

![](teaser.gif)

DEMO: vault-423.ultrabold.de // PASSWORD: vault423

# Features
- multiple passwords (per .env file)
- automated revoke of access by simply removing the password from the password list
- IP whitelisting (saves time when clearing cookie cache often times ;P)
- fully customizable (Custom Logo, Font Family, Colors and more ...
- neat animations
- works in common browser (including our most beloved IE11)


# CONTENTS
- [Installation](#installation)
- [Configuration](#configuration)
- [Customization](#customization)
- [Troubleshooting](#troubleshooting)


# Installation
### Composer
```
composer require sebastianjung/laravel-vault-423
```


### Middleware
Add the following line to your `$middlewareGroups` Array inside your `Kernel.php`
```
\SebastianJung\Vault423\Http\Middleware\Vault423::class
```


### Creating Passwords
Inside your `.env` file create a line as follows:
```
VAULT_423_PASSWORDS=password1,password2
```
If no password / string is provided the page is accessible to anyone.


### Laravel < 5.5
Remember to add the ServiceProvider of this package to your `$providers` array inside your `app.php` config file.
```
SebastianJung\Vault423\Vault423ServiceProvider::class
```

# Configuration
To publish the config file for this package simply execute
```
php artisan vendor:publish --provider='SebastianJung\Vault423\Vault423ServiceProvider'
```

### Whitelisting
Inside your config file there is an Array called `whitelist`. Just fill it with some IPs as strings like so:
```
'whitelist' => ['127.0.0.1', '192.168.0.1']
```

# Customization
Available customizations are:
```
- meta title tag
- logo
- logo size
- welcome text
- link to some webpage
- colors
- font families
- and if that is not enough for you: a custom css option
```
Further information is available in the [vault-423.php](https://github.com/sebastianjung/laravel-vault-423/blob/master/src/config/vault-423.php) config file.

# Troubleshooting
### Call To Undefined Method isDeferred()
You may need to call the package discovery of laravel again like so:
```
php artisan package:discover
```
