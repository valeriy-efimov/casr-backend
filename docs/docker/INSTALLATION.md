# Installation on docker

-  setup development domains
```bash
echo "127.0.0.1    casr.local.com" | sudo tee -a /etc/hosts
echo "127.0.0.1    api.casr.local.com" | sudo tee -a /etc/hosts
```

- open folder src in other terminal tab
```bash
cd ./../../src
```

- setup environment configuration
```bash
cp .env.example.docker .env
```
```bash
ln -s src/.env .env
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

- switch to src project folder

- setup database
```bash
php artisan migrate
```

- configure permissions 
```bash
chmod 777 -R storage bootstrap/cache
```

- run tests

```bash
php artisan test
```
