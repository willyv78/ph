// variables globales
var sess_id   = $("#user_id").val();
var sess_perf = $("#sess_user_perf").val();
var sess_mail = $("#sess_user_mail").val();
var sess_proy = 1;
// Funcion que se ejecuta para ver el mensaje de cargando
function espereshow (){
  mensajesRecibidos();
  $('.espere').fadeIn('fast');
}
//  Función que se ejecuta para ocultar el mensaje de cargando
function esperehide() {
    $('.espere').fadeOut('slow');
    var altopag = resizePagFooter();
    $("body").height(altopag);
}
// funcion que redimenciona la pagina para ajustar el footer
function resizePagFooter(argument) {
  var header = $(".navbar-inverse").outerHeight();
  var content = $("#col-md-12").outerHeight();
  var footer = $("footer").outerHeight();
  var screen = window.innerHeight;
  // alert(screen);cont-pag
  var res_height = header + content + footer;
  if(res_height < screen){var total = screen;}
  else{var total = res_height;}
  return total;
}
// funcion que redimenciona la pagina para ajustar el div cal
function resizePag(argument) {
  var screen = window.innerHeight;
  var res_height = $(".container-fluid").outerHeight();
  if(res_height < screen){var total = screen;}
  else{var total = res_height;}
  return total;
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
// Funcion que se ejecuta al cargar la pagina de inicio y lo que hace es validar la cantidad de mensajes recibidos para colocarlo en el badge del menu mensajes y en el boton de recibidos en mensajes
function mensajesRecibidos () {
  $.ajax({
    url:"../php/mensajes-recibidos.php",
    cache:false,
    type:"POST",
    success: function(datos){
      if(datos > 0){
        $(".badge-recibidos").html(datos);
        $(".badge-recibidos").removeClass("hidden");
      }
      else{
        $(".badge-recibidos").html("0");
        $(".badge-recibidos").addClass("hidden");
      }
    }
  });
}
// Funcion que carga la pagina inicial 0 en el administrador
function cargarInicio() {
   $("#col-md-12").load("./home.php");
   $(".menu_movil").on('click', cargarPagina);
   $(".menu_movil").on('touch', cargarPagina);
   $("#logo-site").on('click', irInicio);
   $("#logo-site").on('touch', irInicio);
}
// Funcion que se ajecuta cuando se hace click en un item del menu
function cargarPagina (datos) {
  espereshow();
  var date = new Date();
  var time = date.getTime();
  var pagina = $(this).attr('href');
  // $("#col-md-12").html("");
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
  else if(pagina === '#tareas.html'){
    $("#col-md-12").load("./lista-de-tareas.php");
  }
  else if(pagina === '#mensajes.html'){
    $("#col-md-12").load("./mensajes.php");
  }
  else if(pagina === '#indexjquerytabs1-page-cerrar'){
    esperehide();
    swal({
      title: "¿Esta seguro que desea salir?",
      text: "Se cerrará la sesión",
      type: "warning",
      showCancelButton: true,
      cancelButtonText: "Cancelar",
      confirmButtonColor: "#F89406",
      confirmButtonText: "Salir",
      closeOnConfirm: true
    },
    function(isConfirm){
      if (isConfirm) {
        $("#col-md-12").load("./cerrar.php");
      }
    });
  }
  else{
    var val_pag = pagina.split('-');
    var pag = val_pag[2];
    $("#col-md-12").load("./"+pag+".php");
  }
  $(".navbar-collapse").removeClass('in');
  $(".navbar-collapse").addClass('collapse');

  $("li").removeClass('menu-activo');
  if($(this).parent("li").hasClass('dropdown')){
    $(this).parent("li").addClass('menu-activo');
  }
  else{
    $(this).closest(".dropdown").addClass('menu-activo');
  }
  mensajesRecibidos();
}
// funcion que se ejecuta al hacer click en la region del logo superior izquierda
function irInicio(argument) {
  espereshow();
  $("#col-md-12").load("./home.php");
}


// home

// Funcion que carga el calendario
function cargarHome () {
  $(".home-accesos").on("click", irPagina);
  $(".home-accesos").on("touch", irPagina);
  var boton = $("div.otros-dias");
  boton.on("click", colorEvento);
  boton.on("touch", colorEvento);
  $("div#home-cont-cal").on("click", mostrarEventosDia);
  $("div#home-cont-cal").on("touch", mostrarEventosDia);
  var ancho_pag = window.innerWidth;
  if(ancho_pag < 991){
    setTimeout(function(){
      $(".home-content:first").css('height', '450px');
    }, 50);
  }
  else{
    heightEvento(".home-content");
  }
  var dia = $("#home-dia-cal").data('dia');
  $(".otros-dias").each(function(index, el) {
    if($(this).data('dia') === dia){
      var nspan = $(this).children('span.pull-right');
      var col = 1;
      if(nspan.length > 0){$("#home-tip-cal").removeClass('hidden');}
      if(nspan.length === 1){col = 12;}
      else if(nspan.length === 2){col = 6;}
      else if(nspan.length === 3){col = 4;}
      else if(nspan.length === 4){col = 3;}
      $(this).children('span.pull-right').each(function(index, el) {
        var clas = $(this).attr('class');
        var clase = clas.split(' ');
        var classe = clase[2];
        $("#home-tip-cal").append('<div class="col-xs-'+col+' col-sm-'+col+' col-md-'+col+' col-lg-'+col+' '+classe+' eventosdia pull-right">&nbsp;</div>');
      });
    }
  });
  setTimeout(esperehide, 1500);
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
  var altopag = resizePag();
  var button = $(this);
  $("div.btn-default").removeClass('active');
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
  var nspan = button.children('span.pull-right');
  var col = 1;
  if(nspan.length > 0){$("#home-tip-cal").removeClass('hidden');}
  if(nspan.length === 1){col = 12;}
  else if(nspan.length === 2){col = 6;}
  else if(nspan.length === 3){col = 4;}
  else if(nspan.length === 4){col = 3;}
  $("#home-tip-cal").html("");
  button.children('span.pull-right').each(function(index, el) {
    var clas = $(this).attr('class');
    var clase = clas.split(' ');
    var classe = clase[2];
    $("#home-tip-cal").append('<div class="col-xs-'+col+' col-sm-'+col+' col-md-'+col+' col-lg-'+col+' '+classe+' eventosdia pull-right">&nbsp;</div>');
  });
  var contenedor = $("div#home-cont-cal");
  var dia = contenedor.find('#home-dia-cal').data('dia');
  var mes = contenedor.find('#home-mes-cal').data('mes');
  var anio = contenedor.find('#home-mes-cal').data('anio');
  var fecha = dia +"-"+ mes +"-"+ anio;
  $(".ing-cal").load("home-detalle.php?fecha=" + fecha);
  $(".ing-cal").height(altopag);
  $(".ing-cal").removeClass('hidden');
}
// Funcion que muestra una pagina tipo modal con los eventos del dia al que se le hace click
function mostrarEventosDia(datos) {
  var altopag = resizePag();
  var contenedor = $(this);
  var dia = contenedor.find('#home-dia-cal').data('dia');
  var mes = contenedor.find('#home-mes-cal').data('mes');
  var anio = contenedor.find('#home-mes-cal').data('anio');
  var fecha = dia +"-"+ mes +"-"+ anio;
  $(".ing-cal").load("home-detalle.php?fecha=" + fecha);
  $(".ing-cal").height(altopag);
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
  var altopag = resizePag();
  var id = $(this).closest('div.evento').data('id');
  // alert(id);
  $(".ing-cal").load("./cal_ver_evento.php?id=" + id);
  $(".ing-cal").height(altopag);
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


// Estado financiero

// fincion que se ejecuta al cargar la pagina de estado financiero
function cargaEstadoFinanciero () {
  $(".btn-anios").on("click", consultarEstadoAnio);
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


// Documentos

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
  setTimeout(function(){
    if($("#"+div_panel).hasClass('collapse')){
      $(".panel-body").removeClass('in');
      $(".panel-body").addClass('collapse');
      $("#"+div_panel).removeClass('collapse');
      $("#"+div_panel).addClass('in');
    }
    else{
      $(".panel-body").removeClass('in');
      $(".panel-body").addClass('collapse');
    }
  }, 100);
  setTimeout(esperehide, 500);
}
// Funciones que se ejecuta cuando se carga el listado de documentos
function editarDocs () {
  $(".btn").on("click", agregarEditarBorrarDoc);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta cuando se hace click en un boton en el listado de documentos
function agregarEditarBorrarDoc (datos) {
  var altopag = resizePag();
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
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      return false;
      break;
    case "Editar detalle del documento":
      $(".ing-cal").load("editar-agregar-documento.php?tipo="+tipo+"&id="+id+"&edit=1");
      $(".ing-cal").height(altopag);
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
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      return false;
      break;
  }
  return false;
}


// Quienes

// Funcion que se ejecuta al cargar la pagina de quienes somos
function cargarQuienes () {
  $(".panel").on("click", verPerfil);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en las imagenes de quienes somos
function verPerfil(datos) {
  espereshow();
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
      $("#"+div_panel).load("edificio.php?id_proy=" + sess_proy);
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
  setTimeout(function(){
    if($("#"+div_panel).hasClass('collapse')){
      $(".panel-body").removeClass('in');
      $(".panel-body").addClass('collapse');
      $("#"+div_panel).removeClass('collapse');
      $("#"+div_panel).addClass('in');
    }
    else{
      $(".panel-body").removeClass('in');
      $(".panel-body").addClass('collapse');
    }
  }, 100);
}
// funcion que se ejecuta al cargar la pagina tipo modal del admnistrador
function cargarPerfil () {
  $('dt').on("click", abrirPestana);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en la pestaña del acodeon azul en edificio - quienes somos
function abrirPestana(event) {
  espereshow();
  event.preventDefault();
  $('dd').hide();
  // si esta activo oculta el div y quita la clase activo
  if ($(this).hasClass('activo')) {
    $(this).removeClass('activo');
    $(this).next().hide();
    setTimeout(esperehide, 100);
  }
  // si no se esta mostrando se muestra y se agrega la clase activo
  else {
    // oculta todos los div activos
    $('dd').hide();
    $('dt').removeClass('activo');
    $(this).addClass('activo');
    $(this).next().show();
    setTimeout(esperehide, 100);
    // cargamos la pagina al dd correspondiente
    // $(this).next().load(pag);
  }
}


// Contactos

// fincion que se ejecuta al mostrar el formulario de agregar, editar o ver documento
function editDocumento () {
  $(".box_contac.form-contacto").load("form_cont.php");
  $(".btn-danger").on("click", cerrarModalDocs);
  $(".close").on("click", cerrarModalDocs);
  $('.box-contac').on('mouseover', mostrarOcultarIconosContac);
  $('.box-contac').on('mouseout', mostrarOcultarIconosContac);
  $("div.iconos-edit-cont > span.glyphicon.glyphicon-pencil").on("click", abrirFormContacto);
  $("div.iconos-edit-cont > span.glyphicon.glyphicon-remove").on("click", abrirFormContacto);
  $("div#new-contact").on("click", abrirFormContacto);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al pasar el puntero del mouse o sacarlo del contenedor de la informacion del contacto
function mostrarOcultarIconosContac(argument) {
  $(this).find('.iconos-edit-cont').toggleClass('hidden');
}
// funcion que se ejecuta al hacer click en los iconos de editar o eliminar en contactos
function abrirFormContacto(argument) {
  espereshow();
    var boton = $(this);
    var botonHTML = boton.attr('title');
    if(botonHTML === 'Nuevo Contacto'){
      $("#col-md-12").load("contacto-form.php");
    }
    else if(botonHTML === 'Eliminar Contacto'){
      setTimeout(esperehide, 500);
      var data_id = boton.data('id');
      swal({
         title: "¿Esta Seguro?",
         text: "Se borrará el registro con # id " + data_id,
         type: "warning",
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#F8BB86",
         confirmButtonText: "Eliminar!",
         closeOnConfirm: false
      },
      function(){
        $.ajax({
          url:"../php/ins_upd_contacto.php",
          cache:false,
          type:"POST",
          data:"id_sup="+data_id,
          success: function(datos){
            if(datos !== ''){
              swal({
                  title: "Felicidades!",
                  text: "El registro se ha guardado correctamente!",
                  type: "success",
                  confirmButtonText: "Continuar",
                  confirmButtonColor: "#94B86E"
              },
              function(){
                  $("#col-md-12").load("contactos.php");
              });
            }
            else{
              setTimeout(esperehide, 500);
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
    }
    else if(botonHTML === 'Editar Contacto'){
      setTimeout(esperehide, 500);
      var data_id = boton.data('id');
      $("#col-md-12").load("contacto-form.php?id_upd=" + data_id);
    }
}
// funcion que se ejecuta al cargar el php del formulario de contacto
function cargaFormContacto() {
  var formQuienes = $("#form-contacto");
  formQuienes.find('#rmb_tcont_id').on("change", mostrarIconoContacto);
  $(".btn.btn-default.regresar").on("click", volverContacto);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton regresar del form contacto
function volverContacto(argument) {
  espereshow();
  $("#col-md-12").load("contactos.php");
}
// funcion que se ejecuta al seleccionar o cambiar el tipo de contacto en form contacto
function mostrarIconoContacto(argument) {
  var url_img = $(this).children(':selected').data('url');
  // alert(url_img);
  $("#vistaPrevia").attr('src', url_img);
}
// funcion que se ejecuta al cargar el mensaje de confirmacion de envio de mensaje en contactos
function cargaFormMensaje(argument) {
  $("button").on("click", mostrarFormCont);
}
// funcion que se ejecuta al hacer click en el boton nuevo mensaje en el mensaje de confirmacion de envio mensaje en contacto
function mostrarFormCont(argument) {
  $(".box_contac.form-contacto").load("form_cont.php");
}


// Mensajes

// Funcion que se ejectuta al cargar la pagina de mensajes
function verMensajes () {
  $("#mensajes").load("lista-mensajes.php");
  $("button").on("click", accionMensajes);
  setTimeout(esperehide, 500);
}
// Funcion que se ejecuta al hacer click en los botones de la pagina de mensajes
function accionMensajes (datos) {
  var altopag = resizePag();
  var tipoboton = $(this).attr('id');
  switch(tipoboton){
    case 'recibidos':
      $("#mensajes").load("lista-mensajes.php?tipo=para");
      history.pushState({page: "lista-mensajes.php?tipo=para"}, "Mensajes Recibidos", "mensajes-recibidos.html");
      $("button").removeClass('active');
      $(this).addClass('active');
      break;
    case 'enviados':
      $("#mensajes").load("lista-mensajes.php?tipo=de");
      history.pushState({page: "lista-mensajes.php?tipo=de"}, "Mensajes Enviados", "mensajes-enviados.html");
      $("button").removeClass('active');
      $(this).addClass('active');
      break;
    case 'nuevo':
      $(".ing-cal").load("agregar-actualizar-mensaje.php");
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
  }
}
// funcion que se ejecuta al carga la lista de mensajes
function cargarListaMensajes () {
  $(".panel").on("click", mostrarMensaje);
  $("button").on("click", accionMensaje);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el encabezado del mensaje
function mostrarMensaje (datos) {
  espereshow();
  var esto = $(this);
  var tipo = $("#tipo").val();
  var panel = $(this).attr('href');
  var href_panel = $(esto).attr('href');
  // hacemos un split al valor de href para obtener el id del elemnto a cambiar el estado
  var id_panel = href_panel.split("#collapseExample");
  $("#mensajes").load("lista-mensajes-detalle.php?id_mens="+id_panel[1]+"&tipo="+tipo);
  // $(".panel-body").removeClass('in');
  // $(".panel-body").addClass('collapse');
  var cl_mens = $(this).children('.mens-est').attr('class');
  var cl_est = cl_mens.split(" ");
  if((cl_est[1] === 'btn-danger') && (tipo === 'para')){
    $.ajax({
      url:"../php/ins_upd_mens.php",
      cache:false,
      type:"POST",
      data: { id_upd: id_panel[1], rmb_est_id: "7" },
      success: function(datos){
        if(datos !== ''){
          setTimeout(function(){
            $(esto).children('.mens-est').removeClass('btn-danger');
            $(esto).children('.mens-est').addClass('btn-info');
          }, 5000);
        }
      }
    });
  }
}
// funcion que se ejecuta al carga la lista de mensajes en detalle
function cargarListaMensajesDetalle () {
  $(".panel").on("click", mostrarMensajeDetalle);
  $("button").on("click", accionMensaje);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el encabezado del mensaje detalle
function mostrarMensajeDetalle (datos) {
  var esto = $(this);
  var tipo = $("#tipo").val();
  var panel = $(this).attr('href');
  var href_panel = $(esto).attr('href');
  // hacemos un split al valor de href para obtener el id del elemnto a cambiar el estado
  var id_panel = href_panel.split("#collapseExample");
  // $("#mensajes").load("lista-mensajes-detalle.php?id_mens="+id_panel[1]+"&tipo="+tipo);
  $(".panel-body").removeClass('in');
  $(".panel-body").addClass('collapse');
  var cl_mens = $(this).children('.mens-est').attr('class');
  var cl_est = cl_mens.split(" ");
  if((cl_est[1] === 'btn-danger') && (tipo === 'para')){
    $.ajax({
      url:"../php/ins_upd_mens.php",
      cache:false,
      type:"POST",
      data: { id_upd: id_panel[1], rmb_est_id: "7" },
      success: function(datos){
        if(datos !== ''){
          setTimeout(function(){
            $(esto).children('.mens-est').removeClass('btn-danger');
            $(esto).children('.mens-est').addClass('btn-info');
          }, 5000);
        }
      }
    });
  }
}
// Funcion que se ejecuta al hacer click en los botones de la pagina de mensajes
function accionMensaje (datos) {
  var altopag = resizePag();
  var id_mensaje = $(this).parent("div").attr('id-mensaje');
  var tipoboton = $(this).html();
  switch(tipoboton){
    case 'Reenviar':
      $(".ing-cal").load("reenviar-mensaje.php?id_mensaje="+id_mensaje);
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'Responder':
      $(".ing-cal").load("responder-mensaje.php?id_mensaje="+id_mensaje);
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
  }
}

// Question

// Funcion que se ejecuta al cargar la pagina de question
function cargarQuestion () {
  $(".panel").on("click", verRespuesta);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en las imagenes de quienes somos
function verRespuesta(datos) {
  espereshow();
  var div_panel = $(this).attr('aria-controls');
  var tipo = div_panel.split("collapseExample");
  
  setTimeout(function(){
    if($("#"+div_panel).hasClass('collapse')){
      $(".panel-body").removeClass('in');
      $(".panel-body").addClass('collapse');
      $("#"+div_panel).removeClass('collapse');
      $("#"+div_panel).addClass('in');
    }
    else{
      $(".panel-body").removeClass('in');
      $(".panel-body").addClass('collapse');
    }
    setTimeout(esperehide, 500);
  }, 100);
}


// Edificio

// Funcion que se ejecuta al cargar la pagina de estados financieros listado
function accionEstFinanciero () {
  $(".btn").on("click", verEstFinanciero);
  setTimeout(esperehide, 500);
  setTimeout(cerrar_alert, 8000);
}
// funcion que se ejecuta al hacer click en los botones de la lista de estados financieros
function verEstFinanciero (datos) {
  var altopag = resizePag();
  var clase = $(this).attr('class');
  switch(clase){
    case 'btn btn-info':
      $(".ing-cal").load("tes_edit.php");
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'btn btn-success':
      $(".ing-cal").load("tes_edit.php");
      $(".ing-cal").height(altopag);
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


// Estadisticas

// function que se ejecuta al cargar la pagina de estadisticas
function cargarEstadisticas (argument) {
  setTimeout(esperehide, 500);
}


// Cambiar contraseña

// funcion que se ejecuta al cargar el formulario de cambiar contraseña
function cargaFormPass(argument) {
  $(".btn.btn-default.regresar").on("click", irInicio);
  setTimeout(esperehide, 500)
}


// Perfil

// funcion que se ejecuta al cargar la página de perfil
function cargaPerfil(argument) {
  $("button.btn.btn-default").on("click", actualizaDatos);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton de actualizar datos en la página de perfil
function actualizaDatos(argument) {
  var altopag = resizePag();
  $(".ing-cal").load("perfil-actualizar.php");
  $(".ing-cal").height(altopag);
  $(".ing-cal").removeClass('hidden');
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




























$(document).on('ready', cargarInicio);









