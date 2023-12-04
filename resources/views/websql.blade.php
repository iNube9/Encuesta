@extends('layouts.app')

@section('title', 'WebSQL 2')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
    <script>
        let db = openDatabase('Tienda', '1.0', 'Tienda en linea', 2 * 1024 * 1024);
        let maxId = 0;

        db.transaction(function (tx) { 
        tx.executeSql('CREATE TABLE IF NOT EXISTS productos (id unique, descripcion, precio, cantidad, review)',[], null, function(){
            alert("Error en la creacion de la tabla");
        });

        tx.executeSql('SELECT MAX(id) as maxId FROM productos', [], function (tx, results) { 
            maxId = parseInt(results.rows.item(0).maxId);      
        }, function(){
            alert("Error en la consulta"+e);
        }); 

        tx.executeSql('SELECT id, descripcion, precio, cantidad, review FROM productos ORDER BY id ASC;', [], function (tx, results) { 
            for (let i = 0; i < results.rows.length; i++) { 
                let p = results.rows.item(i);
                $("#tabla tbody").append("<tr><td>"+p.id+"</td><td>"+p.descripcion+"</td><td>"+p.precio+"</td><td>"+p.cantidad+"</td><td>"+p.review+"</td></tr");
            } 
        }, function(){
            alert("Error en la consulta"+e);
        });
        });

        $(document).ready(function(){
            // Agregar un nuevo registro local
            $("#btnAgregar").click(function(){
                let p = {};
                maxId++;
                p.id = $("#ide").val();
                p.descripcion = $("#descripcion").val();
                p.precio = $("#precio").val();
                p.cantidad = $("#cantidad").val();
                p.review = $("#review").val();
                db.transaction(function (tx){
                    let consulta = 'REPLACE INTO productos (id, descripcion, precio, cantidad, review) '+
                        'VALUES ('+p.id+',"'+p.descripcion+'",'+p.precio+','+p.cantidad+',"'+p.review+'")'
                    console.log(consulta);
                    tx.executeSql(consulta,
                        [],
                        function(tx, results){
                            $("#tabla tbody").append("<tr><td>"+p.id+"</td><td>"+p.descripcion+"</td><td>"+p.precio+"</td><td>"+p.cantidad+"</td><td>"+p.review+"</td></tr");
                            $("#descripcion").val("");
                            $("#precio").val("");
                            $("#cantidad").val("");
                            $("#review").val("");
                        },
                        function(tx, error){
                            console.log("Error sql: "+error.message);
                        }	   			
                    );
                    location.reload() ;
                });
            });
            // Cargar base de datos externa
            $("#btnCargar").click(function(){
                //alert("Cargar");
                fetch('productos/consultar') // Reemplaza '/productos' con la URL de tu ruta Laravel
                .then(response => response.json())
                .then(data => {
                    // data contendrá los datos JSON
                    // Puedes trabajar con los datos aquí, por ejemplo, almacenarlos en una variable
                    var productosArray = data;

                    productosArray.forEach(function(producto) {
                        
                        let p = {};
                        p.id = producto.id;
                        p.descripcion = producto.descripcion;
                        p.precio = producto.precio;
                        p.cantidad = producto.cantidad;
                        p.review = producto.review;
                        db.transaction(function (tx){
                            let consulta = 'REPLACE INTO productos (id, descripcion, precio, cantidad, review) '+
                                'VALUES ('+p.id+',"'+p.descripcion+'",'+p.precio+','+p.cantidad+',"'+p.review+'")'
                            console.log(consulta);
                            tx.executeSql(consulta,
                                [],
                                function(tx, results){
                                    $("#tabla tbody").append("<tr><td>"+p.id+"</td><td>"+p.descripcion+"</td><td>"+p.precio+"</td><td>"+p.cantidad+"</td><td>"+p.review+"</td></tr");
                                    $("#descripcion").val("");
                                    $("#precio").val("");
                                    $("#cantidad").val("");
                                    $("#review").val("");
                                },
                                function(tx, error){
                                    console.log("Error sql: "+error.message);
                                }	   			
                            );
                        });

                    });
                    location.reload() ;
                    //console.log(productosArray);
                })
                .catch(error => {
                    console.error('Hubo un error al obtener los datos: ', error);
                });

            });
            // Subir base de datos local
            $("#btnSubir").click(function(){
                let productosArray = null; 
                db.transaction(function (tx) { 
                    tx.executeSql('SELECT id, descripcion, precio, cantidad, review FROM productos ORDER BY id ASC;', [], function (tx, results) { 
                        for (let i = 0; i < results.rows.length; i++) { 
                            let p = results.rows.item(i);

                            const data = {
                                id: p.id,
                                descripcion: p.descripcion,
                                precio: p.precio,
                                cantidad: p.cantidad,
                                review: p.review,
                            };
                            productosArray = data;

                            // Opciones de configuración para la solicitud POST
                            const requestOptions = {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json', // Contenido JSON
                                },
                                body: JSON.stringify(productosArray), // Convierte los datos a JSON y los envía en el cuerpo de la solicitud
                            };
                            //console.log(JSON.stringify(productosArray));

                            // URL a la que deseas enviar la solicitud POST
                            const url = 'productos/subir';

                            // Realiza la solicitud POST
                            axios.post(url, productosArray)
                            .then(function (response) {
                                console.log('Respuesta del servidor:', response.data);
                            })
                            .catch(function (error) {
                                console.error('Error al enviar datos:', error);
                            });

                            //console.log(data);
                        } 

                            

                    }, function(){
                        alert("Error en la consulta"+e);
                    });
                });
                
            });
        });
	</script>
    <style>
        input{
            width: 100%;
        }
        table{
            margin-top: 50px;
        }
        .cabecera-izquierda{
            width: 79%;
            margin-left: 0px;
            padding-top: 0px;
            display: inline-block;
        }
        .cabecera-derecha{
            width: 20%;
            margin-left: auto;
            margin-right: 0px;
            display: inline-block;
            
        }
        .button-cdg{
            width: 100%;
        }
        .button-cd{
            width: 50%;
        }
        p{
            padding-left: 10px;
            padding-top: 15px;
            font-size: 16px;
        }
    </style>
    <article>
        <div>
            <div class="cabecera-izquierda">

            </div>
            <div class="cabecera-derecha">
                <div class="btn-group button-cdg" role="group" aria-label="Basic example">
                    <button id="btnCargar" type="button" class="btn btn-outline-primary button-cd">Cargar</button>
                    <button id="btnSubir" type="button" class="btn btn-outline-primary button-cd">Subir</button>
                </div>
            </div>
        </div>
        <table id="tabla" class="table table-bordered">
            <thead>
                <tr> 
                    <th>ID</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Review</th>
                    <th>Opciones</th>
                </tr>
                <tr>
                    <th><input type="number" id="ide" class="form-control" min="1"></th>
                    <th><input type="text" id="descripcion" class="form-control"></th>
                    <th><input type="number" id="precio" class="form-control" min="0"></th>
                    <th><input type="number" id="cantidad" steep="1" class="form-control" min="0"></th>
                    <th><input type="text" id="review" class="form-control"></th>
                    <th><button id="btnAgregar" class="btn btn-primary">Agregar</button></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </article>
@endsection