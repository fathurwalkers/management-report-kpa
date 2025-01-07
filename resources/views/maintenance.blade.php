<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Mode</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body, html {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #1e1e2f;
            color: #f1f1f1;
            text-align: center;
        }
        .container {
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 90%;
            animation: fadeIn 2s ease-in-out;
        }
        h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .marquee {
            font-size: 1.2em;
            font-weight: bold;
            color: #ffd700;
            background: #222;
            padding: 10px;
            margin: 20px 0;
            overflow: hidden;
        }
        .animated-text {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 16s linear infinite;
        }
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: scale(0.9); }
            100% { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Website ini tidak dapat Diakses untuk Beberapa saat. </h1>
        <p>Proses Upload dan Maintenance Database sedang dilakukan, oleh karena itu website ini sedang tidak dapat diakses sampai ada informasi kembali.</p>
        <div class="marquee">
            <span class="animated-text">MAAF, WEBSITE SEDANG DALAM PROSES MAINTENANCE!!! SILAHKAN KONTAK DIVISI IT UNTUK INFORMASI LEBIH LANJUT. TERIMA KASIH.</span>
        </div>
        <p>&mdash; Sincerely, Divisi IT PT. KPA</p>
    </div>

</body>
</html>
