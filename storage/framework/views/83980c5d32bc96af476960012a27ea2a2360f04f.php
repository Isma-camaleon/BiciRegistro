<?php $__env->startSection('content'); ?>
<style media="screen">
  .dataTables_length{
    float: left;
    margin-right: 30px;
  }
  .dt-buttons.btn-group{
    margin-top: -5px;
  }
</style>
<?php $diasDelMes=0; ?>
<div class="container-fluid pr-4">
  <div class="row">
    <div class="col-2">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active px-2" id="grafico" data-toggle="pill" href="#v-grafico" role="tab" aria-controls="v-grafico" aria-selected="true">Gráfico de registros</a>
        <a class="nav-link px-2" id="historial" data-toggle="pill" href="#v-historial" role="tab" aria-controls="v-historial" aria-selected="false">Registro de Entrada/Salida</a>
        <a class="nav-link px-2" id="bicicletasInstitucion" data-toggle="pill" href="#v-bicicletas-institucion" role="tab" aria-controls="bicicletasInstitucion" aria-selected="false">Bicicletas en la institución</a>
        <a class="nav-link px-2" id="bicicletas" data-toggle="pill" href="#v-bicicletas" role="tab" aria-controls="bicicletas" aria-selected="false">Lista de bicicletas</a>
        <a class="nav-link px-2" id="duenos" data-toggle="pill" href="#v-duenos" role="tab" aria-controls="v-duenos" aria-selected="false">Lista de dueños</a>
        <a class="nav-link px-2" id="usuarios" data-toggle="pill" href="#v-usuarios" role="tab" aria-controls="v-usuarios" aria-selected="false">Lista de usuarios</a>
      </div>
      <hr>
      <h5>Filtro para gráficos</h5>
      <?php echo e(Form::open(['id'=>'formFiltro'])); ?>

      <div class="form-group mb-0">
        <div class="input-group-prepend" style="width:27%; float:left">
          <label class="input-group-text" for="selectAnio" style="width:100%;">Año</label>
        </div>
          <?php echo e(Form::select('selectAnio', $anios->pluck('anio','anio'), date('Y'), ['id'=> 'selectAnio','style' => 'width:73%','class' => 'custom-select'])); ?>

      </div>

      
      <div class="input-group mb-0">
        <div class="input-group-prepend" style="width:27%;">
          <label class="input-group-text" for="selectDia" style="width:100%;">Día</label>
        </div>
        <select class="custom-select" id="selectDia" name="selectDia" style="width:73%;">
        </select>
      </div>
      <?php echo e(Form::close()); ?>

    </div>
    <div class="col-9">
      <div class="tab-content" id="v-pills-tabContent">
        <!-- Gráfico -->
        <div class="tab-pane fade show active" id="v-grafico" role="tabpanel" aria-labelledby="grafico">
          <nav class="pb-0">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-hora-tab" data-toggle="tab" href="#nav-hora" role="tab" aria-controls="nav-hora" aria-selected="true">Por Hora</a>
              <a class="nav-item nav-link" id="nav-diario-tab" data-toggle="tab" href="#nav-diario" role="tab" aria-controls="nav-diario" aria-selected="true">Diario</a>
              <a class="nav-item nav-link" id="nav-mensual-tab" data-toggle="tab" href="#nav-mensual" role="tab" aria-controls="nav-mensual" aria-selected="false">Mensual</a>
              <a class="nav-item nav-link" id="nav-anual-tab" data-toggle="tab" href="#nav-anual" role="tab" aria-controls="nav-anual" aria-selected="false">Anual</a>
            </div>
          </nav>
          <div class="card">

            <div class="card-body">

              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-hora" role="tabpanel" aria-labelledby="nav-hora-tab">
                  <div id="container-hora" style="width:100%; height:400px;"></div>
                </div>
                <div class="tab-pane fade " id="nav-diario" role="tabpanel" aria-labelledby="nav-diario-tab">
                  <div id="container-diario" style="width:100%; height:400px;"></div>
                </div>
                <div class="tab-pane fade" id="nav-mensual" role="tabpanel" aria-labelledby="nav-mensual-tab">
                  <div id="container-mensual" style="width:100%; height:400px;"></div>
                </div>
                <div class="tab-pane fade" id="nav-anual" role="tabpanel" aria-labelledby="nav-anual-tab">
                  <div id="container-anual" style="width:100%; height:400px;"></div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /Gráfico -->
        <!-- Historial -->
        <div class="tab-pane fade" id="v-historial" role="tabpanel" aria-labelledby="historial">
          <div class="card">
            <div class="card-body">
              <table id="tableHistorial" class="table table-small table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" width="100%">
                  <thead>
                      <tr>
                        <th>N°</th>
                        <th>Bicicleta</th>
                        <th>Marca / Modelo</th>
                        <th>Usuario</th>
                        <th>Correo usuario</th>
                        <th>Acción</th>
                        <th>Fecha / Hora</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>N°</th>
                      <th>Código bicicleta</th>
                      <th>bicicleta</th>
                      <th>Usuario</th>
                      <th>Correo usuario</th>
                      <th>Acción</th>
                      <th>Fecha / Hora</th>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /Historial -->
        <!-- Bicicletas -->
        <div class="tab-pane fade" id="v-bicicletas" role="tabpanel" aria-labelledby="bicicletas">
          <div class="card">
            <div class="card-body">
              <table id="tableBicicleta" class="table table-hover table-small table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" width="100%">
                  <thead>
                      <tr>
                        <th>N°</th>
                        <th>Código</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>N°</th>
                      <th>Código</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Color</th>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /Bicicletas -->
        <!-- Bicicletas en la institucion-->
        <div class="tab-pane fade" id="v-bicicletas-institucion" role="tabpanel" aria-labelledby="bicicletasInstitucion">
          <div class="card">
            <div class="card-body">
              <table id="tableBicicletaInstitucion" class="table table-hover table-small  table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" width="100%">
                  <thead>
                      <tr>
                        <th>N°</th>
                        <th>Código</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                      </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>N°</th>
                      <th>Código</th>
                      <th>Marca</th>
                      <th>Modelo</th>
                      <th>Color</th>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /Bicicletas -->
        <!-- Duenos -->
        <div class="tab-pane fade" id="v-duenos" role="tabpanel" aria-labelledby="duenos">
          <div class="card">
            <div class="card-body">
              <table id="tableDueno" class="table table-hover table-small table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" width="100%">
                <thead>
                  <tr>
                    <th >N°</th>
                    <th>Run</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th data-orderable="false">Bicicletas</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th >N°</th>
                    <th>Run</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th data-orderable="false">Bicicletas</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /Duenos -->
        <!-- Usuarios -->
        <div class="tab-pane fade" id="v-usuarios" role="tabpanel" aria-labelledby="usuarios">
          <div class="card">
            <div class="card-body">
              <table id="tableUser" class="table table-hover table-small table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl" width="100%">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <!-- /Usuarios -->
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" class="init">



