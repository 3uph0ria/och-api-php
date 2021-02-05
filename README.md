# OCH API
PHP SDK для использования OCH API

## Документация

[Документация](https://gs-dev.ru/och/api/documentation.php#intro)

## Авторизация

Для использования SDK требуется `API_KEY`, подробности в [документации](https://gs-dev.ru/och/api/documentation.php#intro).

```php
<?php

$apiKey = ''; // Ваш API ключ
$OchApi = new OchApi($apiKey);

?>
```

## Требования

* **PHP v5.6.0** или выше