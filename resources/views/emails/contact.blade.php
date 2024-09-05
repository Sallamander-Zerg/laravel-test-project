<!DOCTYPE html>
<html>
<head>
    <title>Новое сообщение от контакта</title>
</head>
<body>
    <h1>Новое сообщение</h1>
    <p>Имя: {{ $contact->name }}</p>
    <p>Email: {{ $contact->email }}</p>
    <p>Телефон: {{ $contact->phone }}</p>
</body>
</html>