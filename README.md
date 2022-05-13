Документація українською мовою
доступна [за посиланням](https://github.com/lis-dev/nova-poshta-api-2/blob/master/README.ua.md)

[![Build Status](https://travis-ci.com/lis-dev/nova-poshta-api-2.svg?branch=master)](https://travis-ci.com/lis-dev/nova-poshta-api-2)

# Nova Poshta API 2.0

Класс предоставляет доступ к функциям API 2.0 службы доставки Новая Почта

# Подготовка

## Получение ключа API

Для использования API необходимо:

* зарегистрироваться на сайте [Новой Почты](http://novaposhta.ua)
* На [странице настроек](https://my.novaposhta.ua/settings/index#apikeys) в личном кабинете сгенерировать ключ для
  работы с API

После получения ключа API предоставляется возможность использовать все методы
класса [официальной из документации](https://my.novaposhta.ua/data/API2-200215-1622-28.pdf)

## Установка последней версии класса для работы с API

### Git

Необходимо выполнить в командной строке

```git
git clone https://github.com/lis-dev/nova-poshta-api-2
```

### Composer

Необходимо создать файл ``composer.json`` со следующим содержанием

```json
{
  "require": {
    "lis-dev/nova-poshta-api-2": "~0.1.0"
  }
}
```

и запустить из командной строки команду ``php composer.phar install`` или ``php composer.phar update``
Или выполнить в командной строке

```
composer require lis-dev/nova-poshta-api-2
```

### Альтернативная установка

Необходимо скачать архив по ссылке

```
https://github.com/lis-dev/nova-poshta-api-2/archive/master.zip
```

# Форматы данных

Для входящих данных используются PHP массивы, ответ сервера может быть получен в формате:

* как PHP массив
* JSON
* XML

# Использование

Можно взаимодействовать как с конкретной моделью, так и вызывать произвольный метод для нужной
модели ([см. документацию](https://developers.novaposhta.ua/documentation)).

## Вызов произвольного метода модели через NewPostGateWay

```php
    
    $requestSettings = new ApiRequestSettings(
        'Ваш_ключ_API_2.0'
    );
    
    $requestModelData = new ApiRequestModelData(
        'TrackingDocument',
        'getStatusDocuments',
        [
            'Documents' => [
                [
                    'DocumentNumber' => '20600009559994'
                ]
            ]
        ]
    );
    
    $sendData = new ApiRequestSendData(
        $requestSettings, $requestModelData
    );

    $np = new NewPostGateWay($sendData);
    $result = $np->send();
```

## Работа с конкретной моделью

Можно работать с конкретной моделью. Список поддерживаемых методов ниже.

```php
    $requestSettings = new ApiRequestSettings(
        'Ваш_ключ_API_2.0'
    );
    
    $apiModel = new TrackingDocument($requestSettings);
    $result = $apiModel->tracking('20600009559994');
```

# Поддерживаемые методы для работы с моделями

## Модель InternetDocument

* save
* update
* delete
* getDocumentPrice
* getDocumentDeliveryDate
* getDocumentList
* getDocument
* printDocument
* printMarkings
* documentsTracking
* newInternetDocument
* generateReport

## Модель Counterparty

* save
* update
* delete
* cloneLoyaltyCounterpartySender
* getCounterparties
* getCounterpartyAddresses
* getCounterpartyContactPersons
* getCounterpartyByEDRPOU
* getCounterpartyOptions

## Модель ContactPerson

* save
* update
* delete

## Модель Address

* save
* update
* delete
* getCities
* getStreet
* getWarehouses
* getAreas
* findNearestWarehouse

## Модель Common

* getTypesOfCounterparties
* getBackwardDeliveryCargoTypes
* getCargoDescriptionList
* getCargoTypes
* getDocumentStatuses
* getOwnershipFormsList
* getPalletsList
* getPaymentForms
* getTimeIntervals
* getServiceTypes
* getTiresWheelsList
* getTraysList
* getTypesOfPayers
* getTypesOfPayersForRedelivery
