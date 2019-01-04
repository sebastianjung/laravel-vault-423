# laravel-vault-423
A Password Protection Middleware For Laravel Applications

# Features
- multiple passwords
- automated revoke of access by simply removing the password from the password list
- IP whitelisting (saves time when clearing cookie cache often times ;P)


# CONTENTS
- [Installation](#installation)
- [Configuration](#configuration)
- [ToDos](#todos)


# Installation
### Composer
```
composer required sebastianjung/laravel-vault-423
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



### Laravel < 5.2
Remember to add the ServiceProvider of this package to your `$providers` array inside your `app.php` config file.
```
SebastianJung\Vault423\Vault423ServiceProvider::class
```

# Configuration
To publish the config file for this package simply execute
```
php artisan vendor:publish --provider='SebastianJung\\Vault423\\Vault423ServiceProvider'
```


### Whitelisting
Inside your config file there is an Array called `whitelist`. Just fill it with some IPs as strings like so:
```
'whitelist' => ['127.0.0.1', '192.168.0.1']
```


# ToDos
- custom logo
- custom website link
- custom background and font color
- feedback when input is focused
