<!DOCTYPE html>
<html lang="ar" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="D-Seven Store - عرض منتجاتنا">
    <meta name="keywords" content="منتجات, تسوق, D-Seven Store">
    <meta name="author" content="D-Seven Store">
    <title>D-Seven Store - عرض المنتجات</title>
    <style>
        body {
            font-family: 'tajawal', sans-serif;
            direction: ltr;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .title-section {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .logo {
            width: 120px;
            height: auto;
            margin-bottom: 15px;
        }
        .store-name {
            color: #333;
            font-size: 28px;
            margin: 10px 0;
        }
        .store-info {
            color: #666;
            font-size: 16px;
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: right;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        img {
            max-width: 100px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }
        @media (max-width: 768px) {
            .store-name {
                font-size: 24px;
            }
            .store-info {
                font-size: 14px;
            }
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="title-section">
        <img src="">
        <h1 class="store-name">D-Seven Store</h1>
        <p class="store-info">العنوان:  نجع حمادي ، قنا، مصر</p>
        <p class="store-info">هاتف: 01021369699</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>الصورة</th>
                <th>السعر</th>
                <th>اسم المنتج</th>
            </tr>
        </thead>
        <tbody>
            @foreach($show as $product)
            <tr>
                <td><img src="photo_2024-11-09_18-56-30.jpg" alt="{{ $product->name }}"></td>
                <td>{{ $product->price }} ج.م</td>
                <td>{{ $product->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <footer>
        <p>جميع الحقوق محفوظة © 2024 - D-Seven Store</p>
    </footer>
</body>
</html>