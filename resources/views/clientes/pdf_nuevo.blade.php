<html>
<head>
  <style>
    @page { margin: 100px 25px; }
    header { position: fixed; top: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    footer { position: fixed; bottom: -60px; left: 0px; right: 0px; height: 50px; }
    p { page-break-after: always; }
    p:last-child { page-break-after: never; }

    html {
  font-family: sans-serif;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
}
body {
  margin: 0;
}
table{
	font-size: 11px;
}
b,
strong {
  font-weight: bold;
}
h1 {
  font-size: 2em;
  margin: 0.67em 0;
}
img {
  border: 0;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}
td,
th {
  padding: 0;
}
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html {
  font-size: 10px;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  line-height: 1.42857143;
  color: #333333;
  background-color: #ffffff;
}

img {
  vertical-align: middle;
}
.row {
  margin-left: -15px;
  margin-right: -15px;
}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
  position: relative;
  min-height: 1px;
  padding-left: 15px;
  padding-right: 15px;
}
.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
  float: left;
}
.col-xs-12 {
  width: 100%;
}
.col-xs-11 {
  width: 91.66666667%;
}
.col-xs-10 {
  width: 83.33333333%;
}
.col-xs-9 {
  width: 75%;
}
.col-xs-8 {
  width: 66.66666667%;
}
.col-xs-7 {
  width: 58.33333333%;
}
.col-xs-6 {
  width: 50%;
}
.col-xs-5 {
  width: 41.66666667%;
}
.col-xs-4 {
  width: 33.33333333%;
}
.col-xs-3 {
  width: 25%;
}
.col-xs-2 {
  width: 16.66666667%;
}
.col-xs-1 {
  width: 8.33333333%;
}
.col-xs-pull-12 {
  right: 100%;
}
.col-xs-pull-11 {
  right: 91.66666667%;
}
.col-xs-pull-10 {
  right: 83.33333333%;
}
.col-xs-pull-9 {
  right: 75%;
}
.col-xs-pull-8 {
  right: 66.66666667%;
}
.col-xs-pull-7 {
  right: 58.33333333%;
}
.col-xs-pull-6 {
  right: 50%;
}
.col-xs-pull-5 {
  right: 41.66666667%;
}
.col-xs-pull-4 {
  right: 33.33333333%;
}
.col-xs-pull-3 {
  right: 25%;
}
.col-xs-pull-2 {
  right: 16.66666667%;
}
.col-xs-pull-1 {
  right: 8.33333333%;
}
.col-xs-pull-0 {
  right: auto;
}
.col-xs-push-12 {
  left: 100%;
}
.col-xs-push-11 {
  left: 91.66666667%;
}
.col-xs-push-10 {
  left: 83.33333333%;
}
.col-xs-push-9 {
  left: 75%;
}
.col-xs-push-8 {
  left: 66.66666667%;
}
.col-xs-push-7 {
  left: 58.33333333%;
}
.col-xs-push-6 {
  left: 50%;
}
.col-xs-push-5 {
  left: 41.66666667%;
}
.col-xs-push-4 {
  left: 33.33333333%;
}
.col-xs-push-3 {
  left: 25%;
}
.col-xs-push-2 {
  left: 16.66666667%;
}
.col-xs-push-1 {
  left: 8.33333333%;
}
.col-xs-push-0 {
  left: auto;
}
.col-xs-offset-12 {
  margin-left: 100%;
}
.col-xs-offset-11 {
  margin-left: 91.66666667%;
}
.col-xs-offset-10 {
  margin-left: 83.33333333%;
}
.col-xs-offset-9 {
  margin-left: 75%;
}
.col-xs-offset-8 {
  margin-left: 66.66666667%;
}
.col-xs-offset-7 {
  margin-left: 58.33333333%;
}
.col-xs-offset-6 {
  margin-left: 50%;
}
.col-xs-offset-5 {
  margin-left: 41.66666667%;
}
.col-xs-offset-4 {
  margin-left: 33.33333333%;
}
.col-xs-offset-3 {
  margin-left: 25%;
}
.col-xs-offset-2 {
  margin-left: 16.66666667%;
}
.col-xs-offset-1 {
  margin-left: 8.33333333%;
}
.col-xs-offset-0 {
  margin-left: 0%;
}
table {
  background-color: transparent;
}
th {
  text-align: left;
}
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 20px;
}
.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #dddddd;
}
.table > thead > tr > th {
  vertical-align: bottom;
  border-bottom: 2px solid #dddddd;
}
.table > caption + thead > tr:first-child > th,
.table > colgroup + thead > tr:first-child > th,
.table > thead:first-child > tr:first-child > th,
.table > caption + thead > tr:first-child > td,
.table > colgroup + thead > tr:first-child > td,
.table > thead:first-child > tr:first-child > td {
  border-top: 0;
}
.table > tbody + tbody {
  border-top: 2px solid #dddddd;
}
.table .table {
  background-color: #ffffff;
}
.table-bordered {
  border: 1px solid #dddddd;
}
.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
  border: 1px solid #dddddd;
}
.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
  border-bottom-width: 2px;
}
.table-striped > tbody > tr:nth-of-type(odd) {
  background-color: #f9f9f9;
}
.table-hover > tbody > tr:hover {
  background-color: #f5f5f5;
}
table td[class*="col-"],
table th[class*="col-"] {
  position: static;
  float: none;
  display: table-cell;
}

