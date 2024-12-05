<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Лабораторная работа №4</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Лабораторная работа №4</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <form class="form-inline ml-auto">
                <input class="form-control mr-sm-2" type="text" placeholder="Поиск" aria-label="Поиск">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Поиск</button>
            </form>
        </div>
    </nav>


<h1>Проверка бензина для поездки</h1>
<form id="fuelForm">
    <label for="distance">Длина пути (км):</label><br>
    <input type="number" id="distance" required><br>

    <label for="fuelAmount">Количество бензина в баке (л):</label><br>
    <input type="number" id="fuelAmount" required><br>

    <label for="fuelConsumption">Расход бензина на 1 км (л):</label><br>
    <input type="number" id="fuelConsumption" required><br>

    <button type="submit">Проверить</button>
</form>

<div class="result" id="result"></div>

<script>
    document.getElementById('fuelForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const distance = parseFloat(document.getElementById('distance').value);
        const fuelAmount = parseFloat(document.getElementById('fuelAmount').value);
        const fuelConsumption = parseFloat(document.getElementById('fuelConsumption').value);

        // Рассчитываем необходимое количество бензина
        const requiredFuel = distance * fuelConsumption;

        // Проверяем, достаточно ли бензина
        let resultText;
        if (fuelAmount >= requiredFuel) {
            resultText = "Достаточно бензина для поездки.";
        } else {
            resultText = "Недостаточно бензина для поездки.";
        }

        document.getElementById('result').innerText = resultText;
    });
</script>

</body>
</html>