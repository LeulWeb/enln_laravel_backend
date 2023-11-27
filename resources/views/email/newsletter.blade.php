<!DOCTYPE html>
<html>

<head>
    <title>{{ $news->title }}</title>
    <style>
        /* Global styles */
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .container {
            width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
        }

        /* Header styles */
        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
            border-bottom: 1px solid #ccc;
        }

        .header img {
            width: 150px;
            height: auto;
        }

        /* Content styles */
        .content {
            line-height: 1.5;
            font-size: 16px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
        }

        .content h2 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .content p {
            margin-bottom: 10px;
        }

        /* Footer styles */
        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #f2f2f2;
            border-top: 1px solid #ccc;
        }

        .footer p {
            font-size: 12px;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('logo.png') }}" alt="ENLN Logo">
            <h2>ENLN Newsletter</h2>
        </div>

        <div class="content">
            <h2>{{ $news->title }}</h2>

            <div>
                {{ $news->content }}
            </div>

            <p class="date-published">Published: {{ $news->date_published }}</p>
        </div>

        <div class="footer">
            <p>&copy; Ethiopia Nutrition Leaders Network 2023</p>
        </div>
    </div>
</body>

</html>
