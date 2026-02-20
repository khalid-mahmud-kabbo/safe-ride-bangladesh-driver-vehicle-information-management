<!DOCTYPE html>
<html>
<head>
    <title>Vehicle & Driver QR Info</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
            background: #f0f0f0;
        }

        .qr-card {
            width: 350px;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            text-align: center;
            background: #fff;
            page-break-inside: avoid;
        }

        .logo {
            padding: 10px 0;
            background: #000;
            color: #fff;
        }

        .logo img {
            max-width: 200px;
        }

        .qr-code {
            background: #8c0505;
            padding: 20px;
        }

        .qr-code svg {
            width: 100%;
            height: auto;
        }

        .scan-text {
    background: #8c0505;
    color: #fff;
    font-weight: bold;
    padding: 10px 0;
    background: #000;
    font-size: 1.1rem;
}

        @media print {
            body {
                background: #fff;
            }
            .qr-card {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

<div class="qr-card">

    <div class="logo">
        <img src="{{ asset(IMG_LOGO_PATH . $allsettings['main_logo']) }}" alt="Logo">
        <div>Trust & Safety is our priority.</div>
    </div>

    <div class="qr-code">
        {!! $qrSvg !!}
    </div>

    <div class="scan-text">SCAN TO SEE THE DETAILS</div>

</div>

<script>
    window.print();
</script>
</body>
</html>
