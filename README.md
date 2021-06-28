### Предварительные требования

- Git
- Composer
- PHP 7.4+
- PDO
- Docker (опционально)

### Установка с Git

В вашем терминале выполните:

```bash
git clone https://github.com/yulia633/xsolla-school-test.git && cd xsolla-school-test
make env-prepare
make install
make start 
```

### Docker

Вы можете использовать этот проект с помощью **docker** и **docker-compose**:

**Минимальная версия Docker:**

- Engine: 18.03+
- Compose: 1.21+

**Команды:**

```bash
# Запустить API - это псевдоним для docker-compose up -d --build.
$ make up

# Проверить API.
$ curl http://localhost:8080

# Остановить и удалить контейнеры, псевдоним для docker-compose down.
$ make down
```


## Тестирование

Запустить тесты с помощью `make test`.

```bash
$ make test
> phpunit
PHPUnit 9.3.10 by Sebastian Bergmann and contributors.

....                                                                4 / 4 (100%)

Time: 00:00.042, Memory: 6.00 MB

OK (4 tests, 4 assertions)
```

## Документация

HTTP Метод | URL | Описание
--- | --- | --- 
GET | `/api/v1/products` | Получение каталога товаров.
GET | `/api/v1/products/{sku}` | Получение информации о товаре по SKU.
POST | `/api/v1/products` | Создание товара.
PUT | `/api/v1/products/{sku}` | Редактирование товара по SKU.
DELETE | `/api/v1/products/{sku}` | Удаление товара по SKU.
