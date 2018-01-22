@if ($estadiaEnMinutos)
  <h2>Estadia en minutos: {{$estadiaEnMinutos}}</h2>
@else
  <h2>Nada</h2>
@endif

@if ($disponibleMinYMax)
  <h2>Disponible Min y Max</h2>
@else
  <h2>No disponible Min y Max</h2>
@endif

@if ($disponibleDiasYHorarios)
  <h2>Disponible en Días y Horarios</h2>
@else
  <h2>No disponible en Días y Horarios</h2>
@endif

@if ($disponibleAlquileres)
  <h2>Disponible porque no hay otros alquileres durante el tiempo solicitado</h2>
@else
  <h2>No disponible por otros alquileres</h2>
@endif

@if ($disponibleTodo)
  <h2>Todo disponible</h2>
@else
  <h2>No disponible</h2>
@endif
