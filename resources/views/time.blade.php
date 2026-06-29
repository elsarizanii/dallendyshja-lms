<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Përshëndetje</title>

    <style>
        #pershendetja {
            font-size: 36px;
            color: #2c3e50;
            padding: 20px;
            text-align: center;
            background-color: #f4f4f4;
            border-radius: 10px;
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1 id="pershendetja"></h1>

    <script>
        const ora = new Date().getHours();
        const elementi = document.getElementById("pershendetja");

        if (ora < 12) {
            elementi.innerText = "Mirëmëngjes";
        } else {
            elementi.innerText = "Mirëmbrëma";
        }
    </script>

</body>
</html>