$(document).ready(function() {
  // CARGAMOS LOS DÍAS DEL MES DE HOY
  var date = new Date();
  var primerDia = (new Date(date.getFullYear(), date.getMonth(), 1)).getDate();
  var ultimoDia = (new Date(date.getFullYear(), date.getMonth() + 1, 0)).getDate();

  for(var i=primerDia; i<=ultimoDia; i++){
    if(date.getDate() == i){
      $("#selectDia").append('<option selected value='+i+'>'+i+'</option>');
    }else{
      $("#selectDia").append('<option value='+i+'>'+i+'</option>');
    }
  }

  /*var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

  for(var i=0; i<12; i++){
    if(i == date.getMonth()){
      $("#selectMes").append('<option selected value='+(i+1)+'>'+meses[i]+'</option>');
    }else{
      $("#selectMes").append('<option value='+(i+1)+'>'+meses[i]+'</option>');
    }

  }*/

  var anio = $('select[id=selectAnio]').val();
  var mes = $('select[id=selectMes]').val();
  $('select[id=selectDia]').val();
  var dia = $('select[id=selectDia]').val();

  cargarGraficoHora(anio,mes,dia);

  $('select[id=selectMes]').click(function(){
     anio = $('select[id=selectAnio]').val();
     mes = $('select[id=selectMes]').val();
     dia = $('select[id=selectDia]').val();
    $('#nav-diario-tab').click();
    $('#nav-hora-tab').click();
    $('#nav-mensual-tab').click();
    $('#nav-anual-tab').click();

    $.ajax({
       type: "POST",
       url: "<?php echo e(route('registro.diasDelMes')); ?>",
       data: $("#formFiltro").serialize(),
       success: function(data)
       {
         $("#selectDia").empty();
         for(var i=0;i<data.length;i++){
          //alert(data[i]);
          $("#selectDia").append('<option value='+data[i]+'>'+data[i]+'</option>');

         //$("#selectDia").append('<option value=01>01</option>');
        // $.each(data,function(key, registro) {
          // alert(data.dias);
        //$("#selectDia").append('<option value='+data.dias+'>'+data.dias+'</option>');
        //});
        }
      }
   });

  });



  $('select[id=selectAnio]').click(function(){
     anio = $('select[id=selectAnio]').val();
     mes = $('select[id=selectMes]').val();
     dia = $('select[id=selectDia]').val();
     $('#nav-diario-tab').click();
     $('#nav-hora-tab').click();
     $('#nav-mensual-tab').click();
     $('#nav-anual-tab').click();

  });

  $('select[id=selectDia]').click(function(){
     anio = $('select[id=selectAnio]').val();
     mes = $('select[id=selectMes]').val();
     dia = $('select[id=selectDia]').val();
     $('#nav-diario-tab').click();
     $('#nav-hora-tab').click();
     $('#nav-mensual-tab').click();
     $('#nav-anual-tab').click();

  });


    $('#tableHistorial').DataTable({
      //  "scrollY": "500px",
      "columnDefs": [
        { "searchable": true, "targets": 1 },
        { "searchable": true, "targets": 2 },
        { "searchable": true, "targets": 3 }
      ],
      "processing": true,
      'serverSide': true,
      ajax: "<?php echo e(route('registro.listar')); ?>",
      'columns':[
            {'data':'id'},
            {'data':'codigoVehiculo', 'name': 'vehiculos.codigo'},
            {'data':'vehiculo', 'name': 'marcas.description',  'name': 'vehiculos.modelo'},
            {'data':'usuario' , 'name': 'users.name'},
            {'data':'correoUsuario', 'name': 'users.email'},
            {'data':'accion'},
            {'data':'created_at'},
      ],

      "order": [[ 0, "desc" ]],
      "scrollCollapse": true,
      "language": {
       "sLengthMenu": "Ver _MENU_ registros",
        "search": "Buscar",
        "zeroRecords": "No se encontraron registros",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoFiltered": " (filtrado de un total de _MAX_ resultados)",
        "paginate": {
          "first": "Primero",
          "last":"Últimolabel",
          "next":"Siguiente",
          "previous":"Anterior",
        },
        buttons: {
                copyTitle: 'Copiado en portapapeles',
                copySuccess: {
                    _: '%d lineas copiadas',
                    1: '1 linea copiada'
                }
            },
      },
      "dom": 'lBfrtip',
      buttons: [
        { extend: 'copy', text: 'Copiar tabla' },
        { extend: 'excel', text: 'Excel', title: 'Historial de registros' }
      ],

      "lengthMenu": [[10,100, 1000, 2500, 5000], [10,100, 1000, 2500, 5000]],

    });

    $('#tableBicicletaInstitucion').DataTable({
      "processing": true,
      'serverSide': true,
      "columnDefs": [
        { "searchable": true, "targets": 2 }
      ],
      ajax: "<?php echo e(route('vehiculos.enEstablecimiento')); ?>",
      'columns':[
            {'data':'id'},
            {'data':'codigo',},
            {'data':'marca', 'name': 'marcas.description'},
            {'data':'modelo'},
            {'data':'color'},
      ],
      //"scrollY": "500px",
      "scrollCollapse": true,
      "language": {
       "sLengthMenu": "Ver _MENU_ registros",
        "search": "Buscar",
        "zeroRecords": "No se encontraron registros",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoFiltered": " (filtrado de un total de _MAX_ resultados)",
        "paginate": {
          "first": "Primero",
          "last":"Últimolabel",
          "next":"Siguiente",
          "previous":"Anterior",
        },
        buttons: {
                copyTitle: 'Copiado en portapapeles',
                copySuccess: {
                    _: '%d lineas copiadas',
                    1: '1 linea copiada'
                }
            },
      },
      "dom": 'lBfrtip',
      buttons: [
        { extend: 'copy', text: 'Copiar tabla' },
        { extend: 'excel', text: 'Excel', title: 'Bicicletas en la institución' }
      ],
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
    });


    $('#tableBicicleta').DataTable({
      "processing": true,
      'serverSide': true,
      "columnDefs": [
        { "searchable": true, "targets": 2 }
      ],
      ajax: "<?php echo e(route('vehiculos.listar')); ?>",
      'columns':[
            {'data':'id'},
            {'data':'codigo'},
            {'data':'marca', 'name': 'marcas.description'},
            {'data':'modelo'},
            {'data':'color'},
      ],
      //"scrollY": "500px",
      "scrollCollapse": true,
      "language": {
       "sLengthMenu": "Ver _MENU_ registros",
        "search": "Buscar",
        "zeroRecords": "No se encontraron registros",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoFiltered": " (filtrado de un total de _MAX_ resultados)",
        "paginate": {
          "first": "Primero",
          "last":"Últimolabel",
          "next":"Siguiente",
          "previous":"Anterior",
        },
        buttons: {
                copyTitle: 'Copiado en portapapeles',
                copySuccess: {
                    _: '%d lineas copiadas',
                    1: '1 linea copiada'
                }
            },
      },
      "dom": 'lBfrtip',
      buttons: [
        { extend: 'copy', text: 'Copiar tabla' },
        { extend: 'excel', text: 'Excel', title: 'Bicicletas' }
      ],
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]
    });

    $('#tableDueno').DataTable({
      "processing": true,
      'serverSide': true,
      ajax: "<?php echo e(route('duenos.listar')); ?>",
      'columns':[
            {'data':'id'},
            {'data':'rut'},
            {'data':'nombre'},
            {'data':'correo'},
            {'data':'celular'},
            {'data':'bicicletas'},
      ],
      //"scrollY": "500px",
      "scrollCollapse": true,
      "language": {
       "sLengthMenu": "Ver _MENU_ registros",
        "search": "Buscar",
        "zeroRecords": "No se encontraron registros",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoFiltered": " (filtrado de un total de _MAX_ resultados)",
        "paginate": {
          "first": "Primero",
          "last":"Últimolabel",
          "next":"Siguiente",
          "previous":"Anterior",
        },
        buttons: {
                copyTitle: 'Copiado en portapapeles',
                copySuccess: {
                    _: '%d lineas copiadas',
                    1: '1 linea copiada'
                }
            },
      },
      "dom": 'lBfrtip',
      buttons: [
        { extend: 'copy', text: 'Copiar tabla' },
        { extend: 'excel', text: 'Excel', title: 'Dueños' }
      ],
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]

    });


    $('#tableUser').DataTable({
      "processing": true,
      'serverSide': true,
      ajax: "<?php echo e(route('users.listar')); ?>",
      'columns':[
            {'data':'id'},
            {'data':'nombre', 'name': 'users.name'},
            {'data':'email'},
            {'data':'rol', 'name': 'roles.name'},
      ],
      //"scrollY": "500px",
      "scrollCollapse": true,
      "language": {
       "sLengthMenu": "Ver _MENU_ registros",
        "search": "Buscar",
        "zeroRecords": "No se encontraron registros",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoFiltered": " (filtrado de un total de _MAX_ resultados)",
        "paginate": {
          "first": "Primero",
          "last":"Últimolabel",
          "next":"Siguiente",
          "previous":"Anterior",
        },
        buttons: {
                copyTitle: 'Copiado en portapapeles',
                copySuccess: {
                    _: '%d lineas copiadas',
                    1: '1 linea copiada'
                }
            },
      },
      "dom": 'lBfrtip',
      buttons: [
        { extend: 'copy', text: 'Copiar tabla' },
        { extend: 'excel', text: 'Excel', title: 'Usuarios' }
      ],
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]]

    });


