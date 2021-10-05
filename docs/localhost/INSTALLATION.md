# Installation on localhost

-  setup development domains
```bash
echo "127.0.0.1    casr.local.com" | sudo tee -a /etc/hosts
echo "127.0.0.1    api.casr.local.com" | sudo tee -a /etc/hosts
```

- apache virtualhost config 
```bash
sudo cp config/localhost/apache2/casr.local.com.conf /etc/apache2/sites-available/casr.local.com.conf
sudo a2ensite casr.local.com.conf
sudo service apache2 reload
```

- switch to sources folder
```bash
cd src
```

- install dependencies
``` bash
composer install
```

- setup environment configuration
```bash
cp .env.example .env
```

- run this code for create the symbolic link
```bash
php artisan storage:link
```

- setup database
```bash
php artisan migrate
php artisan db:seed
```

- configure permissions 
```bash
chmod 777 -R storage bootstrap/cache
```

- run tests

```bash
php artisan test
```
