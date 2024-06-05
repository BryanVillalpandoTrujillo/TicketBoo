<!DOCTYPE html>
<html>
<head>
    <title>Clima en Leon, Guanajuato</title>
    <script>
        function obtenerClima() {
            const latitud = 21.12;
            const longitud = -101.68;
            const url = `https://api.open-meteo.com/v1/forecast?latitude=${latitud}&longitude=${longitud}&current_weather=true&timezone=America%2FMexico_City`; // Zona horaria de Le�n

            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const temperatura = Math.round(data.current_weather.temperature);
                    const codigoClima = data.current_weather.weathercode;
                    const descripcionClima = obtenerDescripcionClima(codigoClima);

                    document.getElementById("temperatura").textContent = temperatura + "°C";
                    document.getElementById("descripcion").textContent = descripcionClima;
                })
                .catch(error => {
                    console.error("Error al obtener el clima:", error);
                    document.getElementById("temperatura").textContent = "Error";
                    document.getElementById("descripcion").textContent = "No disponible";
                });
        }

        function obtenerDescripcionClima(codigo) {
            const codigosDescripcion = {
                0: "Cielo despejado",
                1: "Parcialmente nublado",
                2: "Nublado",
                3: "Lluvia ligera",
                // ... (Agregar m�s c�digos y descripciones seg�n la documentaci�n de la API)
            };
            return codigosDescripcion[codigo] || "Desconocido";
        }

        window.onload = obtenerClima;
    </script>
</head>
<body>
    <div class="clima-container">
        <h6>Clima en Leon, Guanajuato</h6>
        <p id="temperatura"></p>
        <p id="descripcion"></p>
    </div>
</body>
</html>
