<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>api</title>

</head>

<body>
    <h2>JavaScript Geolocation</h2>

    <p>Click the button to get your coordinates.</p>
    <input type="number" id="id1" min="100" max="300" required>
    <button onclick="myFunction()">OK</button>
    <p>If the number is less than 100 or greater than 300, an error message will be displayed.</p>
    <p id="demo"></p>

    <script>
        function myFunction() {
            const inpObj = document.getElementById("id1");
            if (!inpObj.checkValidity()) {
                document.getElementById("demo").innerHTML = inpObj.validationMessage;
            } else {
                document.getElementById("demo").innerHTML = "Input OK";
            }
        }
        // const x = document.getElementById("demo");

        // function getLocation() {
        //     try {
        //         navigator.geolocation.getCurrentPosition(showPosition);
        //     } catch {
        //         x.innerHTML = err;
        //     }
        // }

        // function showPosition(position) {
        //     x.innerHTML = "Latitude: " + position.coords.latitude +
        //         "<br>Longitude: " + position.coords.longitude;
        // }
    </script>
</body>

</html>