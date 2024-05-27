@extends('adminlte::page')

@section('title', 'Test de Raven')

@section('content_header')
    @vite('resources/css/style.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Inicializar el arreglo de respuestas
        var selectedValues = new Array(60).fill(null);

        // Respuestas correctas
        var correctAnswers = [
            // Serie A
            4, 5, 1, 2, 6, 3, 6, 2, 1, 3, 4, 5,
            // Serie B
            2, 6, 4, 3, 1, 2, 5, 4, 1, 6, 3, 5,
            // Serie C
            2, 4, 3, 5, 1, 2, 6, 3, 4, 1, 5, 2,
            // Serie D
            3, 5, 2, 6, 4, 1, 3, 5, 2, 4, 6, 1,
            // Serie E
            1, 2, 4, 6, 3, 5, 2, 4, 1, 6, 3, 5
        ];

        // Función para actualizar el valor seleccionado
        function updateDropdown(index, value) {
            // Actualizar la respuesta en el arreglo
            selectedValues[index] = parseInt(value); // Convertir a número
        }

        // Función para terminar el test
        function finishTest() {
            // Mostrar el arreglo en la consola
            console.log("Test terminado", selectedValues);

            // Validar las respuestas
            var correctCount = 0;
            for (var i = 0; i < selectedValues.length; i++) {
                if (selectedValues[i] === correctAnswers[i]) {
                    correctCount++;
                }
            }

            // Guardar la puntuación en el backend usando un formulario
            var score = correctCount;
            saveScore(score);
        }

        // Función para guardar la puntuación utilizando un formulario
        // Función para guardar la puntuación y el tiempo utilizado
        function saveScore(score, timeSpent) {
            // Convertir el tiempo transcurrido a una cadena de texto (formato mm:ss)
            var formattedTime = formatTime(timeSpent);

            // Crear un formulario oculto
            var form = document.createElement('form');
            form.action = '{{ route("guardar-nota") }}'; // Usar el nombre de la ruta
            form.method = 'POST';

            // Agregar el token CSRF
            var csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}'; // Obtener el token CSRF
            form.appendChild(csrfInput);

            // Crear un campo de entrada para la puntuación (solo el número de respuestas correctas)
            var scoreInput = document.createElement('input');
            scoreInput.type = 'hidden';
            scoreInput.name = 'score';
            scoreInput.value = score;
            form.appendChild(scoreInput);

            // Crear un campo de entrada para el tiempo utilizado (como cadena de texto)
            var timeInput = document.createElement('input');
            timeInput.type = 'hidden';
            timeInput.name = 'time_spent';
            timeInput.value = formattedTime; // Enviar el tiempo formateado como mm:ss
            form.appendChild(timeInput);

            // Agregar el formulario al cuerpo del documento
            document.body.appendChild(form);

            // Enviar el formulario
            form.submit();
        }

        // Función para formatear el tiempo en minutos y segundos
        function formatTime(seconds) {
            var minutes = Math.floor(seconds / 60);
            var remainderSeconds = seconds % 60;
            return `${minutes}:${remainderSeconds < 10 ? '0' + remainderSeconds : remainderSeconds}`;
        }

        // Función para iniciar el temporizador
        function startTimer(duration) {
            var timer = duration, minutes, seconds;
            var interval = setInterval(function () {
                minutes = Math.floor(timer / 60);
                seconds = timer % 60;

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                document.getElementById('timer').textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(interval);
                    finishTest();
                    alert("El tiempo ha terminado. El test se ha finalizado automáticamente.");
                }
            }, 1000);
        }

        // Mostrar la página seleccionada
        function showPage(page) {
            var pages = document.querySelectorAll('.page');
            for (var i = 0; i < pages.length; i++) {
                pages[i].style.display = (i + 1 === page) ? 'block' : 'none';
            }

            // Actualizar el estado de los botones de paginación
            var pageButtons = document.querySelectorAll('.page-link');
            for (var i = 0; i < pageButtons.length; i++) {
                pageButtons[i].classList.toggle('active', i + 1 === page);
                pageButtons[i].disabled = (i + 1 !== page && i + 1 !== page + 1);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Ocultar todas las páginas excepto la primera
            var pages = document.querySelectorAll('.page');
            for (var i = 1; i < pages.length; i++) {
                pages[i].style.display = 'none';
            }

            // Iniciar el temporizador de 60 minutos
             startTimer(60 * 60);

            // Inicializar la paginación
            showPage(1);
        });
    </script>
@endsection

@section('content')
    <div class="container">
        @php
            // Número total de imágenes
            $totalImages = 60;
            
            // Número de imágenes por página
            $imagesPerPage = 3;
            
            // Número total de páginas
            $totalPages = ceil($totalImages / $imagesPerPage);
        @endphp

        <!-- Temporizador -->
        <div class="text-center mb-3">
            <span id="timer" style="font-size: 1.5rem; color: red;"></span>
        </div>

        @for ($page = 1; $page <= $totalPages; $page++)
            <div class="page">
                <div class="row g-3">
                    @php
                        // Calcular el índice de inicio y fin de las imágenes para la página actual
                        $startIndex = ($page - 1) * $imagesPerPage;
                        $endIndex = min($startIndex + $imagesPerPage, $totalImages);
                    @endphp

                    @for ($i = $startIndex; $i < $endIndex; $i++)
                        <div class="col-12 col-sm-6 col-md-4">
                            <div class="card h-100">
                                <div class="card__preview">
                                    <img src="img/raven/A{{ $i + 1 }}.jpg" class="card-img-top" alt="Imagen {{ $i + 1 }}">
                                </div>
                                <div class="mt-1 mb-2 d-flex justify-content-center">
                                    {{-- <label for="respuesta{{ $i }}">Seleccionar respuesta:</label> --}}
                                    <select id="respuesta{{ $i }}" class="form-select respuesta-selector" style="width: auto;" onchange="updateDropdown({{ $i }}, this.value)">
                                        <option value="">Seleccionar</option>
                                        @if ($page >= 9)  {{-- Recuerda que el índice $i es cero basado, por eso usamos 23 --}}
                                            @for ($j = 1; $j <= 8; $j++)
                                                <option value="{{ $j }}">{{ $j }}</option>
                                            @endfor
                                        @else
                                            @for ($j = 1; $j <= 6; $j++)
                                                <option value="{{ $j }}">{{ $j }}</option>
                                            @endfor
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        @endfor

        <!-- Navegación de página -->
        <div class="text-center mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    @for ($page = 1; $page <= $totalPages; $page++)
                        <li class="page-item">
                            <button class="page-link" onclick="showPage({{ $page }})">{{ $page }}</button>
                        </li>
                    @endfor
                </ul>
            </nav>
        </div>

        <div class="text-center mt-1">
            <button class="btn btn-success" onclick="finishTest()">Terminar</button>
        </div>
    </div>

    <!-- Modal de resultado -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Resultados del Test</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalResultText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
