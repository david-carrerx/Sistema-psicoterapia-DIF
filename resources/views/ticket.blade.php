<?php
$medidaTicket = 180;
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        * {
            font-size: 12px;
            font-family: 'DejaVu Sans', serif;
        }

        h1 {
            font-size: 48px;
            text-align: center;
        }

        h3{
            font-weight: normal;
        }


        span{
            font-weight: bold;
        }

        .ticket {
            margin: 2px;
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
            margin: 0 auto;
            margin-top: 1px;
        }

        td.price {
            text-align: center;
            font-size: 11px;
        }

        td.service {
            text-align: center;
            font-size: 11px;
        }

        td.id {
            text-align: center;
        }

        th {
            text-align: center;
        }


        .centrado {
            margin-left: 25px;
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: <?php echo $medidaTicket ?>px;
            max-width: <?php echo $medidaTicket ?>px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .ticket {
            margin: 0;
            padding: 0;
        }

        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="ticket centrado">
        <h1>DIF</h1>
        <br>
        <h2>{{ $payment->date }}</h2>
        <br>
        <hr style="border:0.5px dotted black;"/>
        <br>
        <h3><span>PACIENTE:</span> {{$payment->patient->name}}</h3>
        <h3><span>ID DE PACIENTE:</span> {{$payment->patient_id}}</h3>
        <br>
        <hr style="border:0.5px dotted black;"/>
        <br>
        <h3><span>SERVICIO:</span> {{$payment->service->name}}</h3>
        <br>
        <hr style="border:0.5px dotted black;"/>
        <br>
        
        <table>
            <thead>
                <tr class="centrado">
                    <th class="id">ID</th>
                    <th class="service">SERVICIO</th>
                    <th class="price">PRECIO</th>
                </tr>
            </thead>
            <tbody>
                 <tr>
                    <td class="id">{{ $payment->id}}</td>
                    <td class="service">{{ $payment->service->name }}</td>
                    <td class="price">{{ $payment->service->price }}</td>
                </tr>
            </tbody>
            <tr>
                <td class="cantidad"></td>
                <td class="producto">
                    <br>
                    <strong>Gran Total ${{ $payment->service->price }}</strong>
                </td>
                <td class="precio">
                </td>
            </tr>
        </table>
        <br>
        <hr style="border:0.5px dotted black;"/>
        <br>
        <p class="centrado">Centro de desarrollo Oriente
            <br>6181379350</p>
    </div>
</body>
</html>