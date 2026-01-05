<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $mail->title }}</title>

    <style>
        body {
            background: #f4f6fb;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
        }

        .message {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            white-space: pre-line;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="message">
        {{ $mail->message }}
    </div>
</div>
</body>
</html>
