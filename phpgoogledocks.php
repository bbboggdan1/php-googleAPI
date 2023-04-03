<?php
require_once __DIR__ . '/vendor/autoload.php'; // подключение библиотеки Google API

// установка параметров авторизации для доступа к Google API
$client = new Google_Client();
$client->setApplicationName('Insert Text to Google Doc');
$client->setScopes(Google_Service_Docs::DOCUMENTS);
$client->setAuthConfig('path/to/your/credentials.json');
$client->setAccessType('offline');

// создание сервиса для работы с документами Google
$service = new Google_Service_Docs($client);

// получение идентификатора документа, в который нужно вставить строку
$documentId = 'DOCUMENT_ID_HERE'; // замените на идентификатор своего документа

// создание объекта запроса для вставки текста в начало документа
$request = new Google_Service_Docs_Request(array(
  'insertText' => array(
    'location' => array(
      'index' => 1, // индекс первого символа в документе
    ),
    'text' => 'Ваш текст здесь', // замените на свой текст
  ),
));

// выполнение запроса для вставки текста в начало документа
$service->documents->batchUpdate($documentId, new Google_Service_Docs_BatchUpdateDocumentRequest(array(
  'requests' => $request,
)));

echo 'Текст успешно вставлен в начало документа!';
