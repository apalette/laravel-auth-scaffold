## Laravel Auth Scaffold ##

### Description ###

This package will create a basic authentification scaffold with email verification for **Laravel 5.3** (French language for now)
 
### Installation ###
 
Add Auth Scaffold to your **composer.json** file to require Bootstrap :
```
    require : {
        "laravel/framework": "5.3.*",
        "codeuz/auth-scaffold": "dev-master"
    }
```
 
Update Composer :
```
    composer update
```
 
The next required step is to add the service provider to **config/app.php** :
```
    Codeuz\AuthScaffold\AuthScaffoldServiceProvider::class
```
 
### Publish ###
 
The next required step is to publish files in your application with :
```
    php artisan vendor:publish --force
```

### Configure your app ###

Configure **.env** file with database and mail variables :
```
    DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=your_db_name
	DB_USERNAME=your_db_user
	DB_PASSWORD=your_db_password
	...
	
	// Mailjet example
	MAIL_DRIVER=smtp
	MAIL_HOST=in-v3.mailjet.com
	MAIL_PORT=25
	MAIL_USERNAME=user_key
	MAIL_PASSWORD=user_password
	MAIL_ENCRYPTION=tls
```

Configure **config/app.php** with Timezone and Locale :
```
    'timezone' => 'Europe/Brussels',
    'locale' => 'fr',
```

Configure **config/mail.php** with mail sender :
```
    'from' => ['address' => 'contact@mysite.com', 'name' => 'Mail sender of my site'],
```

### Database Migration ###
The next required step is to create database tables with :
```
    php artisan migrate
```
 
### Render ###

You can now edit each file and custom it.
 
Congratulations, you have successfully installed Auth Scaffold Package !