.panel {
  margin-bottom: 20px;
  background-color: #ffffff;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
}
.panel-body {
  padding: 15px;
}
.panel-heading {
  padding: 10px 15px;
  border-bottom: 1px solid transparent;
  border-top-right-radius: 3px;
  border-top-left-radius: 3px;
}
.panel > .table,
.panel > .table-responsive > .table,
.panel > .panel-collapse > .table {
  margin-bottom: 0;
}
.panel > .table caption,
.panel > .table-responsive > .table caption,
.panel > .panel-collapse > .table caption {
  padding-left: 15px;
  padding-right: 15px;
}
.panel > .table:first-child,
.panel > .table-responsive:first-child > .table:first-child {
  border-top-right-radius: 3px;
  border-top-left-radius: 3px;
}
.panel > .table:first-child > thead:first-child > tr:first-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child,
.panel > .table:first-child > tbody:first-child > tr:first-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child {
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.panel > .table:first-child > thead:first-child > tr:first-child td:first-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:first-child,
.panel > .table:first-child > tbody:first-child > tr:first-child td:first-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:first-child,
.panel > .table:first-child > thead:first-child > tr:first-child th:first-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:first-child,
.panel > .table:first-child > tbody:first-child > tr:first-child th:first-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:first-child {
  border-top-left-radius: 3px;
}
.panel > .table:first-child > thead:first-child > tr:first-child td:last-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:last-child,
.panel > .table:first-child > tbody:first-child > tr:first-child td:last-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:last-child,
.panel > .table:first-child > thead:first-child > tr:first-child th:last-child,
.panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:last-child,
.panel > .table:first-child > tbody:first-child > tr:first-child th:last-child,
.panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:last-child {
  border-top-right-radius: 3px;
}
.panel > .table:last-child,
.panel > .table-responsive:last-child > .table:last-child {
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
}
.panel > .table:last-child > tbody:last-child > tr:last-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child {
  border-bottom-left-radius: 3px;
  border-bottom-right-radius: 3px;
}
.panel > .table:last-child > tbody:last-child > tr:last-child td:first-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:first-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child td:first-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:first-child,
.panel > .table:last-child > tbody:last-child > tr:last-child th:first-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:first-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child th:first-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:first-child {
  border-bottom-left-radius: 3px;
}
.panel > .table:last-child > tbody:last-child > tr:last-child td:last-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:last-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child td:last-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:last-child,
.panel > .table:last-child > tbody:last-child > tr:last-child th:last-child,
.panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:last-child,
.panel > .table:last-child > tfoot:last-child > tr:last-child th:last-child,
.panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:last-child {
  border-bottom-right-radius: 3px;
}
.panel > .panel-body + .table,
.panel > .panel-body + .table-responsive,
.panel > .table + .panel-body,
.panel > .table-responsive + .panel-body {
  border-top: 1px solid #dddddd;
}
.panel > .table > tbody:first-child > tr:first-child th,
.panel > .table > tbody:first-child > tr:first-child td {
  border-top: 0;
}
.panel > .table-bordered,
.panel > .table-responsive > .table-bordered {
  border: 0;
}
.panel > .table-bordered > thead > tr > th:first-child,
.panel > .table-responsive > .table-bordered > thead > tr > th:first-child,
.panel > .table-bordered > tbody > tr > th:first-child,
.panel > .table-responsive > .table-bordered > tbody > tr > th:first-child,
.panel > .table-bordered > tfoot > tr > th:first-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > th:first-child,
.panel > .table-bordered > thead > tr > td:first-child,
.panel > .table-responsive > .table-bordered > thead > tr > td:first-child,
.panel > .table-bordered > tbody > tr > td:first-child,
.panel > .table-responsive > .table-bordered > tbody > tr > td:first-child,
.panel > .table-bordered > tfoot > tr > td:first-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > td:first-child {
  border-left: 0;
}
.panel > .table-bordered > thead > tr > th:last-child,
.panel > .table-responsive > .table-bordered > thead > tr > th:last-child,
.panel > .table-bordered > tbody > tr > th:last-child,
.panel > .table-responsive > .table-bordered > tbody > tr > th:last-child,
.panel > .table-bordered > tfoot > tr > th:last-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > th:last-child,
.panel > .table-bordered > thead > tr > td:last-child,
.panel > .table-responsive > .table-bordered > thead > tr > td:last-child,
.panel > .table-bordered > tbody > tr > td:last-child,
.panel > .table-responsive > .table-bordered > tbody > tr > td:last-child,
.panel > .table-bordered > tfoot > tr > td:last-child,
.panel > .table-responsive > .table-bordered > tfoot > tr > td:last-child {
  border-right: 0;
}
.panel > .table-bordered > thead > tr:first-child > td,
.panel > .table-responsive > .table-bordered > thead > tr:first-child > td,
.panel > .table-bordered > tbody > tr:first-child > td,
.panel > .table-responsive > .table-bordered > tbody > tr:first-child > td,
.panel > .table-bordered > thead > tr:first-child > th,
.panel > .table-responsive > .table-bordered > thead > tr:first-child > th,
.panel > .table-bordered > tbody > tr:first-child > th,
.panel > .table-responsive > .table-bordered > tbody > tr:first-child > th {
  border-bottom: 0;
}
.panel > .table-bordered > tbody > tr:last-child > td,
.panel > .table-responsive > .table-bordered > tbody > tr:last-child > td,
.panel > .table-bordered > tfoot > tr:last-child > td,
.panel > .table-responsive > .table-bordered > tfoot > tr:last-child > td,
.panel > .table-bordered > tbody > tr:last-child > th,
.panel > .table-responsive > .table-bordered > tbody > tr:last-child > th,
.panel > .table-bordered > tfoot > tr:last-child > th,
.panel > .table-responsive > .table-bordered > tfoot > tr:last-child > th {
  border-bottom: 0;
}
.panel > .table-responsive {
  border: 0;
  margin-bottom: 0;
}
.panel-group {
  margin-bottom: 20px;
}
.panel-group .panel {
  margin-bottom: 0;
  border-radius: 4px;
}
.panel-group .panel + .panel {
  margin-top: 5px;
}
.panel-group .panel-heading {
  border-bottom: 0;
}
.panel-group .panel-heading + .panel-collapse > .panel-body,
.panel-group .panel-heading + .panel-collapse > .list-group {
  border-top: 1px solid #dddddd;
}
.panel-group .panel-footer {
  border-top: 0;
}
.panel-group .panel-footer + .panel-collapse .panel-body {
  border-bottom: 1px solid #dddddd;
}
.panel-default {
  border-color: #dddddd;
}
.panel-default > .panel-heading {
  color: #333333;
  background-color: #f5f5f5;
  border-color: #dddddd;
}
.panel-default > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #dddddd;
}
.panel-default > .panel-heading .badge {
  color: #f5f5f5;
  background-color: #333333;
}
.panel-default > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #dddddd;
}
.panel-primary {
  border-color: #337ab7;
}
.panel-primary > .panel-heading {
  color: #ffffff;
  background-color: #337ab7;
  border-color: #337ab7;
}
.panel-primary > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #337ab7;
}
.panel-primary > .panel-heading .badge {
  color: #337ab7;
  background-color: #ffffff;
}
.panel-primary > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #337ab7;
}
.panel-success {
  border-color: #d6e9c6;
}
.panel-success > .panel-heading {
  color: #3c763d;
  background-color: #dff0d8;
  border-color: #d6e9c6;
}
.panel-success > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #d6e9c6;
}
.panel-success > .panel-heading .badge {
  color: #dff0d8;
  background-color: #3c763d;
}
.panel-success > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #d6e9c6;
}
.panel-info {
  border-color: #bce8f1;
}
.panel-info > .panel-heading {
  color: #31708f;
  background-color: #d9edf7;
  border-color: #bce8f1;
}
.panel-info > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #bce8f1;
}
.panel-info > .panel-heading .badge {
  color: #d9edf7;
  background-color: #31708f;
}
.panel-info > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #bce8f1;
}
.panel-warning {
  border-color: #faebcc;
}
.panel-warning > .panel-heading {
  color: #8a6d3b;
  background-color: #fcf8e3;
  border-color: #faebcc;
}
.panel-warning > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #faebcc;
}
.panel-warning > .panel-heading .badge {
  color: #fcf8e3;
  background-color: #8a6d3b;
}
.panel-warning > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #faebcc;
}
.panel-danger {
  border-color: #ebccd1;
}
.panel-danger > .panel-heading {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
}
.panel-danger > .panel-heading + .panel-collapse > .panel-body {
  border-top-color: #ebccd1;
}
.panel-danger > .panel-heading .badge {
  color: #f2dede;
  background-color: #a94442;
}
.panel-danger > .panel-footer + .panel-collapse > .panel-body {
  border-bottom-color: #ebccd1;
}
.clearfix:before,
.clearfix:after,
.dl-horizontal dd:before,
.dl-horizontal dd:after,
.container:before,
.container:after,
.container-fluid:before,
.container-fluid:after,
.row:before,
.row:after,
.panel-body:before,
.panel-body:after {
  content: " ";
  display: table;
}
.clearfix:after,
.dl-horizontal dd:after,
.container:after,
.container-fluid:after,
.row:after,
.panel-body:after {
  clear: both;
}
.img{
	width:100%;
	height: 100%;
}
  </style>
