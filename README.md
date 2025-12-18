# WB API Тестовый проект

Проект для выгрузки данных с WB API и сохранения их в базе данных MySQL.  
Используется **Laravel 12** и **MySQL**.

## Возможности

- Выгрузка данных: **Продажи (Sales)**, **Заказы (Orders)**, **Склады (Stocks)**, **Доходы (Incomes)**
- Поддержка пагинации API
- Сохранение полной структуры ответа API в таблицах
- Предотвращение дублирования записей

## База данных

- Хост: ballast.proxy.rlwy.net:59776  
- База данных: railway  
- Пользователь: root  
- Пароль: lwGKDwgKXDjxJgyHpqmfnzwPlcEwGgBR 
- Таблицы:  
  - `sales`  
  - `orders`  
  - `stocks`  
  - `incomes`  
  - `migrations`

## Как запустить локально

1. Клонировать репозиторий:
   ```bash
   git clone https://github.com/LeysanSan/wb-api-test
   cd wb-api-test

2. Установить зависимости:

composer install

3. Скопировать .env.example в .env и указать данные базы
4. Запустить миграции php artisan migrate
5 Запустить сервер Laravel: php artisan serve
6. Данные с WB API уже загружены в базу и готовы к проверке


