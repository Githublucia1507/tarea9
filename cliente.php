<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tarea 9 DWES</title>
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
    <div class="container">
        <header>
            <h1>Cat Facts</h1>
        </header>
        <main>
            <?php             
            /**
            * Obtiene un hecho aleatorio sobre gatos desde la API de Cat Facts.
            *
            * @param string $api_url La URL de la API de Cat Facts.
            * @return array Un array asociativo que contiene el hecho sobre gatos.
            */
            function getCatFactPHP($api_url) {
            // Obtiene el contenido JSON desde la API
            $json_data = file_get_contents($api_url);
            // Decodifica el JSON
            return json_decode($json_data, true);
            }
            // URL de la API de Cat Facts
            $api_url = 'https://catfact.ninja/fact';
        
            // Obtiene el hecho inicial
            $data = getCatFactPHP($api_url);
            
            // Muestra el hecho inicial
            echo '<p id="catFact">' . $data['fact'] . '</p>';
            ?>
            <button onclick="getCatFact()">New data</button>
        </main>
    </div>
    <script>
            function getCatFact() {
            // Realiza una solicitud AJAX utilizando JavaScript
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Maneja la respuesta y actualiza el contenido de la página
                    var data = JSON.parse(xhr.responseText);
                    document.getElementById('catFact').innerHTML = data.fact;
                }
            };
            xhr.open('GET', 'https://catfact.ninja/fact', true);
            xhr.send();
        }

        // Llama a getCatFact() al cargar la página para mostrar un dato inicial
        document.addEventListener('DOMContentLoaded', getCatFact);
    </script>
    </body>
</html>
