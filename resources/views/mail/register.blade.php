<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333333;
        }
        p {
            color: #666666;
        }
        .token {
            font-size: 24px;
            color: #0088cc;
            margin-bottom: 20px;
        }
        .expiration {
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hummacook</h2>
        <p>Terimakasih telah mendaftar. Berikut adalah token registrasi Anda:</p>
        <div class="token">{{ $token }}</div>
        <p class="expiration">Token ini akan kadaluwarsa dalam 5 menit.</p>
        <p>Jangan berikan token ini kepada siapapun dan segera gunakan untuk menyelesaikan proses registrasi.</p>
        <p>Terima kasih!</p>
    </div>
</body>
</html>
