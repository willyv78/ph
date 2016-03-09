  // variables globales
var sess_id   = $("#user_id").val();
var sess_perf = $("#sess_user_perf").val();
var sess_mail = $("#sess_user_mail").val();
// Funcion que se ejecuta para ver el mensaje de cargando
function espereshow (){
    $('.espere').fadeIn('fast');
}
//  Función que se ejecuta para ocultar el mensaje de cargando
function esperehide() {
    $('.espere').fadeOut('slow');
}
// Funcion que cierra automaticamente un mensaje de alerta.
function cerrar_alert () {
   $('.alert').fadeOut('slow');
}
// Funcion que se ejecuta al hacer click en el boton cerrar en la ventana modal del formulario de ingreso, edicion o condulta de documentos
function cerrarModalDocs (datos) {
  $(".ing-cal").addClass('hidden');
  $(".ing-cal").html('');
  setTimeout(esperehide, 500);
}
// Funcion que carga la pagina inicial 0 en el administrador
function cargarInicio() {
   $("#col-md-12").load("./home.php");
   $(".menu_movil").on('click', cargarPagina);
   $(".menu_movil").on('touch', cargarPagina);
   $("#logo-site").on('click', irInicio);
   // $(".sub-menu").on('touch', mostrarsubmenu);
}
// Funcion que se ajecuta cuando se hace click en un item del menu
function cargarPagina (datos) {
  espereshow();
  var date = new Date();
  var time = date.getTime();
  var pagina = $(this).attr('href');
  $("#col-md-12").html("");
  if(pagina === '#quienes-somos.html'){
    $("#col-md-12").load("./quienes-somos.php");
  }
  else if(pagina === '#calendario.html'){
    $("#col-md-12").load("./calendario.php");
  }
  else if(pagina === '#documentos.html'){
    $("#col-md-12").load("./documentos.php");
  }
  else if(pagina === '#tesoreria.html'){
    $("#col-md-12").load("./estado-financiero.php");
  }
  else if(pagina === '#contactos-y-numeros-de-emergencia.html'){
    $("#col-md-12").load("./contactos.php");
  }
  else if(pagina === '#estadisticas.html'){
    $("#col-md-12").load("./estadisticas.php?v="+time);
  }
  else{
    var val_pag = pagina.split('-');
    var pag = val_pag[2];
    $("#col-md-12").load("./"+pag+".php");
  }
  $(".navbar-collapse").removeClass('in');
  $(".navbar-collapse").addClass('collapse');
  mensajesRecibidos();
}
// funcion que se ejecuta al hacer click en la region del logo superior izquierda
function irInicio(argument) {
  $("#col-md-12").load("./home.php");
}
// Funcion que carga el calendario
function cargarHome () {
  $(".home-accesos").on("click", irPagina);
  $(".home-accesos").on("touch", irPagina);
  var boton = $("button.otros-dias");
  boton.children(".nom-dia").on('click', colorEventoDia);
  boton.children(".nom-dia").on('touch', colorEventoDia);
  boton.children(".eventos").on("click", colorEvento);
  boton.children(".eventos").on("touch", colorEvento);
  $("div#home-cont-cal").on("click", mostrarEventosDia);
  $("div#home-cont-cal").on("touch", mostrarEventosDia);
  setTimeout(esperehide, 1500);
  setTimeout(cerrar_alert, 8500);
  var ancho_pag = window.innerWidth;
  if(ancho_pag < 991){
    setTimeout(function(){
      $(".home-content:first").css('height', '450px');
      // $(".home-content:first").css('background-size', '100% 98%');
    }, 50);
  }
  else{
    heightEvento(".home-content");
  }
}
// funcion que carga una página al hacer click en la imagen en home del residente
function irPagina(datos) {
  var pag = $(this).data('pag');
  if(pag === 'quienes-somos'){
    $("#col-md-12").load("./quienes-somos.php");
  }
  else if(pag === 'calendario'){
    $("#col-md-12").load("./calendario.php");
  }
  else if(pag === 'documentos'){
    $("#col-md-12").load("./documentos.php");
  }
  else if(pag === 'estado-financiero'){
    $("#col-md-12").load("./estado-financiero.php");
  }
  else if(pag === 'contactos'){
    $("#col-md-12").load("./contactos.php");
  }
  else if(pag === 'mensajes'){
    $("#col-md-12").load("./mensajes.php");
  }
  else if(pag === 'consumos'){
    $("#col-md-12").load("./consumos.php");
  }
  else{
    $("#col-md-12").load("./"+pag+".php");
  }
  $(".navbar-collapse").removeClass('in');
  $(".navbar-collapse").addClass('collapse');
  mensajesRecibidos();
}
// Funcion que muestra y cambia el color del tipo de evento al que se hace click
function colorEvento(datos) {
  var button = $(this).parent("button");
  $("button.btn-default").removeClass('active');
  button.addClass('active');
  var dia = button.data('dia');
  var mes = button.data('mes');
  var nmes = button.data('nmes');
  var anio = button.data('anio');
  // alert(dia);
  $("span#home-dia-cal").html(dia);
  $("div#home-mes-cal").html(mes +" "+ anio);
  $("#home-dia-cal").data('dia', dia);
  $("#home-mes-cal").data('mes', nmes);
  $("#home-mes-cal").data('dia', anio);

  if($("#home-tip-cal").hasClass('hidden')){
    $("#home-tip-cal").removeClass('hidden');
  }
  if($("#home-tip-cal").hasClass('bgreen')){
    $("#home-tip-cal").removeClass('bgreen');
  }
  if($("#home-tip-cal").hasClass('borange')){
    $("#home-tip-cal").removeClass('borange');
  }
  if($("#home-tip-cal").hasClass('bred')){
    $("#home-tip-cal").removeClass('bred');
  }
  if($("#home-tip-cal").hasClass('bblue')){
    $("#home-tip-cal").removeClass('bblue');
  }

  if($(this).hasClass('bgreen')){
    $("#home-tip-cal").html('Tareas');
    $("#home-tip-cal").addClass('bgreen');
  }
  else if($(this).hasClass('borange')){
    $("#home-tip-cal").html('Clasificados');
    $("#home-tip-cal").addClass('borange');
  }
  else if($(this).hasClass('bred')){
    $("#home-tip-cal").html('Circulares');
    $("#home-tip-cal").addClass('bred');
  }
  else{
    $("#home-tip-cal").html('Eventos');
    $("#home-tip-cal").addClass('bblue');
  }
}
// Funcion que muestra y cambia el color del tipo de evento al que se hace click
function colorEventoDia(datos) {
  var button = $(this).parent("button");
  $("#home-tip-cal").addClass('hidden');
  $("button.btn-default").removeClass('active');
  button.addClass('active');
  var dia = button.data('dia');
  var mes = button.data('mes');
  var nmes = button.data('nmes');
  var anio = button.data('anio');
  // alert(dia);
  $("span#home-dia-cal").html(dia);
  $("div#home-mes-cal").html(mes +" "+ anio);
  $("#home-dia-cal").data('dia', dia);
  $("#home-mes-cal").data('mes', nmes);
  $("#home-mes-cal").data('dia', anio);
}
// Funcion que muestra una pagina tipo modal con los eventos del dia al que se le hace click
function mostrarEventosDia(datos) {
  var contenedor = $(this);
  var dia = contenedor.find('#home-dia-cal').data('dia');
  var mes = contenedor.find('#home-mes-cal').data('mes');
  var anio = contenedor.find('#home-mes-cal').data('anio');
  var fecha = dia +"-"+ mes +"-"+ anio;
  $(".ing-cal").load("home-detalle.php?fecha=" + fecha);
  $(".ing-cal").removeClass('hidden');
}
// funcion que se ejecuta al cargar el detalle de los eventos al hacer click en el dia fecha
function cargaDetalleHome() {
  $(".close").on("click", cerrarModalDocs);
  $("span.ver-mas").on('click', mostrarMasEvento);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al cargar el detalle del evento
function cargaDetalleEvento() {
  $("button.btn-close").on("click", cerrarModalDocs);
  $("button.btn-default").on('click', regresarModalCal);
  setTimeout(esperehide, 500);
}
// Funcion que se ejecuta al hacer click en ver mas en cada uno de los eventos
function mostrarMasEvento() {
  var id = $(this).closest('div.evento').data('id');
  // alert(id);
  $(".ing-cal").load("./cal_ver_evento.php?id=" + id);
  $(".ing-cal").removeClass('hidden');
}
// funcion que se ejecuta al hacer click en el boton regresar del detalle del evento
function regresarModalCal() {
  var fecha = $(this).data('fecha');
  // alert(fecha);
  // $(this).closest("div.ing-cal").html("");
  $(this).closest("div.ing-cal").load("./home-detalle.php?fecha=" + fecha);
  // $(this).closest("div.ing-cal").removeClass('hidden');
}
// funcion que se ejecuta al cargar la pagina del detalle de eventos en el home
function heightEvento(clase) {
  var heights = $(clase).map(function() {
      return $(this).height();
  }).get(),
  maxHeight = Math.max.apply(null, heights);
  setTimeout(function(){$(clase).height(maxHeight);}, 50);
}
// Funcion que carga el calendario
function cargarCalendario () {
   $(".btn").on("click", tipoCalendario);
   $(".btn").on("touch", tipoCalendario);
   setTimeout(esperehide, 1500);
   setTimeout(cerrar_alert, 8500);
}
// Funcion que obtiene el tipo de calendario que se ingresara
function tipoCalendario (datos) {
    var tipocal = $(this).attr('name');
    $("#tipo_cal").val(tipocal);
}




// funcion que se ejecuta al cargar el detalle del evento  al agregar o editar un evento al calendario
function editEvento () {
  $(".close").on("click", cerrarModalDocs);
  setTimeout(esperehide, 500);
}
// fincion que se ejecuta al cargar la pagina de estado financiero
function cargaEstadoFinanciero () {
  $(".btn-anios").on("click", consultarEstadoAnio);
  // $(".btn-nuevo").on("click", nuevoEstadoFinanciero);
  // $(".btn-editar").on("click", editarEstadoFinanciero);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en los botones de los años en estado financiero
function consultarEstadoAnio (datos) {
  espereshow();
  // capturamos el html del boton presionado
  var tipo_btn = $(this).html();
  var id_apto = $("#id_apto").val();
  $("#col-md-12").load("estado-financiero.php?id_apto="+id_apto+"&anio="+tipo_btn);
}
// Funcion que se ejecuta al cargar la pagina de documentos en el administrador
function mostrarDocs () {
  $(".panel").on("click", mostrarListaDocumentos);
  setTimeout(esperehide, 500);
}
// Funcion que se ejecuta cuando se hace click en una imagen de documentos
function mostrarListaDocumentos (datos) {
  espereshow();
  $(".panel-body").html('');
  var div_panel = $(this).attr('aria-controls');
  var tipo = div_panel.split("collapseExample");
  $("#"+div_panel).load("lista-de-documentos.php?tipo="+tipo[1]);
  $(".panel-body").removeClass('in');
  $(".panel-body").addClass('collapse');
  setTimeout(esperehide, 500);
}
// Funciones que se ejecuta cuando se carga el listado de documentos
function editarDocs () {
  $(".btn").on("click", agregarEditarBorrarDoc);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta cuando se hace click en un boton en el listado de documentos
function agregarEditarBorrarDoc (datos) {
  var tipo        = $(this).parent(".id_tipo").attr("id_tipo");
  var id          = $(this).parent("td").attr('name');
  var title_boton = $(this).attr('title');
  $(".panel-body").removeClass('in');
  $(".panel-body").addClass('collapse');
  switch(title_boton){
    case "Descargar documento":
      var url = $(this).attr('name');
      var ven = window.open(url, '_blank');
      win.focus();
      return false;
      break;
    case "Ver detalle del documento":
      $(".ing-cal").load("editar-agregar-documento.php?tipo="+tipo+"&id="+id+"&ver=1");
      $(".ing-cal").removeClass('hidden');
      return false;
      break;
    case "Editar detalle del documento":
      $(".ing-cal").load("editar-agregar-documento.php?tipo="+tipo+"&id="+id+"&edit=1");
      $(".ing-cal").removeClass('hidden');
      return false;
      break;
    case "Eliminar documento":
      swal({
         title: "¿Esta Seguro?",
         text: "Se borrará el registro con # id " + id,
         type: "warning",
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#F8BB86",
         confirmButtonText: "Eliminar!",
         closeOnConfirm: false
      },
      function(){
        espereshow();
        $.ajax({
          url:"../php/ins_upd_doc.php",
          cache:false,
          type:"POST",
          data:"id_sup="+id,
          success: function(datos){
            setTimeout(esperehide, 500);
            if(datos !== ''){
              swal({
                title: "Felicidades!",
                text: "El registro se ha eliminado correctamente!",
                type: "success",
                confirmButtonText: "Continuar",
                confirmButtonColor: "#94B86E"
              },
              function () {
                $("#collapseExample"+tipo).load("lista-de-documentos.php?tipo="+tipo);
                // $("#col-md-12").load("lista-de-documentos.php?tipo="+tipo);
              });
            }
            else{
              swal({
                title: "Error!",
                text: "Ha ocurrido un error,\nNo se ha realizado cambios,\nrevise la información diligenciada he intentelo nuevamente.",
                type: "error",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#E25856"
              });
              return;
            }
          }
        });
      });
      break;
    case "Regresar":
      $("#col-md-12").load("documentos.php");
      return false;
      break;
    case "Nuevo Documento":
      $(".ing-cal").load("editar-agregar-documento.php?tipo="+tipo);
      $(".ing-cal").removeClass('hidden');
      return false;
      break;
  }
  return false;
}
// Funcion que se ejecuta al cargar la pagina de quienes somos
function cargarQuienes () {
  $(".panel").on("click", verPerfil);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en las imagenes de quienes somos
function verPerfil(datos) {
  espereshow();
  $(".panel-body").removeClass('in');
  $(".panel-body").addClass('collapse');
  $(".panel-body").html('');
  var div_panel = $(this).attr('aria-controls');
  var tipo = div_panel.split("collapseExample");
  switch(tipo[1]){
    case '1':
      $("#"+div_panel).load("administracion.php");
      break;
    case '2':
      $("#"+div_panel).load("consejo.php");
      break;
    case '3':
      $("#"+div_panel).load("comite.php");
      break;
    case '4':
      $("#"+div_panel).load("edificio.php");
      break;
    case '5':
      $("#"+div_panel).load("contador.php");
      break;
    case '6':
      $("#"+div_panel).load("revisor.php");
      break;
    case '7':
      $("#"+div_panel).load("seguridad.php");
      break;
    case '8':
      $("#"+div_panel).load("servicios.php");
      break;
  }
}
// funcion que se ejecuta al cargar la pagina tipo modal del admnistrador
function cargarPerfil () {
  setTimeout(esperehide, 500);
}









function mostrarsubmenu (datos) {
  $(this).toggleClass('open');
}
// Funcion que cierra el detalle del evento al hacer click en el boton cancelar
function cerrarDetEvento (event) {
    event.preventDefault();
    $(".ing-cal").html("");
    $(".ing-cal").addClass('hidden');
}
// fincion que se ejecuta al mostrar el formulario de agregar, editar o ver documento
function editDocumento () {
  $(".btn-danger").on("click", cerrarModalDocs);
  $(".close").on("click", cerrarModalDocs);
  setTimeout(esperehide, 500);
}
// Funcion que se ejecuta al cargar la pagina de estados financieros listado
function accionEstFinanciero () {
  $(".btn").on("click", verEstFinanciero);
  setTimeout(esperehide, 500);
  setTimeout(cerrar_alert, 8000);
}
// funcion que se ejecuta al hacer click en los botones de la lista de estados financieros
function verEstFinanciero (datos) {
  var clase = $(this).attr('class');
  switch(clase){
    case 'btn btn-info':
      $(".ing-cal").load("tes_edit.php");
      $(".ing-cal").removeClass('hidden');
      break;
    case 'btn btn-success':
      $(".ing-cal").load("tes_edit.php");
      $(".ing-cal").removeClass('hidden');
      break;
  }
}
// Funcion que se ejecuta al cargar la pagina detalle del usuario
function camposDinamicos () {
   // oculta todos los div activos
   $('dl dd').hide();
   $('dl dt').click(function () {
       // si esta activo oculta el div y quita la clase activo
       if ($(this).hasClass('activo')) {
           $(this).removeClass('activo');
           $(this).next().hide();
       }
       // si no se esta mostrando se muestra y se agrega la clase activo
       else {
           // oculta todos los div activos
           $('dl dd').hide();
           $('dl dt').removeClass('activo');
           $(this).addClass('activo');
           $(this).next().show();
       }
   });
   $(".btn").on("click", cerrarModalDocs);
   $(".close").on("click", cerrarModalDocs);
   setTimeout(esperehide, 1500);
}
// function que se ejecuta al cargar la pagina de estadisticas
function cargarEstadisticas (argument) {
  setTimeout(esperehide, 500);
}




























$(document).on('ready', cargarInicio);









