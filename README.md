# Teste Prossigo

## Informações acerca da aplicação
- Banco utilizado: SQLite 
- Servidor SMTP: [Mailtrap](https://mailtrap.io)
- Framework CSS: Bootstrap
- Frontend: Vue (latest)
- Backend: Laravel (6.0)

## Instalação
```bash
git clone https://github.com/ceciliarb-sandbox/teste-prossigo
cp .env.example .env
npm install
composer install
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm run dev
php artisan serve
```

## Testes
Os testes de Storage podem escrever no diretório `storage/app/public`.  
Para limpar esse diretório antes de executar os testes, execute o comando:
```bash
php artisan clean-storage
```

Para executar os testes:
```bash
phpunit
```
