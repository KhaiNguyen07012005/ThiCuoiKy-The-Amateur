<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ví dụ 2</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <style>
        @font-face {
            font-family: 'SourceSansPro';
            src: url('SourceSansPro-Regular.ttf');
        }

        .clearfix {
            display: flex;
            justify-content: space-between;
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            border: solid 1px black;
            padding: 40px;
            position: relative;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: 'SourceSansPro', Arial, sans-serif;
            font-size: 14px;
        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }

        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0 0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 10px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3 {
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
        }

        table .desc {
            text-align: left;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {}

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 5px 10px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;
        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks {
            font-size: 16px;
            text-align: justify;
            margin-bottom: 50px;
        }

        #notices {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .footer-content {
            text-align: center;
            position: fixed;
            padding: 10px;
            font-size: 14px;
            bottom: 0;
            left: 0;
            width: 98%;
        }
    </style>
</head>

<body>
    <header class="clearfix" style="margin-top: 20px;">
        <div>
            <img src="{{ $imagePath }}" alt="" style="width: 100px; height: auto">
        </div>
        <div id="company">
            <h2 class="name">The Amateur</h2>
            <div></div>
            <div>+84 0000-1111</div>
            <div><a href="mailto:cs.autorent@gmail.com">cs.autorent@gmail.com</a></div>
        </div>
    </header>
    <br>
    <main>
        @foreach ($orders as $order)
            <div style="margin-bottom: 100px;">
                <div id="client">
                    <div class="to">HÓA ĐƠN ĐẾN:</div>
                    <h2 class="name">{{ $order->payment->user->name }}</h2>
                    <div class="email"><a href="mailto:{{ $order->payment->user->email }}">{{ $order->payment->user->email }}</a></div>
                </div>
                <div id="invoice" style="margin-bottom: 20px;">
                    <h1>MÃ HÓA ĐƠN: {{ $order->id }}</h1>
                    <div class="date">Ngày hóa đơn: {{ $order->payment->created_at }}</div>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th class="desc">Mô tả</th>
                        <th class="unit">Giá</th>
                        <th class="qty">Ngày thuê</th>
                        <th class="qty">Ngày trả</th>
                        <th class="total">Chi phí</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="desc">{{ $order->car->brand }} {{ $order->car->name }}</td>
                        <td class="unit">{{ $order->car->price }} VNĐ/ngày</td>
                        <td class="qty">{{ $order->rent_date }}</td>
                        <td class="qty">{{ $order->return_date }}</td>
                        <td class="total">{{ $order->payment->cost }} VNĐ</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"></td>
                        <td>Tổng chi phí</td>
                        <td class="total">{{ $order->payment->cost }} VNĐ</td>
                    </tr>
                </tfoot>
            </table>
        @endforeach
    </main>
    <footer>
        <div class="footer-content">
            <h4>The Amateur</h4>
            <p>Thông tin liên hệ</p>
        </div>
    </footer>
</body>

</html>
