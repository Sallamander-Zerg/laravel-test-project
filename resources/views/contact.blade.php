<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</head>
<body>

<div class="container">
    <h1>Контактная форма</h1>
    <form id="contact-form" method="POST" action="/contact">
        @csrf
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Телефон:</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#contact-form").validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                phone: "required"
            },
            messages: {
                name: "Пожалуйста, введите ваше имя",
                email: {
                    required: "Пожалуйста, введите ваш email",
                    email: "Пожалуйста, введите корректный email"
                },
                phone: "Пожалуйста, введите ваш телефон"
            },

            submitHandler: function(form) {
                $.ajax({
                    type: "POST",
                    url: "/contact",
                    data: $(form).serialize(),
                    success: function(response) {
                        alert('Форма успешно отправлена!'); 
                        form.reset();
                    },
                    error: function(xhr) {
                        alert('Ошибка: ' + xhr.responseText); 
                    }
                });
            }
        });
    });
</script>
</body>
</html>
