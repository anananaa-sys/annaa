 <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .calculator {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 300px;
            width: 100%;
        }
        .calculator h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .calculator input[type="number"], .calculator input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .calculator input[type="submit"] {
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .calculator input[type="submit"]:hover {
            background: #45a049;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Kalkulator Sederhana</h2>
        <form method="POST">
            <input type="number" name="bil1" placeholder="Masukkan angka pertama" required> 
            <input type="number" name="bil2" placeholder="Masukkan angka kedua" required>
            <input type="submit" name="operation" value="Penjumlahan">
            <input type="submit" name="operation" value="Pengurangan">
            <input type="submit" name="operation" value="Perkalian">
        </form>
        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $bil1 = $_POST['bil1'];
                $bil2 = $_POST['bil2'];
                $operation = $_POST['operation'];

                if ($operation == "Penjumlahan") {
                    $result = $bil1 + $bil2;
                    echo "Hasil Penjumlahan: $bil1 + $bil2 = $result";
                } elseif ($operation = "Pengurangan") {
                    $result = $bil1 - $bil2;
                    echo "Hasil Pengurangan: $bil1 - $bil2 = $result";
                } elseif ($operation = "Perkalian") {
                    $result = $bil1 * $bil2;
                    echo "Hasil Perkalian: $bil1 × $bil2 = $result";
                }
}
            ?>
        </div>
    </div>
</body>
</html>