// GRÁFICOS
$('#nav-diario-tab').click(function(){
  cargarGraficoDiario(anio,mes);
});

$('#nav-hora-tab').click(function(){
  cargarGraficoHora(anio,mes,02);
});

$('#nav-mensual-tab').click(function(){
  cargarGraficoMensual(anio);
});

$('#nav-anual-tab').click(function(){
  cargarGraficoAnual();
});

} );


function cargarGraficoHora(anio,mes,dia){
  var url = '<?php echo e(url("")); ?>'+'/grafico/'+anio+'/'+mes+'/02';
  $.get(url, function(data){
    var datos = jQuery.parseJSON(data);
    var ragoHoras = datos.ragoHoras;
    var entradas = datos.entradas;
    var salidas = datos.salidas;

    var myChart = Highcharts.chart('container-hora',

    {
      chart: {
        type: 'areaspline', // spline
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 0,
            viewDistance: 500,
            depth: 5
        }
      },
      title: {
      text: 'Registro de entradas y salidas'
    },
    credits: {
      enabled: false
    },
    subtitle: {
      text: 'Registro por hora'
    },
    xAxis: {
      tickWidth: 0,
      type: '',
      categories: ragoHoras,
      title:{
      text: 'Horas'
    },
    labels: {
        skew3d: true,
    },
    crosshair: true
    },
    yAxis: {
      title: {
      text: 'Cantidad de registros',
      skew3d: true
      },
      plotLines:[{
        value: 0,
        width: 1,
        color: '#0f0'
      }]
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },
    plotOptions: {
     series: {
       label: {
           connectorAllowed: false
       },
     pointStart: 0
     }
   },
   series: [
     {name:'Entradas', data: entradas },
     {name:'Salidas', data: salidas, color: 'RGBA(240, 128, 128,0.7)' }
   ],
  exporting: {
    buttons: {
        contextButton: {
            menuItems: ['viewFullscreen','','downloadPNG', 'downloadJPEG', '','downloadPDF','downloadXLS']
        }
    },
  },
  lang: {
      viewFullscreen: 'Pantalla completa',
      downloadPNG: 'Descargar PNG',
      downloadJPEG: 'Descargar JPEG',
      downloadPDF: 'Descargar PDF',
      downloadXLS: 'Descargar EXCEL',
      contextButtonTitle: 'Menú'
  },

  });
  });
}
function cargarGraficoDiario(anio,mes){
  var url = '<?php echo e(url("")); ?>'+'/grafico/'+anio+'/'+mes;
  $.get(url, function(data){
    var datos = jQuery.parseJSON(data);
    var totalDias = datos.totalDias;
    var entradas = datos.entradas;
    var salidas = datos.salidas;

    var myChart = Highcharts.chart('container-diario',
    {
      chart: {
        type: 'column', // spline
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 0,
            viewDistance: 500,
            depth: 5
        }
      },
      title: {
      text: 'Registro de entradas y salidas'
    },
    credits: {
      enabled: false
    },
    subtitle: {
      text: 'Registro diario'
    },
    xAxis: {
      tickWidth: 0,
      type: 'day',
      min:1,
      categories: [],
      title:{
      text: 'Días'
    },
    labels: {
        skew3d: true,
    },
    crosshair: true
    },
    yAxis: {
      title: {
      text: 'Cantidad de registros',
      skew3d: true
      },
      plotLines:[{
        value: 0,
        width: 1,
        color: '#0f0'
      }]
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },
    plotOptions: {
     series: {
       label: {
           connectorAllowed: false
       },
     pointStart: 0
     }
   },
   series: [
     {name:'Entradas', data: entradas },
     {name:'Salidas', data: salidas, color: 'RGBA(240, 128, 128,0.7)' }
   ],
  exporting: {
    buttons: {
        contextButton: {
            menuItems: ['viewFullscreen','','downloadPNG', 'downloadJPEG', '','downloadPDF','downloadXLS']
        }
    },
  },
  lang: {
      viewFullscreen: 'Pantalla completa',
      downloadPNG: 'Descargar PNG',
      downloadJPEG: 'Descargar JPEG',
      downloadPDF: 'Descargar PDF',
      downloadXLS: 'Descargar EXCEL',
      contextButtonTitle: 'Menú'
  },

  });
});
}
function cargarGraficoMensual(anio){
  var url = '<?php echo e(url("")); ?>/grafico/'+anio;
  $.get(url, function(data){
    var datos = jQuery.parseJSON(data);
    var meses = datos.meses;
    var entradas = datos.entradas;
    var salidas = datos.salidas;

    var myChart = Highcharts.chart('container-mensual',

    {
      chart: {
        type: 'column', // spline / areaspline /column
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 0,
            viewDistance: 500,
            depth: 5
        }
      },
      title: {
      text: 'Registro de entradas y salidas'
    },
    credits: {
      enabled: false
    },
    subtitle: {
      text: 'Registro mensual'
    },
    xAxis: {
      tickWidth: 0,
      type: 'month',
      categories: meses,
      title:{
      text: 'Meses'
    },
    labels: {
        skew3d: true,
    },
    crosshair: true
    },
    yAxis: {
      title: {
      text: 'Cantidad de registros',
      skew3d: true
      },
      plotLines:[{
        value: 0,
        width: 1,
        color: '#0f0'
      }]
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },
    plotOptions: {
     series: {
       label: {
           connectorAllowed: false
       },
     pointStart: 0
     }
   },
   series: [
     {name:'Entradas', data: entradas },
     {name:'Salidas', data: salidas, color: 'RGBA(240, 128, 128,0.7)' }
   ],
  exporting: {
    buttons: {
        contextButton: {
            menuItems: ['viewFullscreen','','downloadPNG', 'downloadJPEG', '','downloadPDF','downloadXLS']
        }
    },
  },
  lang: {
      viewFullscreen: 'Pantalla completa',
      downloadPNG: 'Descargar PNG',
      downloadJPEG: 'Descargar JPEG',
      downloadPDF: 'Descargar PDF',
      downloadXLS: 'Descargar EXCEL',
      contextButtonTitle: 'Menú'
  },

  });
  });
}

