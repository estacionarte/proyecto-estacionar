@extends('layouts.app')
@section('title') Cargar Espacio @endsection
@section('content')

  <div class="bodies-main-content upload-espacio">
    <div class="gral-main">
      <h1>Cargar Espacio - Precio <small>Paso 4 de 4</small></h1>
      <section class="signin upload">
        <div class="progress uploadEspacio-progressBar">
            <div class="determinate" style="width: 80%"></div>
        </div>

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <p style="color: #990606;"> {{ $error }} </p>
          @endforeach
        @endif

          <form action="{{ route('insert.upload.espacio.resumen', $espacio) }}" method="post" class="form-uploadEspacio form-reducido">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="row">
              <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                <h3>¿Cuál va a ser el valor por hora de tu espacio?</h3>
              </div>
              <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                {{-- <input type="text" placeholder="0,75" name="precioPorMinuto" class="upload-input-precioPorMinuto" value="{{ old('precioPorMinuto', $espacio->precioAutosMinuto) }}"> --}}
                <select name="precioPorHora" class="upload-input-precioPorMinuto" required>
                  <option value="">Precio</option>
                  <option value=10 {{ old('precioPorHora', $espacio->precioAutosMinuto) == floor(10/60*100)/100 ? 'selected':'' }}>10</option>
                  <option value=20 {{ old('precioPorHora', $espacio->precioAutosMinuto) == floor(20/60*100)/100 ? 'selected':'' }}>20</option>
                  <option value=40 {{ old('precioPorHora', $espacio->precioAutosMinuto) == floor(40/60*100)/100 ? 'selected':'' }}>40</option>
                  <option value=60 {{ old('precioPorHora', $espacio->precioAutosMinuto) == floor(60/60*100)/100 ? 'selected':'' }}>60</option>
                </select>
                <label for="" class="upload-label-precioPorMinuto">por hora</label>
              </div>
              <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                <h3>¿Cuál va a ser el descuento para alquileres prolongados?</h3>
              </div>
              <div class="col s4 offset-s1 m3 offset-m1 marginb">
                {{-- <input type="number" placeholder="20" name="descuentoPorMinutoHora" class="upload-input-descuentoPorMinuto" value="{{ old('descuentoPorMinutoHora', $espacio->descuentos()->where('hora',1)->first() ? $espacio->getDescuento(1)*100 : '') }}"> --}}
                {{ old('precioAutosMinuto', $espacio->precioAutosMinuto) == 10/60 ? 'selected':'' }}
                <select name="descuentoPorHoraHora" class="upload-input-descuentoPorMinuto" required>
                  <option value="">Descuento</option>
                  <option value="0" {{ old('descuentoPorHoraHora', $espacio->descuentos()->where('hora',1)->first() && $espacio->getDescuento(1) == '0' ? 'selected' : '') }}>0</option>
                  <option value=0.20  {{ old('descuentoPorHoraHora', $espacio->descuentos()->where('hora',1)->first() && $espacio->getDescuento(1) == '0.20' ? 'selected' : '') }}>20</option>
                  <option value=0.30 {{ old('descuentoPorHoraHora', $espacio->descuentos()->where('hora',1)->first() && $espacio->getDescuento(1) == '0.30' ? 'selected' : '') }}>30</option>
                  <option value=0.40 {{ old('descuentoPorHoraHora', $espacio->descuentos()->where('hora',1)->first() && $espacio->getDescuento(1) == '0.40' ? 'selected' : '') }}>40</option>
                  <option value=0.50 {{ old('descuentoPorHoraHora', $espacio->descuentos()->where('hora',1)->first() && $espacio->getDescuento(1) == '0.50' ? 'selected' : '') }}>50</option>
                </select>
              </div>
              <div class="col s7 m7 mostrar-valor">
                <p class="upload-p-descuentoPorMinuto">Precio por hora con descuento: $<b id="precioHora">0</b></p>
              </div>
              <div class="col s10 offset-s1 separador">
                <label class="upload-label-descuentoPorMinuto">% a partir de la hora</label>
              </div>
              <div class="col s4 offset-s1 m3 offset-m1 marginb">
                {{-- <input type="number" placeholder="35" name="descuentoPorMinutoSeisHoras" class="upload-input-descuentoPorMinuto" value="{{ old('descuentoPorMinutoSeisHoras', $espacio->descuentos()->where('hora',6)->first() ? $espacio->getDescuento(6)*100 : '') }}"> --}}
                <select name="descuentoPorHoraSeisHoras" class="upload-input-descuentoPorMinuto" required>
                  <option value="">Descuento</option>
                  <option value=0.20 {{ old('descuentoPorHoraSeisHoras', $espacio->descuentos()->where('hora',6)->first() && $espacio->getDescuento(6) == '0.20' ? 'selected' : '') }}>20</option>
                  <option value=0.30 {{ old('descuentoPorHoraSeisHoras', $espacio->descuentos()->where('hora',6)->first() && $espacio->getDescuento(6) == '0.30' ? 'selected' : '') }}>30</option>
                  <option value=0.40 {{ old('descuentoPorHoraSeisHoras', $espacio->descuentos()->where('hora',6)->first() && $espacio->getDescuento(6) == '0.40' ? 'selected' : '') }}>40</option>
                  <option value=0.50 {{ old('descuentoPorHoraSeisHoras', $espacio->descuentos()->where('hora',6)->first() && $espacio->getDescuento(6) == '0.50' ? 'selected' : '') }}>50</option>
                  <option value=0.60 {{ old('descuentoPorHoraSeisHoras', $espacio->descuentos()->where('hora',6)->first() && $espacio->getDescuento(6) == '0.60' ? 'selected' : '') }}>60</option>
                </select>
              </div>
              <div class="col s7 m7 mostrar-valor">
                <p class="upload-p-descuentoPorMinuto">Precio cada 6 horas con descuento: $<b id="precioSeisHoras">0</b></p>
              </div>
              <div class="col s10 offset-s1 separador">
                <label for="" class="upload-label-descuentoPorMinuto">% a partir de 6 horas</label>
              </div>
              <div class="col s4 offset-s1 m3 offset-m1 marginb">
                {{-- <input type="number" placeholder="70" name="descuentoPorMinutoDia" class="upload-input-descuentoPorMinuto" value="{{ old('descuentoPorMinutoDia', $espacio->descuentos()->where('hora',24)->first() ? $espacio->getDescuento(24)*100 : '') }}"> --}}
                <select name="descuentoPorHoraDia" class="upload-input-descuentoPorMinuto" required>
                  <option value="">Descuento</option>
                  <option value=0.30 {{ old('descuentoPorHoraDia', $espacio->descuentos()->where('hora',1)->first() && $espacio->getDescuento(24) == '0.30' ? 'selected' : '') }}>30</option>
                  <option value=0.40 {{ old('descuentoPorHoraDia', $espacio->descuentos()->where('hora',1)->first() && $espacio->getDescuento(24) == '0.40' ? 'selected' : '') }}>40</option>
                  <option value=0.50 {{ old('descuentoPorHoraDia', $espacio->descuentos()->where('hora',1)->first() && $espacio->getDescuento(24) == '0.50' ? 'selected' : '') }}>50</option>
                  <option value=0.60 {{ old('descuentoPorHoraDia', $espacio->descuentos()->where('hora',1)->first() && $espacio->getDescuento(24) == '0.60' ? 'selected' : '') }}>60</option>
                  <option value=0.70 {{ old('descuentoPorHoraDia', $espacio->descuentos()->where('hora',1)->first() && $espacio->getDescuento(24) == '0.70' ? 'selected' : '') }}>70</option>
                  <option value=0.80 {{ old('descuentoPorHoraDia', $espacio->descuentos()->where('hora',1)->first() && $espacio->getDescuento(24) == '0.80' ? 'selected' : '') }}>80</option>
                </select>
              </div>
              <div class="col s7 m7 mostrar-valor">
                <p class="upload-p-descuentoPorMinuto">Precio por día con descuento: $<b id="precioDia">0</b></p>
              </div>
              <div class="col s10 offset-s1 separador">
                <label for="" class="upload-label-descuentoPorMinuto">% a partir del día</label>
              </div>

                <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                  <h3>Calcular mis ganancias</h3>
                </div>
                <div class="col s2 offset-s1">
                  <label for="">Días:</label><input type="number" min=0 max=60 value=0 id="dias-calculadora">
                </div>
                <div class="col s2">
                  <label for="">Horas:</label><input type="number" min=0 max=23 value=3 id="horas-calculadora">
                </div>
                <div class="col s2">
                  <label for="">Minutos:</label><input type="number" min=0 max=59 value=30 id="minutos-calculadora">
                </div>
                <div class="col s10 offset-s1">
                  <p>Por recibir un auto durante <span id="dias-resultado">0</span> dias, <span id="horas-resultado">3</span> horas y <span id="minutos-resultado">30</span> minutos recibirás $<span id="ganancia-resultado"></span>.</p>
                </div>

                <div class="col s5 left-align boton">
                    <button class="btn waves-effect waves-light  teal lighten-3" type="submit" name="boton-volver" formaction="{{ route('upload.espacio.3', $espacio) }}" formmethod="get">Volver
                        <i class="material-icons left">arrow_back</i>
                    </button>
                </div>
                <div class="col s5 offset-s1 right-align boton">
                    <button class="btn waves-effect waves-light  red darken-2" type="submit" name="boton-submit">SIGUIENTE
                        <i class="material-icons right">send</i>
                    </button>
                </div>

            </form>

                <div class="col s10 offset-s1 upload-section-div-help">
                  <p>Los descuentos se recomiendan para promover alquileres de mayor duración.</p>
                </div>
        </div>

        <div class="upload-div-sideimage4"></div>

      </section>
      <div class="clear"></div>
    </div>
  </div>

@endsection

@section('scripts')
  <script>
      // SELECT DE FORMULARIO
        $(document).ready(function() {
          $('select').material_select();
        });
  </script>
  <script src="{{ URL::asset('js/upload-espacio/4precios.js')}}"></script>
@endsection
