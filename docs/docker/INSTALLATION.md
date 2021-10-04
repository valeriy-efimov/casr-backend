# Installation on localhost

-  setup development domains
```bash
echo "127.0.0.1    casr.local.com" | sudo tee -a /etc/hosts
echo "127.0.0.1    api.casr.local.com" | sudo tee -a /etc/hosts
```

- switch to root project folder

- launch docker-compose
```bash
docker-compose up --build
```

- enter web container and install dependencies inside of the container
```bash
docker-compose exec web bash
npm install
composer install
```

- open folder src in other terminal tab
```bash
cd ./../../src
```

- setup environment configuration
```bash
cp .env.example.docker .env
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
