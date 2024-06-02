<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Venta de Restaurante</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Control de Venta de Restaurante</h1>

    <!-- Select para seleccionar producto -->
    <label for="productoSelect">Seleccione un producto:</label>
    <select id="productoSelect">
        <option value="producto1" data-precio="10.0">Producto 1 - $10.00</option>
        <option value="producto2" data-precio="15.0">Producto 2 - $15.00</option>
        <option value="producto3" data-precio="20.0">Producto 3 - $20.00</option>
        <!-- Agrega más productos aquí -->
    </select>
    <button onclick="agregarProducto()">Agregar</button>

    <!-- Tabla de productos agregados -->
    <table id="tablaProductos">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <!-- Las filas de productos se agregarán aquí -->
        </tbody>
    </table>

    <!-- Texto que muestra el total de la compra -->
    <h2>Total de la compra: $<span id="totalCompra">0.00</span></h2>

    <script>
        function agregarProducto() {
            // Obtener el producto seleccionado y su precio
            const select = document.getElementById('productoSelect');
            const selectedOption = select.options[select.selectedIndex];
            const producto = selectedOption.text;
            const precio = parseFloat(selectedOption.getAttribute('data-precio'));

            // Crear una nueva fila en la tabla
            const tabla = document.getElementById('tablaProductos').getElementsByTagName('tbody')[0];
            const nuevaFila = tabla.insertRow();

            // Insertar celdas en la fila
            const celdaProducto = nuevaFila.insertCell(0);
            const celdaPrecio = nuevaFila.insertCell(1);
            const celdaCantidad = nuevaFila.insertCell(2);
            const celdaTotal = nuevaFila.insertCell(3);

            // Rellenar las celdas con información
            celdaProducto.textContent = producto;
            celdaPrecio.textContent = precio.toFixed(2);

            // Crear un input para la cantidad
            const inputCantidad = document.createElement('input');
            inputCantidad.type = 'number';
            inputCantidad.value = 1;
            inputCantidad.min = 1;
            inputCantidad.oninput = function() {
                actualizarTotal(this);
            };
            celdaCantidad.appendChild(inputCantidad);

            // Calcular el total para esta fila
            const totalFila = precio * inputCantidad.value;
            celdaTotal.textContent = totalFila.toFixed(2);

            // Actualizar el total de la compra
            actualizarTotalCompra();
        }

        function actualizarTotal(input) {
            const fila = input.parentElement.parentElement;
            const precio = parseFloat(fila.cells[1].textContent);
            const cantidad = parseInt(input.value);
            const total = precio * cantidad;

            fila.cells[3].textContent = total.toFixed(2);

            // Actualizar el total de la compra
            actualizarTotalCompra();
        }

        function actualizarTotalCompra() {
            const tabla = document.getElementById('tablaProductos').getElementsByTagName('tbody')[0];
            let totalCompra = 0;

            for (let i = 0; i < tabla.rows.length; i++) {
                totalCompra += parseFloat(tabla.rows[i].cells[3].textContent);
            }

            document.getElementById('totalCompra').textContent = totalCompra.toFixed(2);
        }
    </script>
</body>
</html>