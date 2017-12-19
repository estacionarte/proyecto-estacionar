@extends('layouts.app')
@section('title') Cargar Estacionamiento @endsection
@section('content')

  <div class="container">

    <div class="bodies-main-content">

      <hr>

      <div class="uploadEstacionamiento-progressBar">
        <div class="uploadEstacionamiento-progressBar-progress2"></div>
      </div>

      <h1>Cargar Estacionamiento - Días y Horarios</h1>

      <section class="uploadEstacionamiento">

        <ul class="upload-estacionamiento-calendar-weekdays">
          <li>Lunes</li>
          <li>Martes</li>
          <li>Miércoles</li>
          <li>Jueves</li>
          <li>Viernes</li>
          <li>Sábado</li>
          <li>Domingo</li>
        </ul>

        <ul class="upload-estacionamiento-calendar-hours">
          <li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li><li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li><li>21</li><li>22</li><li>23</li>
        </ul>

        <div class="form-generico">

          <form action="upload-estacionamiento-1infogeneral.php" method="post" enctype="multipart/form-data" class="form-uploadEstacionamiento">

            <input type="submit" name="boton-submit" value="SIGUIENTE">

          </form>

        </div>

        <div class="upload-div-sideimage"></div>

      </section>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="js/menu.js"></script>

@endsection
