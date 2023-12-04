<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    
@section('content')
<!-- Secciones -->
        <article id="encuesta">
            @if (!empty($secciones))
                @foreach ($secciones as $s)
                    <div class="accordion accordion-flush" id="accordion-{{ $s->Clasificacion }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapse show" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{ $s->Clasificacion }}" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Seccion {{ $s->Clasificacion }}
                                </button>
                            </h2>

                            <!-- Preguntas -->

                            @if (!empty($preguntas))
                                @foreach ($preguntas as $p)
                                    @if ($p->Clasificacion == $s->Clasificacion)
                                        <div id="flush-{{ $s->Clasificacion }}" class="accordion-collapse collapse show" data-bs-parent="#accordionFlush-{{ $s->Clasificacion }}">
                                            <div class="accordion-body">
                                                <p>{{ $p->Numero }}. {{ $p->Pregunta }}</p>
                                                <form class="mi-formulario">
                                                    <div class="alert alert-danger" name="alerta" id="alerta{{ $p->Numero }}" style="display: none;">
                                                        Por favor, responda a la pregunta resaltada antes de continuar.
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ir{{ $p->Numero }}" value="5">
                                                    <label class="form-check-label" for="ir{{ $p->Numero }}">Totalmente de acuerdo</label>
                                                    </div><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ir{{ $p->Numero }}" value="4">
                                                        <label class="form-check-label" for="ir{{ $p->Numero }}">De acuerdo</label>
                                                    </div><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ir{{ $p->Numero }}" value="3">
                                                        <label class="form-check-label" for="ir{{ $p->Numero }}">Indiferente</label>
                                                    </div><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ir{{ $p->Numero }}" value="2">
                                                        <label class="form-check-label" for="ir{{ $p->Numero }}">En desacuerdo</label>
                                                    </div><br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ir{{ $p->Numero }}" value="1">
                                                        <label class="form-check-label" for="ir{{ $p->Numero }}">Totalmente en desacuerdo</label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                    @endif
                                @endforeach
                            @else
                                <p>No hay preguntas</p>
                            @endif
                            <!-- Preguntas -->
                        </div>
                    </div>
                @endforeach
            @else
                <p>No hay secciones</p>
            @endif
            <button type="button" class="btn btn-primary enviar" onclick="verificarFormularios()">Guardar respuestas</button>
        </article>
        <article id="resultados">
            <h4>Hola</h4>
            <p>¡Tu respuesta fue enviada con exito!</p>
            <button type="button" class="btn btn-primary" onclick="borrarValores()">Borrar respuestas</button>
        </article>

        <!-- Local Storage -->

        <script>
            var respuestas = [];
            const cantidad = <?php echo $numero; ?>;
            const registros = <?php echo $registros; ?>;
            //console.log(cantidad);
            //localStorage.setItem("item_name",JSON.stringify(item));

             // Abre todos los acordeones por defecto
            

            function enviar() 
            {
                if(respuestas.length == cantidad)
                {
                    console.log("true");
                    localStorage.setItem("respuestas",JSON.stringify(respuestas));
                    
                    // Almacenar datos en BD
                    for (var i = 0; i < respuestas.length; i++) {
                        console.log(respuestas[i]);
                        var url = '/encuesta/public/enviar/'+(i+1)+'/'+respuestas[i]+'/anonimo'+registros;
                        fetch(url)
                        .then(response => {
                            // Procesa la respuesta aquí
                        })
                        .catch(error => {
                            console.log('lol')
                        });
                    }
                    location.reload();
                } 
                else
                {
                    console.log("false"+": "+respuestas.length+" - "+cantidad);
                }
            }

            function verificarFormularios() {
                for (var i = 0; i < cantidad; i++) 
                {
                    var a = document.getElementById("alerta"+(i+1));
                    a.style.display = "none";
                }

                // Obtener todos los formularios con la clase "mi-formulario"
                var formularios = document.getElementsByClassName("mi-formulario");
                var formularioSinRespuesta = null;
                var numeroPregunta = 0;

                // Verificar si al menos un formulario no tiene una opción seleccionada
                for (var i = 0; i < formularios.length; i++) {
                    var formulario = formularios[i];
                    var opciones = formulario.querySelectorAll('input[name="inlineRadioOptions"]:checked');
                    numeroPregunta = i+1;

                    if (opciones.length === 0) {
                    formularioSinRespuesta = formulario;
                    break; // Detener el bucle si se encuentra un formulario sin respuesta
                    }
                }

                // Obtener la alerta de Bootstrap por su ID
                var alerta = document.getElementById("alerta"+numeroPregunta);

                // Si se encontró un formulario sin respuesta, mostrar la alerta y enfocar el formulario
                if (formularioSinRespuesta !== null) {
                    // Mostrar la alerta de Bootstrap
                    alerta.style.display = "block";
                    
                    // Enfocar el formulario sin respuesta
                    formularioSinRespuesta.scrollIntoView({ behavior: "smooth" });
                    return; // Detener la función si falta al menos una respuesta
                } else {
                    // Si todos los formularios tienen al menos una opción seleccionada, ocultar la alerta
                    alerta.style.display = "none";
                    obtenerValores();
                }
            }

            function obtenerValores() {
                // Obtener todos los formularios con la clase "mi-formulario"
                var formularios = document.getElementsByClassName("mi-formulario");

                // Inicializar un arreglo para almacenar los valores seleccionados por formulario
                var valoresPorFormulario = [];

                // Recorrer los formularios
                for (var i = 0; i < formularios.length; i++) {
                    var formulario = formularios[i];
                    var opciones = formulario.querySelectorAll('input[name="inlineRadioOptions"]:checked');

                    // Inicializar un arreglo para almacenar los valores seleccionados en este formulario
                    var valoresSeleccionados = [];

                    // Recorrer las opciones seleccionadas en este formulario
                    for (var j = 0; j < opciones.length; j++) {
                    valoresSeleccionados.push(opciones[j].value);
                    }

                    // Agregar los valores seleccionados en este formulario al arreglo
                    valoresPorFormulario.push(valoresSeleccionados);
                }

                // Hacer algo con los valores por formulario (en este caso, mostrar en una alerta)
                respuestas = valoresPorFormulario;
                console.log(JSON.stringify(valoresPorFormulario));
                enviar();
            }

            // Comprobamos si el objeto que estamos buscando existe en localStorage
            if (localStorage.getItem('respuestas') === null) 
            {
                // Si el objeto no se encuentra en localStorage, ocultamos el formulario
                var article_res = document.getElementById('resultados'); // Reemplaza 'tuFormulario' con el ID de tu formulario
                article_res.style.display = 'none';
            }
            else
            {
                var article_enc = document.getElementById('encuesta'); // Reemplaza 'tuFormulario' con el ID de tu formulario
                article_enc.style.display = 'none';
            }

            function borrarValores() 
            {
                localStorage.removeItem("respuestas");
                location.reload();
            }

        </script>
@endsection
</body>
</html>