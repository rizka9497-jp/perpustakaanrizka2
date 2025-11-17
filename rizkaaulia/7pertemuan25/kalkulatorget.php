<!DOCTYPE html>
<html>
<head>
    <title>Form Kalkulator</title>
</head>
<body>
    <h2>Kalkulator Sederhana (Metode GET)</h2>
    <form action="proses_kalkulator.php" method="GET">
        <label>Bilangan 1:</label>
        <input type="number" name="bil1" required>
        <br><br>

        <label>Bilangan 2:</label>
        <input type="number" name="bil2" required>
        <br><br>

        <label>Operator:</label>
        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value=""></option>
            <option value="/">/</option>
        </select>
        <br><br>

        <input type="submit" value="Hitung">
    </form>
</body>
</html>