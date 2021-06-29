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

## Документация

HTTP Метод | URL | Описание
--- | --- | --- 
GET | `/api/v1/products` | Получение каталога товаров.
GET | `/api/v1/products/{sku}` | Получение информации о товаре по SKU.
POST | `/api/v1/products` | Создание товара.
PUT | `/api/v1/products/{sku}` | Редактирование товара по SKU.
DELETE | `/api/v1/products/{sku}` | Удаление товара по SKU.


### GET `/api/v1/products` 
Получение каталога товаров.

#### Результат 
```json
{
    "result": "Success",
    "data": [
        {
            "id": "2",
            "sku": "90",
            "name": "product1",
            "price": "1",
            "type": "hit"
        },
        {
            "id": "3",
            "sku": "92",
            "name": "product3",
            "price": "199.9",
            "type": "game"
        },
        {
            "id": "22",
            "sku": "76",
            "name": "product4",
            "price": "890",
            "type": "hit"
        },
        {
            "id": "23",
            "sku": "77",
            "name": "product4",
            "price": "490",
            "type": "hit"
        },
        {
            "id": "24",
            "sku": "78",
            "name": "product5",
            "price": "89.8",
            "type": "gemt"
        }
    ],
    "page": 1
}
```

### GET `/api/v1/products/{sku}`
Получение информации о товаре по SKU.

#### Результат 
```json
{
    "result": "Success",
    "data": {
        "id": "2",
        "sku": "90",
        "name": "product1",
        "price": "12",
        "type": "hit"
    }
}
```

### POST `/api/v1/products`
Создание товара.

#### Параметры
name: имя товара,
sku: товарный идентификатор,
price: стоимость,
type": тип

#### Ограничения
Товар имеет уникальный sku

#### Запрос 
```json
{
    "name": "product8",
    "sku": "103",
    "price": "199",
    "type": "game"
}
```

#### Результат 
```json
{
    "result": "Success",
    "message": "Товар успешно создан",
    "data": {
        "name": "product8",
        "sku": "103",
        "price": "199",
        "type": "game"
    }
}
```

### PUT `/api/v1/products/{sku}`
Редактирование товара по SKU.

#### Параметры
name: имя товара,
sku: товарный идентификатор,
price: стоимость,
type": тип

#### Ограничения
Параметр sku не может быть отредактирован.

#### Запрос 
```json
{
    "name": "product1",
    "sku": "90",
    "price": "199",
    "type": "hit"
}
```

#### Результат 
```json
{
    "result": "Success",
    "message": "Товар успешно изменен",
    "data": {
        "name": "product1",
        "sku": "90",
        "price": "13",
        "type": "hit"
    }
}
```

### DELETE `/api/v1/products/{sku}`
Удаление товара по SKU.

#### Результат 
```json
{
    "result": "Success",
    "message": "Товар успешно удален"
}
```