function cargarGraficoAnual(){
  var url = '<?php echo e(url("")); ?>/grafico/';
  $.get(url, function(data){
    var datos = jQuery.parseJSON(data);
    var anios = datos.anios;
    var entradas = datos.entradas;
    var salidas = datos.salidas;

    var myChart = Highcharts.chart('container-anual',

    {
      chart: {
        type: 'column', // spline / areaspline /column
        options3d: {
            enabled: true,
            alpha: 10,
            beta: 0,
            viewDistance: 500,
            depth: 5
        }
      },
      title: {
      text: 'Registro de entradas y salidas'
    },
    credits: {
      enabled: false
    },
    subtitle: {
      text: 'Registro anual'
    },
    xAxis: {
      tickWidth: 0,
      type: 'year',
      categories: anios,
      title:{
      text: 'Años'
    },
    labels: {
        skew3d: true,
    },
    crosshair: true
    },
    yAxis: {
      title: {
      text: 'Cantidad de registros',
      skew3d: true
      },
      plotLines:[{
        value: 0,
        width: 1,
        color: '#0f0'
      }]
    },
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },
    plotOptions: {
     series: {
       label: {
           connectorAllowed: false
       },
     pointStart: 0
     }
   },
   series: [
     {name:'Entradas', data: entradas },
     {name:'Salidas', data: salidas, color: 'RGBA(240, 128, 128,0.7)' }
   ],
  exporting: {
    buttons: {
        contextButton: {
            menuItems: ['viewFullscreen','','downloadPNG', 'downloadJPEG', '','downloadPDF','downloadXLS']
        }
    },
  },
  lang: {
      viewFullscreen: 'Pantalla completa',
      downloadPNG: 'Descargar PNG',
      downloadJPEG: 'Descargar JPEG',
      downloadPDF: 'Descargar PDF',
      downloadXLS: 'Descargar EXCEL',
      contextButtonTitle: 'Menú'
  },

  });
  });
}




</script>
<script  src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script  src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script  src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="https://code.highcharts.com/highcharts-3d.js"></script>

<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>