</head>
<body>
  <header><img class="img" src="img/header2.jpg"></header>
  {{-- FOOTER --}}
  <footer>
      <div class="row">
          {{-- FOOTER IZQUIERDO --}}
            <div class="col-xs-6">
                ASOCIADO: {{$empleado->nombre . " " . $empleado->appaterno . " " . $empleado->apmaterno}}<br>
                CEL: {{$empleado->movil}}<br>
                E-MAIL: {{$empleado->email}}<br>
            </div>
          {{-- FOOTER DERECHO --}}
            <div class="col-xs-6">
                ARBYS PERICENTRO PLAZA DE LA TECNOLOGIA<br>
                LOCAL B39 COL. LOMAS DE SOTELO EDO DE MEX<br>
                TEL: 51627031 - 51627142<br>
            </div>
      </div>
  </footer>
  <main>
      {{-- SALUDO --}}
        <div class="panel panel-default">
            <div class="panel-heading">¡Hola {{$cliente->nombre ? $cliente->nombre." ".$cliente->appaterno." ".$cliente->apmaterno : $cliente->razon}} !</div>
            <div class="panel-body">
                Aprovecho esta oportunidad para agradecerle nuevamente 
                su contacto y ayudarle con su solicitud de información 
                sobre las versiones de 
                <strong>
                  {{ $producto->marca . " " }}
                  {{ $producto->descripcion . " " }}
                  {{ $producto->categoria ? $producto->categoria . " " : "" }}
                  {{ $producto->tipo_moto ? $producto->tipo_moto . " " : "" }}
                </strong>
                <br><br>

                Es un placer para mi poder apoyarle en la selección de 
                las mejores opciones para que cumpla con sus necesidades. <br><br>
                
                Por favor no dude en llamarme en cualquier momento. Mi 
                agenda está abierta y flexible para usted. Sería recomendable 
                que usted se ponga en contacto conmigo antes de su llegada a 
                nuestras instalaciones, para que pueda atenderlo como usted se 
                lo merece y disfrute de la  experiencia de estrenar la motocicleta 
                de su agrado. <br><br>
                
                Cualquier información que necesite o comentario que me quiera 
                hacer por favor tome en cuenta que estoy a sus órdenes. <br><br>

                ¡Gracias por permitirnos atenderle!<br>
                Excelente Día.<br>
            </div>
            <div class="panel-body">
              <span>{{$mensaje}}</span>
              <h3 class="text-center">¡En Arbys te queremos ayudar!</h3>
            </div>
        </div>
        </div>
        {{-- Página 2 --}}
        <p>
            <div class="panel panel-default">
                <div class="panel-heading">Fecha: {{date('d-m-Y')}}</div>
                <div class="panel-body">
                    Estimado {{$cliente->nombre ? $cliente->nombre." ".$cliente->appaterno." ".$cliente->apmaterno : $cliente->razon}}:  <br>
                    Le presentamos nuestra oferta comercial para {{$producto->tipo == "CARRO" ? 'el carro ' : 'la moto'}} de su interés.
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Cotización</div>
                <div class="panel-body">
                    {{-- PRODUCTO Y MARCA --}}
                    <div class="row">
                        <div class="col-xs-6">
                            <strong>Producto:</strong> {{ $producto->descripcion }}
                        </div>
                        <div class="col-xs-6">
                            <strong>Marca:</strong> {{ $producto->marca }}
                        </div>
                    </div>
                    {{-- DATOS DE MOTO --}}
                    @if ($producto->tipo == "MOTO")
                        <div class="row">
                            <div class="col-xs-4"><strong>TIPO: </strong>{{$producto->tipo_moto}}</div>
                            <div class="col-xs-4"><strong>CILINDRADA: </strong>{{$producto->cilindrada}} C.C</div>
                        </div>
                    @endif
                    {{-- DATOS CARRO --}}
                    @if ($producto->tipo == "CARRO")
                        <div class="row">
                            <div class="col-xs-4"><strong>CATEGORIA: </strong>{{$producto->categoria}}</div>
                        </div>
                    @endif
                    {{-- DATOS ECONOMICOS --}}
                    <div class="row">
                        <div class="col-xs-4">
                            <strong>CLAVE: </strong>{{ $producto->clave }}
                        </div>
                        <div class="col-xs-6">
                            <strong>PRECIO DE CONTADO: </strong>${{ $producto->precio_lista }}
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            @if (isset($request['60_meses'])  && $producto->tipo =="CARRO")
                                <th colspan="2">60 Meses</th>
                            @endif
                            @if (isset($request['48_meses']))
                                <th colspan="2">48 Meses</th>
                            @endif
                            @if (isset($request['36_meses']))
                                <th colspan="2">36 Meses</th>
                            @endif
                            @if (isset($request['24_meses']))
                                <th colspan="2">24 Meses</th>
                            @endif
                            @if (isset($request['12_meses']) && $producto->tipo =="MOTO" )
                                <th colspan="2">12 Meses</th>
                            @endif
                        </tr>
                        <tr>
                            <th>Concepto</th>
                            @if (isset($request['60_meses'])  && $producto->tipo =="CARRO")
                                <th>Plan Ahorra</th>
                                <th>Plan Inmediato</th>
                            @endif
                            @if (isset($request['48_meses']))
                                <th>Plan Ahorra</th>
                                <th>Plan Inmediato</th>
                            @endif
                            @if (isset($request['36_meses']))
                                <th>Plan Ahorra</th>
                                <th>Plan Inmediato</th>
                            @endif
                            @if (isset($request['24_meses']))
                                <th>Plan Ahorra</th>
                                <th>Plan Inmediato</th>
                            @endif
                            @if (isset($request['12_meses']) && $producto->tipo =="MOTO" )
                                <th>Plan Ahorra</th>
                                <th>Plan Inmediato</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Mensualidad
                            </td>
                            @if (isset($request['60_meses'])  && $producto->tipo =="CARRO")
                                <td>$ {{$producto->m60}}</td>
                                <td>$ {{$producto->m60}}</td>
                            @endif
                            @if (isset($request['48_meses']))
                                <td>$ {{$producto->m48}}</td>
                                <td>$ {{$producto->m48}}</td>
                            @endif
                            @if (isset($request['36_meses']))
                                <td>$ {{$producto->m36}}</td>
                                <td>$ {{$producto->m36}}</td>
                            @endif
                            @if (isset($request['24_meses']))
                                <td>$ {{$producto->m24}}</td>
                                <td>$ {{$producto->m24}}</td>
                            @endif
                            @if (isset($request['12_meses']) && $producto->tipo =="MOTO" )
                                <td>$ {{$producto->m12}}</td>
                                <td>$ {{$producto->m12}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>
                                Apertura
                            </td>
                            @if (isset($request['60_meses'])  && $producto->tipo =="CARRO")
                                <td>$ {{$producto->apertura}}</td>
                                <td>$ {{$producto->apertura}}</td>
                            @endif
                            @if (isset($request['48_meses']))
                                <td>$ {{$producto->apertura}}</td>
                                <td>$ {{$producto->apertura}}</td>
                            @endif
                            @if (isset($request['36_meses']))
                                <td>$ {{$producto->apertura}}</td>
                                <td>$ {{$producto->apertura}}</td>
                            @endif
                            @if (isset($request['24_meses']))
                                <td>$ {{$producto->apertura}}</td>
                                <td>$ {{$producto->apertura}}</td>
                            @endif
                            @if (isset($request['12_meses']) && $producto->tipo =="MOTO" )
                                <td>$ {{$producto->apertura}}</td>
                                <td>$ {{$producto->apertura}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>
                                Pago Inicial
                            </td>
                            @if (isset($request['60_meses'])  && $producto->tipo =="CARRO")
                                <td>$ {{$producto->m60+$producto->apertura}}</td>
                                <td>$ {{($producto->precio_lista * 0.30)+$producto->apertura}}</td>
                            @endif
                            @if (isset($request['48_meses']))
                                <td>$ {{$producto->m48+$producto->apertura}}</td>
                                <td>$ {{($producto->precio_lista * 0.30)+$producto->apertura}}</td>
                            @endif
                            @if (isset($request['36_meses']))
                                <td>$ {{$producto->m36+$producto->apertura}}</td>
                                <td>$ {{($producto->precio_lista * 0.30)+$producto->apertura}}</td>
                            @endif
                            @if (isset($request['24_meses']))
                                <td>$ {{$producto->m24+$producto->apertura}}</td>
                                <td>$ {{($producto->precio_lista * 0.30)+$producto->apertura}}</td>
                            @endif
                            @if (isset($request['12_meses']) && $producto->tipo =="MOTO" )
                                <td>$ {{$producto->m12+$producto->apertura}}</td>
                                <td>$ {{($producto->precio_lista * 0.30)+$producto->apertura}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td>
                                Meses de entrega
                            </td>
                            @if (isset($request['60_meses'])  && $producto->tipo =="CARRO")
                                <td>{{ceil(($producto->precio_lista * 0.30)/$producto->m60)}} meses</td>
                                <td>1 mes</td>
                            @endif
                            @if (isset($request['48_meses']))
                                <td>{{ceil(($producto->precio_lista * 0.30)/$producto->m48)}} meses</td>
                                <td>1 mes</td>
                            @endif
                            @if (isset($request['36_meses']))
                                <td>{{ceil(($producto->precio_lista * 0.30)/$producto->m36)}} meses</td>
                                <td>1 mes</td>
                            @endif
                            @if (isset($request['24_meses']))
                                <td>{{ceil(($producto->precio_lista * 0.30)/$producto->m24)}} meses</td>
                                <td>1 mes</td>
                            @endif
                            @if (isset($request['12_meses']) && $producto->tipo =="MOTO" )
                                <td>{{ceil(($producto->precio_lista * 0.30)/$producto->m12)}} meses</td>
                                <td>1 mes</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="row">
                <div class="col-xs-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            PLAN DE AHORRO
                        </div>
                        <div class="panel-body">
                            36 meses, entrega a 7 meses<br>
                            24 meses, entrega a 5 meses<br>
                            12 meses, entrega a 3 meses
                        </div>
                    </div>
                </div>
                <div class="col-xs-5">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                REQUISITOS
                            </div>
                            <div class="panel-body">
                                Comprobante de domicilio<br>
                                Identificación oficial<br>
                                Primer pago
                            </div>
                        </div>
                    </div>
            </div>
{{--             
                Promoción de julio: kit de accesorios que incluye casco certificado, 
                guantes alarma, portacelular con cargador, red y protector para zapato de pedal --}}
        </p>
    {{-- </div> --}}
  </main>
</body>
</html>