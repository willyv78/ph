// variables globales
var sess_id   = $("#user_id").val();
var sess_perf = $("#sess_user_perf").val();
var sess_mail = $("#sess_user_mail").val();
var sess_proy = 1;

// funcion que escucha el boton atras del navegador
window.onpopstate = function(e){
  if(e.state){
    var pagina = e.state.page;
    var pag = pagina.split('.php');
    if(pag[0] === 'lista-mensajes'){
      $("#col-md-12").load("./mensajes.php");
      $("button").removeClass('active');
      $("#recibidos").addClass('active');
    }
    else if(pag[0] === 'lista-mensajes'){
      $("#col-md-12").load("./mensajes.php");
      setTimeout(function(){
        $("#mensajes").load(e.state.page);
        $("button").removeClass('active');
        $("#enviados").addClass('active');
      }, 200);
    }
    else if(pag[0] === 'equipos-por-tipo'){
      $("#col-md-12").load("./equipos-y-mantenimientos.php");
      setTimeout(function(){
        $("#content-mant").load("./"+e.state.page);
      }, 100);
    }
    else{
      $("#col-md-12").load("./"+e.state.page);
    }
    
    console.log("location: " + document.location + ", state: " + JSON.stringify(e.state));
  }
};

// Funcion que se ejecuta para ver el mensaje de cargando
function espereshow (){
  mensajesRecibidos();
  $('.espere').fadeIn('fast');
}
//  Función que se ejecuta para ocultar el mensaje de cargando
function esperehide() {
  $('.espere').fadeOut('slow');
  setTimeout(function(){
    var altopag = resizePagFooter();
    altopag = altopag - 101;
    $("body").height(altopag);
  }, 100);
}
// Funcion que cierra automaticamente un mensaje de alerta.
function cerrar_alert () {
   $('.alert').fadeOut('slow');
}
//funcion para pre cargar la imagen seleccionada en campo tipo file imagen
function PreImagen(campo, e){
   var Lector, oFileInput = campo;
   if (oFileInput.files.length !== 0) {
      Lector = new FileReader();
      Lector.onloadend = function(e) {
         jQuery('#vistaPrevia').attr('src', e.target.result);
         jQuery('#vistaPrevia').attr('width', "150px");
         jQuery('#vistaPrevia').attr('height', "150px");          
         };
      Lector.readAsDataURL(oFileInput.files[0]);
   }      
}
//funcion para pre cargar la imagen de un archivo en campo tipo file imagen
function PreImagen2(campo, e){
  var url = campo.split(".");
  var src = "../images/TiposArchivo/"+url[1]+".png";
  jQuery('#vistaPrevia2').attr('src', src);
  jQuery('#vistaPrevia2').parent('a').attr('href', '../images/residentes/'+campo);
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
// funcion que redimenciona la pagina para ajustar el footer
function resizePagFooter(argument) {
  var header = $(".navbar-inverse").outerHeight();
  var content = $("#col-md-12").outerHeight();
  var footer = $("footer").outerHeight();
  var screen = window.innerHeight;
  // alert(screen);cont-pag
  var res_height = header + content + footer;
  if(res_height < screen){
    var total = screen;
  }
  else{
    var total = res_height;
  }
  return total;
}
// funcion que redimenciona la pagina para ajustar el div cal
function resizePag(argument) {
  var header = $(".navbar-inverse").outerHeight();
  var content = $("#cont-pag").outerHeight();
  var footer = $("footer").outerHeight();
  var screen = window.innerHeight;
  // alert(screen);cont-pag
  var res_height = header + content + footer + 55;
  if(res_height < screen){var total = screen;}
  else{var total = res_height;}
  return total;
}
// funcion que se ejecuta al hacer click en la region del logo superior izquierda
function irInicio() {
  espereshow();
  $("#col-md-12").load("./lista-de-apartamentos.php");
}
// funcion que se ejecuta al cargar la pagina del detalle de eventos en el home
function heightEvento(clase) {
  var heights = $(clase).map(function() {
      return $(this).height();
  }).get(),
  maxHeight = Math.max.apply(null, heights);
  setTimeout(function(){$(clase).height(maxHeight);}, 50);
}
// Funcion que carga el home
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
  $("#col-md-12").load("./"+pag+".php");
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
// Funcion que se ejecuta al hacer click en ver mas en cada uno de los eventos
function mostrarMasEvento() {
  var altopag = resizePag();
  var id = $(this).closest('div.evento').data('id');
  // alert(id);
  $(".ing-cal").load("./cal_ver_evento.php?id=" + id);
  $(".ing-cal").height(altopag);
  $(".ing-cal").removeClass('hidden');
}
// funcion que se ejecuta al cargar el detalle del evento
function cargaDetalleEvento() {
  $("button.btn-close").on("click", cerrarModalDocs);
  $("button.btn-default").on('click', regresarModalCal);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton regresar del detalle del evento
function regresarModalCal() {
  var fecha = $(this).data('fecha');
  // alert(fecha);
  // $(this).closest("div.ing-cal").html("");
  $(this).closest("div.ing-cal").load("./home-detalle.php?fecha=" + fecha);
  // $(this).closest("div.ing-cal").removeClass('hidden');
}
// Funcion que carga la pagina inicial 0 en el administrador
function cargarInicio() {
  $("#col-md-12").load("./lista-de-apartamentos.php");
  $(".menu_movil").on('click', cargarPagina);
  $(".menu_movil").on('touch', cargarPagina);
  $("#logo_edif").on('click', irInicio);
  $("#logo_edif").on('touch', irInicio);
  history.pushState({page: "lista-de-apartamentos.php"}, "lista de apartamentos", "lista-de-apartamentos.html");
}
// Funcion que se ajecuta cuando se hace click en un item del menu
function cargarPagina (event) {
  espereshow();
  event.preventDefault();
  var date = new Date();
  var time = date.getTime();
  var pagina = $(this).attr('href');
  // $("#col-md-12").html("");
  if(pagina === '#lista-de-apartamentos.html'){
    $("#col-md-12").load("./lista-de-apartamentos.php");
    history.pushState({page: "ista-de-apartamentos.php"}, "lista de apartamentos", "lista-de-apartamentos.html");
  }
  else if(pagina === '#tipos-de-apartamento.html'){
    $("#col-md-12").load("./tipos-de-apartamento.php");
    history.pushState({page: "tipos-de-apartamento.php"}, "Tipos de apartamento", "tipos-de-apartamento.html");
  }
  else if(pagina === '#equipos-y-mantenimientos-activos.html'){
    $("#col-md-12").load("./equipos-y-mantenimientos.php");
    history.pushState({page: "equipos-y-mantenimientos.php"}, "Equipos Activos", "equipos-activos.html");
  }
  else if(pagina === '#equipos-y-mantenimientos-inactivos.html'){
    $("#col-md-12").load("./equipos-y-mantenimientos.php?inactivos=true");
    history.pushState({page: "equipos-y-mantenimientos.php?inactivos=true"}, "Equipos Inactivos", "equipos-inactivos.html");
  }
  else if(pagina === '#mensajes.html'){
    $("#col-md-12").load("./mensajes.php");
    history.pushState({page: "mensajes.php"}, "Mensajes", "mensajes-recibidos.html");
  }
  else if(pagina === '#documentos.html'){
    $("#col-md-12").load("./documentos.php");
    history.pushState({page: "documentos.php"}, "Documentos", "documentos.html");
  }
  else if(pagina === '#calendario.html'){
    $("#col-md-12").load("./calendario.php");
    history.pushState({page: "calendario.php"}, "Calendario / Eventos", "calendario.html");
  }
  else if(pagina === '#estadisticas.html'){
    $("#col-md-12").load("./estadisticas.php?v="+time);
    history.pushState({page: "estadisticas.php?v="+time}, "Estadisticas", "estadisticas.html");
  }
  else if(pagina === '#lista-empleados.html'){
    $("#col-md-12").load("./lista-empleados.php");
    history.pushState({page: "lista-empleados.php"}, "Lista de empleados", "lista-empleados.html");
  }
  else if(pagina === '#tareas.html'){
    $("#col-md-12").load("./tareas.php");
    history.pushState({page: "tareas.php"}, "Tareas", "tareas.html");
  }
  else if(pagina === '#contactos.html'){
    $("#col-md-12").load("./contactos.php");
    history.pushState({page: "contactos.php"}, "Contactos", "contactos.html");
  }
  else if(pagina === '#quienes-somos.html'){
    $("#col-md-12").load("./quienes-somos.php");
    history.pushState({page: "quienes-somos.php"}, "¿Quienes Somos?", "quienes-somos.html");
  }
  else if(pagina === '#lista-de-zonas.html'){
    $("#col-md-12").load("./lista-master.php?tabla=rmb_zonas&nom=Zonas");
    history.pushState({page: "lista-master.php?tabla=rmb_zonas&nom=Zonas"}, "Lista de Zonas", "lista-de-zonas.html");
  }
  else if(pagina === '#lista-de-parqueaderos.html'){
    $("#col-md-12").load("./lista-master.php?tabla=rmb_parq&nom=Parqueaderos");
    history.pushState({page: "lista-master.php?tabla=rmb_parq&nom=Parqueaderos"}, "Lista de Parqueaderos", "lista-de-parqueaderos.html");
  }
  else if(pagina === '#lista-de-depositos.html'){
    $("#col-md-12").load("./lista-master.php?tabla=rmb_depos&nom=Depositos");
    history.pushState({page: "lista-master.php?tabla=rmb_depos&nom=Depositos"}, "Lista de Depósitos", "lista-de-depositos.html");
  }
  else if(pagina === '#estadisticas-servicios-publicos.html'){
    $("#col-md-12").load("./estadisticas-servicios-publicos.php?tabla=rmb_servicios&nom=ServiciosPublicos");
    history.pushState({page: "estadisticas-servicios-publicos.php?tabla=rmb_servicios&nom=ServiciosPublicos"}, "Estadisticas de los servicios públicos", "estadisticas-servicios-publicos.html");
  }
  else if(pagina === '#servicios-publicos.html'){
    $("#col-md-12").load("./publicos.php?tabla=rmb_servicios&nom=ServiciosPublicos");
    history.pushState({page: "publicos.php?tabla=rmb_servicios&nom=ServiciosPublicos"}, "Lista de Consumos de Servicios Públicos", "servicios-publicos.html");
  }
  else if(pagina === '#evaluaciones.html'){
    $("#col-md-12").load("./evaluacion-lista.php");
    history.pushState({page: "evaluacion-lista.php"}, "Lista de Evaluaciones", "evaluaciones.html");
  }
  else if(pagina === '#categorias.html'){
    $("#col-md-12").load("./evaluacion-lista-cate.php");
    history.pushState({page: "evaluacion-lista-cate.php"}, "Lista de categorias", "categorias.html");
  }
  else if(pagina === '#temas.html'){
    $("#col-md-12").load("./evaluacion-lista-tema.php");
    history.pushState({page: "evaluacion-lista-tema.php"}, "Lista de temas", "temas.html");
  }
  else if(pagina === '#calificar-evaluacion.html'){
    $("#col-md-12").load("./calificar-evaluacion.php");
    history.pushState({page: "calificar-evaluacion.php"}, "Calificar Evaluación", "calificar-evaluacion.html");
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
    history.pushState({page: pag+".php"}, pag, pag+".html");
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
// Funcion que se ejecuta al cargar la pagina de estados financieros listado
function accionEstFinanciero () {
  $(".btn-accion").on("click", verEstFinanciero);
  setTimeout(function(){$("#tabla > thead > tr > th:last-child").removeClass('sorting');}, 100);
  $(".btn-default.form-control").on("click", enviarResultados);
  setTimeout(esperehide, 500);
  // setTimeout(cerrar_alert, 8500);
}
// funcion que se ejecuta al hacer click en los botones de la lista de estados financieros
function verEstFinanciero (event) {
  espereshow();
  event.preventDefault();
  var altopag = resizePag();
  var id_apto = $(this).parent('a').parent('td').attr('name');
  var clase = $(this).attr('title');
  var fecha = new Date();
  var anio = fecha.getFullYear();
  switch(clase){
    case 'Estado Financiero':
      $(".ing-cal").load("estado-financiero.php?id_apto=" + id_apto + "&anio=" + anio);
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'Datos del Apartamento':
      $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apto);
      history.pushState({page: "detalle-del-apartamento.php?id_apto="+id_apto}, "Detalle del apartamento", "detalle-del-apartamento.html");
      break;
    case 'Enviar mensaje':
      // $(".ing-cal").load("contactar-al-administrador.php");
      // $(".ing-cal").height(altopag);
      // $(".ing-cal").removeClass('hidden');
      break;
    case 'Nuevo registro':
      $("#col-md-12").load('detalle-del-apartamento.php');
      history.pushState({page: "detalle-del-apartamento.php"}, "Detalle del apartamento", "detalle-del-apartamento.html");
      break;
  }
}
// funcion que se ejecuta al hacer click en el boton enviar en el resultados individuales encuesta
function enviarResultados(argument) {
  $(".ing-cal").load("lista-de-apartamentos-creaPDF.php");
  swal({
    title: "Atención!",
    text: "Escriba una dirección de correo electrónico:",
    type: "input",
    inputType: "text",
    inputPlaceholder: "Correo electrónico",
    showLoaderOnConfirm: true,
    showCancelButton: true,
    closeOnConfirm: false,
    cancelButtonText: "Cancelar",
    confirmButtonText: "Enviar"
  },
  function(inputValue){
    if (inputValue === false){
      return false;
    }
    else if (inputValue === "") {
      swal.showInputError("Digite un correo electrónico");
      return false;
    }
    else{
      swal.close();
      espereshow();
      var request = $.ajax({
        url: "lista-de-apartamentos-enviaPDF.php",
        method: "POST",
        data: { email : inputValue },
        dataType: "html"
      });
      request.done(function( datos ) {
        if(datos.length){
          setTimeout(esperehide, 500);
          swal({
            title: "Felicidades!",
            text: "Los resultados se han enviado al correo "+inputValue,
            type: "success",
            confirmButtonText: "Continuar",
            confirmButtonColor: "#94B86E"
          },
          function(){
            $(".ing-cal").html("");
            $(".ing-cal").addClass('hidden');
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
      });
      request.fail(function( jqXHR, textStatus ) {
          setTimeout(esperehide, 500);
          swal({
              title: "Error!",
              text: "Ha ocurrido un error,\nrevise la información diligenciada he intentelo nuevamente.",
              type: "error",
              confirmButtonText: "Aceptar",
              confirmButtonColor: "#E25856"
          });
          return;
      });
    }
  });
  $(".ing-cal").addClass('hidden');
}

// funcion para volver o cargar una pagina dad en el cuerpo del contenido
function regresarPagina (pagina) {
  $("#col-md-12").load("./"+pagina);
}
// Funcion que se ejecuta al cargar la pagina detalle del usuario
function camposDinamicos () {
  var id_apto = $("#id_apartamento").val();
  var pag = "form_apto.php?id_apto="+id_apto;
  $('dl a').on("click", abrirPestana);
  $('button.btn-default').on('click', botonRegresar);
  // $('#apto').addClass('activo');
  // $('#apto').parent('a').next().show();
  // cargamos la pagina al dd correspondiente
  // $('#apto').parent('a').next().load(pag);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hcer click en el boton regresar del detalle del apto.
function botonRegresar () {
  regresarPagina('lista-de-apartamentos.php');
}
// funcion que se ejecuta al hacer click en las pestallas de la informacion del apartamento
function abrirPestana (event) {
  espereshow();
  event.preventDefault();
  $('dl dd').hide();
  $('dl dd').html('');
  var tipo = $(this).attr('id');
  var id_apto = $("#id_apartamento").val();
  // oculta todos los div activos
  // $("dl dd").html("");
  // $('dl a dt').removeClass('activo');
  // $('dl dd').hide();
  if(tipo === 'apartamentos'){
    if(id_apto){
      pag = "form_apto.php?id_apto="+id_apto;
    }
    else{
      pag = "form_apto.php";
    }
  }
  else if(tipo === 'propietarios'){pag = "lista_residentes.php?id_apto="+id_apto+"&tipo_res=1&tipo_nom="+tipo;}
  else if(tipo === 'arrendatarios'){pag = "lista_residentes.php?id_apto="+id_apto+"&tipo_res=3&tipo_nom="+tipo;}
  else if(tipo === 'residentes'){pag = "lista_residentes.php?id_apto="+id_apto+"&tipo_res=2&tipo_nom="+tipo;}
  else if(tipo === 'empleados'){pag = "lista_residentes.php?id_apto="+id_apto+"&tipo_res=5&tipo_nom="+tipo;}
  else if(tipo === 'autorizadas'){pag = "lista_residentes.php?id_apto="+id_apto+"&tipo_res=7&tipo_nom="+tipo;}
  else if(tipo === 'emergencias'){pag = "lista_residentes.php?id_apto="+id_apto+"&tipo_res=9&tipo_nom="+tipo;}
  else if(tipo === 'locatarios'){pag = "lista_inmobiliarias.php?id_apto="+id_apto+"&tipo_res=6&tipo_nom="+tipo;}
  else if(tipo === 'inmobiliarias'){pag = "lista_inmobiliarias.php?id_apto="+id_apto+"&tipo_res=8&tipo_nom="+tipo;}
  else if(tipo === 'parqueaderos'){pag = "lista_parqueaderos.php?id_apto="+id_apto+"&tipo_nom="+tipo;}
  else if(tipo === 'depositos'){pag = "lista_depositos.php?id_apto="+id_apto+"&tipo_nom="+tipo;}
  else if(tipo === 'vehiculos'){pag = "lista_vehiculos.php?id_apto="+id_apto+"&tipo_nom="+tipo;}
  else if(tipo === 'mascotas'){pag = "lista_mascotas.php?id_apto="+id_apto+"&tipo_nom="+tipo;}
  else{pag = "lista_vulnerabilidades.php?id_apto="+id_apto+"&tipo_nom="+tipo;}
  // si esta activo oculta el div y quita la clase activo
  if ($(this).children('dt').hasClass('activo')) {
    $(this).children('dt').removeClass('activo');
    setTimeout(esperehide, 100);
  }
  // si no se esta mostrando se muestra y se agrega la clase activo
  else {
    // oculta todos los div activos
    $('dl a dt').removeClass('activo');
    $(this).children('dt').addClass('activo');
    $(this).next().show();
    // cargamos la pagina al dd correspondiente
    $(this).next().load(pag);
  }
}
// funcion que se ejecuta al cargar el listado de personas de servicio
function accionLista () {
  $(".btn").on("click", formLista);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de personal de servicio
function formLista (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  var tipo_res = $("#tipo_res").val();
  var tipo_nom = $("#tipo_nom").val();
  if(tipo === 'Nuevo registro'){
    $("#"+tipo_nom).next().load("./form_lista.php?id_apto="+id_apartamento+"&tipo_res="+tipo_res+"&tipo_nom="+tipo_nom);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#"+tipo_nom).next().load("./form_lista.php?id_habita="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res+"&id_apto_ver="+id_apartamento);
    }
    else if(tipo === 'Editar Información'){
      $("#"+tipo_nom).next().load("./form_lista.php?id_habita="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res);
    }
    else if(tipo === 'Eliminar'){
      // $("#"+tipo_nom).next().load("../php/ins_upd_prop.php?id_sup="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res);
      
      setTimeout(esperehide, 500);
      swal({
         title: "¿Esta Seguro?",
         text: "Se borrará el registro con # id " + id_habita,
         type: "warning",
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#F8BB86",
         confirmButtonText: "Eliminar!",
         closeOnConfirm: false
      },
      function(){
        $.ajax({
          url:"../php/ins_upd_prop.php",
          cache:false,
          type:"POST",
          data:"id_sup="+id_habita,
          success: function(datos){
            if(datos !== ''){
              // alert(datos);
              $("#"+tipo_nom).next().load('detalle-del-apartamento.php?id_apto='+id_apartamento);
              swal({
                  title: "Felicidades!",
                  text: "El registro se ha guardado correctamente!",
                  type: "success",
                  confirmButtonText: "Continuar",
                  confirmButtonColor: "#94B86E"
              },
              function(){
                  $("#propietario").addClass('activo');
                  pag = "lista_residentes.php?id_apto="+id_apartamento+"&tipo_res="+tipo_res+"&tipo_nom=propietarios";
                  $("#propietario").parent().next().load(pag);
                  $("#propietario").parent().next().show();
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
  } 
}
// funcion que se ejecuta al cargar el formulario de personas Servicio
function editarLista () {
  $("#cancelar").on("click", regresaListaServicio);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton cancelar del formulario de personal de sesrvicio
function regresaLista (datos) {
  var pag = $(this).attr('name');
  var id_apto = $("#id_apartamento").val();
  espereshow();
  $("#serv_content").load("./"+pag+"?id_apto="+id_apto);
}
// funcion que se ejecuta al cargar el listado de personas empleadas del edificio
function accionListaEmp () {
  $(".btn").on("click", formListaEmp);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de personas empleadas del edificio
function formListaEmp (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  var tipo_res = $("#tipo_res").val();
  var tipo_nom = $("#tipo_nom").val();
  if(tipo === 'Nuevo registro'){
    $("#"+tipo_nom).next().load("./form_lista.php?id_apto="+id_apartamento+"&tipo_res="+tipo_res);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#"+tipo_nom).next().load("./form_lista.php?id_habita="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res);
    }
    else if(tipo === 'Editar Información'){
      $("#"+tipo_nom).next().load("./form_lista.php?id_habita="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res);
    }
    else if(tipo === 'Eliminar'){
      $("#"+tipo_nom).next().load("../php/ins_upd_prop.php?id_habita="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res);
    }
  } 
}
// funcion que se ejecuta al cargar el formulario de personas empleadas del edificio
function editarListaEmp () {
  $("#cancelar").on("click", regresaListaServicio);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton cancelar del formulario de personas empleadas del edificio
function regresaListaEmp (datos) {
  var pag = $(this).attr('name');
  var id_apto = $("#id_apartamento").val();
  espereshow();
  $("#serv_content").load("./"+pag+"?id_apto="+id_apto);
}
// funcion que se ejecuta al cargar el listado de inmobiliarias o bancos
function accionListaInm () {
  $(".btn").on("click", formListaInm);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de inmobiliarias o bancos
function formListaInm (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  var tipo_res = $("#tipo_res").val();
  var tipo_nom = $("#tipo_nom").val();
  if(tipo === 'Nuevo registro'){
    $("#"+tipo_nom).next().load("./form_lista_inm.php?id_apto="+id_apartamento+"&tipo_res="+tipo_res);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#"+tipo_nom).next().load("./form_lista_inm.php?id_habita="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res);
    }
    else if(tipo === 'Editar Información'){
      $("#"+tipo_nom).next().load("./form_lista_inm.php?id_habita="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res);
    }
    else if(tipo === 'Eliminar'){
      $("#"+tipo_nom).next().load("../php/ins_upd_prop.php?id_habita="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res);
    }
  } 
}
// funcion que se ejecuta al cargar el listado de parqueaderos
function accionListaParq () {
  $(".btn").on("click", formListaParq);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de parqueaderos
function formListaParq (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  var tipo_nom = $("#tipo_nom").val();
  if(tipo === 'Nuevo registro'){
    $("#"+tipo_nom).next().load("./form_lista_parq.php?id_apto="+id_apartamento);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#"+tipo_nom).next().load("./form_lista_parq.php?id_parq="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Editar Información'){
      $("#"+tipo_nom).next().load("./form_lista_parq.php?id_parq="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Eliminar'){
      setTimeout(esperehide, 500);
      swal({
         title: "¿Esta Seguro?",
         text: "Se borrará el registro con # id " + id_habita,
         type: "warning",
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#F8BB86",
         confirmButtonText: "Eliminar!",
         closeOnConfirm: false
      },
      function(){
        $.ajax({
          url:"../php/ins_upd_parq.php",
          cache:false,
          type:"POST",
          data:"id_sup="+id_habita,
          success: function(datos){
            if(datos !== ''){
              // alert(datos);
              $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apartamento);
              swal({
                  title: "Felicidades!",
                  text: "El registro se ha guardado correctamente!",
                  type: "success",
                  confirmButtonText: "Continuar",
                  confirmButtonColor: "#94B86E"
              },
              function(){
                  $("#parqueadero").addClass('activo');
                  pag = "lista_parqueaderos.php?id_apto="+id_apartamento+"&tipo_nom=parqueaderos";
                  $("#parqueadero").parent().next().load(pag);
                  $("#parqueadero").parent().next().show();
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
  } 
}
// funcion que se ejecuta al cargar el formulario de parqueaderos
function newParq () {
  $(".btn-warning").on("click", nuevoParq);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton de nuevo parqueadero en el formulario de agregar parqueadero
function nuevoParq (datos) {
  var id_apto = $("#id_apto").val();
  $("#parqueaderos").next().load("newparq.php?id_apto="+id_apto);
}
// funcion que se ejecuta al cargar el listado de depositos
function accionListaDepos () {
  $(".btn").on("click", formListaDepos);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de depositos
function formListaDepos (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  var tipo_nom = $("#tipo_nom").val();
  if(tipo === 'Nuevo registro'){
    $("#"+tipo_nom).next().load("./form_lista_depos.php?id_apto="+id_apartamento);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#"+tipo_nom).next().load("./form_lista_depos.php?id_depos="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Editar Información'){
      $("#"+tipo_nom).next().load("./form_lista_depos.php?id_depos="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Eliminar'){
      setTimeout(esperehide, 500);
      swal({
         title: "¿Esta Seguro?",
         text: "Se borrará el registro con # id " + id_habita,
         type: "warning",
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#F8BB86",
         confirmButtonText: "Eliminar!",
         closeOnConfirm: false
      },
      function(){
        $.ajax({
          url:"../php/ins_upd_depos.php",
          cache:false,
          type:"POST",
          data:"id_sup="+id_habita,
          success: function(datos){
            if(datos !== ''){
              // alert(datos);
              $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apartamento);
              swal({
                  title: "Felicidades!",
                  text: "El registro se ha guardado correctamente!",
                  type: "success",
                  confirmButtonText: "Continuar",
                  confirmButtonColor: "#94B86E"
              },
              function(){
                  $("#deposito").addClass('activo');
                  pag = "lista_depositos.php?id_apto="+id_apartamento+"&tipo_nom=depositos";
                  $("#deposito").parent().next().load(pag);
                  $("#deposito").parent().next().show();
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
  } 
}
// funcion que se ejecuta al cargar el formulario de parqueaderos
function newDepos () {
  $(".btn-warning").on("click", nuevoDepos);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton de nuevo parqueadero en el formulario de agregar parqueadero
function nuevoDepos (datos) {
  var id_apto = $("#id_apto").val();
  $("#depositos").next().load("newdepos.php?id_apto="+id_apto);
}
// funcion que se ejecuta al cargar el listado de vehiculos
function accionListaVehi () {
  $(".btn").on("click", formListaVehi);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de vehiculos
function formListaVehi (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  var tipo_nom = $("#tipo_nom").val();
  if(tipo === 'Nuevo registro'){
    $("#"+tipo_nom).next().load("./form_lista_vehi.php?id_apto="+id_apartamento);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#"+tipo_nom).next().load("./form_lista_vehi.php?id_vehi="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Editar Información'){
      $("#"+tipo_nom).next().load("./form_lista_vehi.php?id_vehi="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Eliminar'){
      setTimeout(esperehide, 500);
      swal({
         title: "¿Esta Seguro?",
         text: "Se borrará el registro con # id " + id_habita,
         type: "warning",
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#F8BB86",
         confirmButtonText: "Eliminar!",
         closeOnConfirm: false
      },
      function(){
        $.ajax({
          url:"../php/ins_upd_vehi.php",
          cache:false,
          type:"POST",
          data:"id_sup="+id_habita,
          success: function(datos){
            if(datos !== ''){
              // alert(datos);
              $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apartamento);
              swal({
                  title: "Felicidades!",
                  text: "El registro se ha guardado correctamente!",
                  type: "success",
                  confirmButtonText: "Continuar",
                  confirmButtonColor: "#94B86E"
              },
              function(){
                  $("#vehiculo").addClass('activo');
                  pag = "lista_vehiculos.php?id_apto="+id_apartamento+"&tipo_nom=vehiculos";
                  $("#vehiculo").parent().next().load(pag);
                  $("#vehiculo").parent().next().show();
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
  } 
}
// funcion que se ejecuta al cargar el listado de mascotas
function accionListaMasc () {
  $(".btn").on("click", formListaMasc);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de mascotas
function formListaMasc (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  var tipo_nom = $("#tipo_nom").val();
  if(tipo === 'Nuevo registro'){
    $("#"+tipo_nom).next().load("./form_lista_masc.php?id_apto="+id_apartamento);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#"+tipo_nom).next().load("./form_lista_masc.php?id_masc="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Editar Información'){
      $("#"+tipo_nom).next().load("./form_lista_masc.php?id_masc="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Eliminar'){
      setTimeout(esperehide, 500);
      swal({
         title: "¿Esta Seguro?",
         text: "Se borrará el registro con # id " + id_habita,
         type: "warning",
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#F8BB86",
         confirmButtonText: "Eliminar!",
         closeOnConfirm: false
      },
      function(){
        $.ajax({
          url:"../php/ins_upd_masc.php",
          cache:false,
          type:"POST",
          data:"id_sup="+id_habita,
          success: function(datos){
            if(datos !== ''){
              // alert(datos);
              $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apartamento);
              swal({
                  title: "Felicidades!",
                  text: "El registro se ha guardado correctamente!",
                  type: "success",
                  confirmButtonText: "Continuar",
                  confirmButtonColor: "#94B86E"
              },
              function(){
                  $("#mascota").addClass('activo');
                  pag = "lista_mascotas.php?id_apto="+id_apartamento+"&tipo_nom=mascotas";
                  $("#mascota").parent().next().load(pag);
                  $("#mascota").parent().next().show();
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
  } 
}
// funcion que se ejecuta al cargar el listado de mascotas
function accionListaVuln () {
  $(".btn").on("click", formListaVuln);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de mascotas
function formListaVuln (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  var tipo_nom = $("#tipo_nom").val();
  if(tipo === 'Nuevo registro'){
    $("#"+tipo_nom).next().load("./form_lista_vuln.php?id_apto="+id_apartamento);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#"+tipo_nom).next().load("./form_lista_vuln.php?id_vuln="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Editar Información'){
      $("#"+tipo_nom).next().load("./form_lista_vuln.php?id_vuln="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Eliminar'){
      setTimeout(esperehide, 500);
      swal({
         title: "¿Esta Seguro?",
         text: "Se borrará el registro con # id " + id_habita,
         type: "warning",
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#F8BB86",
         confirmButtonText: "Eliminar!",
         closeOnConfirm: false
      },
      function(){
        $.ajax({
          url:"../php/ins_upd_vuln.php",
          cache:false,
          type:"POST",
          data:"id_sup="+id_habita,
          success: function(datos){
            if(datos !== ''){
              // alert(datos);
              $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apartamento);
              swal({
                  title: "Felicidades!",
                  text: "El registro se ha guardado correctamente!",
                  type: "success",
                  confirmButtonText: "Continuar",
                  confirmButtonColor: "#94B86E"
              },
              function(){
                  $("#vulnerabilidad").addClass('activo');
                  pag = "lista_vulnerabilidades.php?id_apto="+id_apartamento+"&tipo_nom=vulnerabilidades";
                  $("#vulnerabilidad").parent().next().load(pag);
                  $("#vulnerabilidad").parent().next().show();
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
  } 
}


// Tipo de apartamentos

// funcion que se ejecuta al cargar el listado de mascotas
function accionListaTaptos () {
  $(".btn").on("click", formListaTaptos);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de mascotas
function formListaTaptos (event) {
  espereshow();
  event.preventDefault();
  var tipo = $(this).attr('title');
  var tipo_nom = $("#tipo_nom").val();
  if(tipo === 'Nuevo registro'){
    $("#"+tipo_nom).load("./form_lista_taptos.php");
    history.pushState({page: "form_lista_taptos.php"}, "Nuevo tipo de apartamento", "formulario_tipo_de_apartamento.html");
  }
  else{
    var id_taptos = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#"+tipo_nom).load("./form_lista_taptos.php?id_taptos="+id_taptos+"&ver=1");
      history.pushState({page: "form_lista_taptos.php?id_taptos="+id_taptos+"&ver=1"}, "Ver tipo de apartamento", "formulario_tipo_de_apartamento.html");
    }
    else if(tipo === 'Editar Información'){
      $("#"+tipo_nom).load("./form_lista_taptos.php?id_taptos="+id_taptos);
      history.pushState({page: "form_lista_taptos.php?id_taptos="+id_taptos}, "Editar tipo de apartamento", "formulario_tipo_de_apartamento.html");
    }
    else if(tipo === 'Eliminar'){
      setTimeout(esperehide, 500);
      swal({
         title: "¿Esta Seguro?",
         text: "Se borrará el registro con # id " + id_taptos,
         type: "warning",
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#F8BB86",
         confirmButtonText: "Eliminar!",
         closeOnConfirm: false
      },
      function(){
        $.ajax({
          url:"../php/ins_upd_taptos.php",
          cache:false,
          type:"POST",
          data:"id_sup="+id_taptos,
          success: function(datos){
            if(datos !== ''){
              // alert(datos);
              $("#col-md-12").load('tipos-de-apartamento.php');
              history.pushState({page: "tipos-de-apartamento.php"}, "Lista tipos de apartamento", "tipos-de-apartamento.html");
              swal({
                  title: "Felicidades!",
                  text: "El registro se ha guardado correctamente!",
                  type: "success",
                  confirmButtonText: "Continuar",
                  confirmButtonColor: "#94B86E"
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
  } 
}
// funcion que se ejecuta al cargar la paginna del form de agregar o editar tipos de aptos
function cargaFormTaptos () {
  setTimeout(esperehide, 500);
  $(".btn-warning").on("click", agregarAptos);
  $("span").children(".glyphicon-remove").on("click", removerAptos);
  $(".btn-regresar").on("click", regresarLista);
}
// funcion que se ejecuta al hacer click en el boton mas del form de tipos de aptos
function agregarAptos (datos) {
  // obtenemos el numero del apartamento a agregar
  var apto = $("#rmb_aptos_nom").val();
  // validamos que se haya agregado un valor en el campo numero de apartamento
  if(apto){
    // creamos la variable que contiene lo que se va agregar
    var contenido = '<span><span class="rel-aptos">'+apto+'</span><i class="glyphicon glyphicon-remove"></i></span>';
    // por medio de ajax vamos a validar que el numero de apartamento no este asignado a otro tipo de apartamento
    $.ajax({
      url:"../php/val_aptos_x_taptos.php",
      cache:false,
      type:"POST",
      data:"id_apto="+apto,
      success: function(datos){
        if(datos === ''){
          // alert(datos);
          $("#rel-aptos").append(contenido);
        }
        else{
          setTimeout(esperehide, 500);
          swal({
            title: "Error!",
            text: "El # de apto. ya está asignado al tipo de apto. "+datos+",\ndebe eliminarlo para poder asignarlo nuevamente.",
            type: "error",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#E25856"
          });
          return;
        }
      }
    });
    $("#rmb_aptos_nom").val("");
    $("#rmb_aptos_nom").focus();
  }
  else{
    swal({
       title: "Error!",
       text: "Ingrese un número de apartamento",
       type: "warning",
       confirmButtonColor: "#F8BB86",
       confirmButtonText: "Entiendo!"
    },
    function () {
      $("#rmb_aptos_nom").focus();
    });
  }
  $("span").children(".glyphicon-remove").on("click", removerAptos);
}
// funcion que se ejecuta al hacer click en el icono remover de cada uno de los apartamentos agregados
function removerAptos (datos) {
  var apto = $(this).parent("span").children('span').html();
  var esto = $(this);
  swal({
     title: "¿Esta Seguro?",
     text: "Se borrará el apartamento " + apto,
     type: "warning",
     showCancelButton: true,
     cancelButtonText: "Cancelar",
     confirmButtonColor: "#F8BB86",
     confirmButtonText: "Eliminar!",
     closeOnConfirm: false
  },
  function(){
    $.ajax({
      url:"../php/ins_upd_aptos_x_taptos.php",
      cache:false,
      type:"POST",
      data:"id_sup="+apto,
      success: function(datos){
        if(datos !== ''){
          // alert(datos);
          $(esto).parent("span").remove();
          swal({
              title: "Felicidades!",
              text: "El registro se ha actualizado correctamente!",
              type: "success",
              confirmButtonText: "Continuar",
              confirmButtonColor: "#94B86E"
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
// funcion que se ejecuta al hacer click en el boton de regresar en el formulario de tipos de apartamento
function regresarLista (argument) {
  espereshow();
  $("#col-md-12").load('tipos-de-apartamento.php');
}


// Apartamentos

// funcion que se ejecuta al cargar el formulario del detalle del apartamento
function cargaFormAptos () {
  setTimeout(esperehide, 500);
  $("#rmb_aptos_nom").on("change", datosPredeterminados);
  $("input[name=rmb_aptos_habita]").on("change", habDeshCampo);
}
// funcion que se ejecuta al cambiar si esta habitado o no el apto
function habDeshCampo(argument) {
  var valor_input = $(this).val();
  if(valor_input === '0') {
    $("#rmb_aptos_numhab").attr('disabled', true);
  }
  else {
    $("#rmb_aptos_numhab").attr('disabled', false);
  }
}
// funcion que se ejecuta al hacer click en buscar tipo de apartamento por numero de apartamento
function datosPredeterminados (datos) {
  // obtengo el numero del apartamento
  var apto = $("#rmb_aptos_nom").val();
  var id_upd = $("#id_upd").val();
  var esto = $(this);
  // si hay informacion en el campo numero de apartamento hace esto
  if(apto){
    $.ajax({
      url:"../php/datos_tapto.php",
      cache:false,
      type:"POST",
      data: { apto: apto, id_upd: id_upd },
      success: function(datos){
        if(datos !== ''){
          // alert(datos);
          $('input').removeClass('input-disabled');
          data = datos.split("|");
          $("#rmb_aptos_area").val(data[0]).addClass('input-disabled');
          $("#rmb_aptos_priv").val(data[1]).addClass('input-disabled');
          $("#rmb_aptos_banos").val(data[2]).addClass('input-disabled');
          $("#rmb_aptos_coc").val(data[3]).addClass('input-disabled');
          $("#rmb_aptos_hab").val(data[4]).addClass('input-disabled');
          $("#rmb_aptos_balc").val(data[5]).addClass('input-disabled');
          $("#rmb_aptos_coef").val(data[6]).addClass('input-disabled');
          $(".nombre_tipo").html(data[7]).addClass('input-disabled');
          $("#rmb_taptos_id").val(data[8]).addClass('input-disabled');
          if(data[9] === '1'){
            $("#rmb_aptos_est1").attr('checked', 'checked');
          }
          else{
            $("#rmb_aptos_est2").attr('checked', 'checked');
          }
          if(data[10] === '1'){
            $("#rmb_aptos_serv1").attr('checked', 'checked');
          }
          else{
            $("#rmb_aptos_serv2").attr('checked', 'checked');
          }
          $("#rmb_aptos_terr").val(data[11]).addClass('input-disabled');
        }
        else{
          setTimeout(esperehide, 500);
          swal({
            title: "Error!",
            text: "Ha ocurrido un error,\nEl número de apartamento ya existe\n no puede utilizarlo.",
            type: "error",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#E25856"
          },
          function(){
            $("#rmb_aptos_nom").closest('dd').load("./form_apto.php?id_apto="+id_upd);
          });
          return;
        }
      }
    });
  }
}


// Tareas

// funcion que se ejecuta al cargar el listado de mascotas
function accionListaTareas () {
  $(".btn").on("click", formListaTareas);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de mascotas
function formListaTareas (event) {
  espereshow();
  event.preventDefault();
  var tipo = $(this).attr('title');
  var tipo_nom = $("#tipo_nom").val();
  if(tipo === 'Nuevo registro'){
    $("#"+tipo_nom).load("./form_lista_tareas.php");
    history.pushState({page: "form_lista_tareas.php"}, "Nuevo tipo de apartamento", "formulario_tipo_de_apartamento.html");
  }
  else{
    var id_tareas = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#"+tipo_nom).load("./form_lista_tareas.php?id_tareas="+id_tareas+"&ver=1");
      history.pushState({page: "form_lista_tareas.php?id_tareas="+id_tareas+"&ver=1"}, "Ver tipo de apartamento", "formulario_tipo_de_apartamento.html");
    }
    else if(tipo === 'Editar Información'){
      $("#"+tipo_nom).load("./form_lista_tareas.php?id_tareas="+id_tareas);
      history.pushState({page: "form_lista_tareas.php?id_tareas="+id_tareas}, "Editar tipo de apartamento", "formulario_tipo_de_apartamento.html");
    }
    else if(tipo === 'Eliminar'){
      setTimeout(esperehide, 500);
      swal({
         title: "¿Esta Seguro?",
         text: "Se borrará el registro con # id " + id_tareas,
         type: "warning",
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#F8BB86",
         confirmButtonText: "Eliminar!",
         closeOnConfirm: false
      },
      function(){
        $.ajax({
          url:"../php/ins_upd_taptos.php",
          cache:false,
          type:"POST",
          data:"id_sup="+id_tareas,
          success: function(datos){
            if(datos !== ''){
              // alert(datos);
              $("#col-md-12").load('tipos-de-apartamento.php');
              history.pushState({page: "tipos-de-apartamento.php"}, "Lista tipos de apartamento", "tipos-de-apartamento.html");
              swal({
                  title: "Felicidades!",
                  text: "El registro se ha guardado correctamente!",
                  type: "success",
                  confirmButtonText: "Continuar",
                  confirmButtonColor: "#94B86E"
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
  } 
}
// funcion que se ejecuta al cargar la paginna del form de agregar o editar tareas
function cargaFormTareas () {
  setTimeout(esperehide, 500);
  $(".btn-regresar").on("click", regresarListaTareas);
}
// funcion que se ejecuta al hacer click en el boton de regresar en el formulario de tareas
function regresarListaTareas (argument) {
  espereshow();
  $("#col-md-12").load('tareas.php');
}


// Equipos y mantenimientos

// Funcion que se ejecuta cuando se carga la pagina equipos y manteminiento en inventario
function cargarMantenimiento () {
  $("button#new").on("click", editMantenimiento);
  $("#content-mant").load("./tipos-de-equipos-y-mantenimiento.php");
  // setTimeout(cerrar_alert, 5000);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en nuevo o editar equipo
function editMantenimiento (datos) {
  espereshow();
  var altopag = resizePag();
  $("#cerrar_modal").on("click", cerrarModalDocs);
  $(".close").on("click", cerrarModalDocs);
  var id = $(this).parent("div").attr('id');
  var id_equipo = $(this).parent("div").attr('name');
  switch(id){
    case 'nuevo':
      $(".ing-cal").load("agregar-actualizar-equipo-por-tipo.php");
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'editar':
      $(".ing-cal").load("agregar-actualizar-equipo-por-tipo.php?id_equipo="+id_equipo);
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'historial':
      $(".ing-cal").load("historial-equipo-por-tipo.php?id_equipo="+id_equipo);
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'detalle':
      $(".ing-cal").load("ver-mas-equipo-por-tipo.php?id_equipo="+id_equipo);
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      // alert("Estamos aca");
      break;
    case 'regresar':
      $("#col-md-12").load("./equipos-y-mantenimientos.php");
      history.pushState({page: "equipos-y-mantenimientos.php"}, "Equipos Activos", "equipos-activos.html");
      break;
  }
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al cargar el formulario para agregar nuevo equipo o actualizar uno existente
function cargarAgregarActualizarEquipo () {
  $("#cerrar_modal").on("click", cerrarModalDocs);
  $(".close").on("click", cerrarModalDocs);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al cargar el listado de tipos de apartamento
function cargarTipoMantenimiento () {
  $(".tipos-apartamento").on("click", verEquiposTipo);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en la etiqueta a del listado de tipos de apartamento
function verEquiposTipo (event) {
  espereshow();
  event.preventDefault();
  var teq = $(this).attr('id');
  var url = "";
  var tipo_de_equipo = $("input#tipo-de-equipo").val();
  if(tipo_de_equipo){
    url = "&inactivo=true";
  }
  $("#content-mant").load("./equipos-por-tipo.php?teq="+teq+url);
  history.pushState({page: "equipos-por-tipo.php?teq="+teq+url}, "Equipos por tipo", "tipo-de-equipos-activos.html");
}
// funcion que se ejecuta al cargar los equipos por tipo
function cargarEquipoTipo () {
  $("button#history").on("click", editMantenimiento);
  $("button#edit").on("click", editMantenimiento);
  $("button#show").on("click", editMantenimiento);
  $("button#comeback").on("click", editMantenimiento);
  setTimeout(esperehide, 500);
}
// funcion que se ejecutat cuando se carga la pagina modal de ver mas en equipos
function cargaVerMas () {
  $(".close").on("click", cerrarModalDocs);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al cargar la pagina de historial de mantenimiento
function histoMantenimiento () {
  $(".close").on("click", cerrarModalDocs);
  $("button#new-mant").on("click", nuevoMantenimiento);
  $("tbody > tr").on("click", editarMantenimiento);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton nuevo en el historial de mantenimiento en equipos
function editarMantenimiento (datos) {
  var altopag = resizePag();
  var id_equipo = $("#rmb_equipos_id").val();
  var id_mantenimiento = $(this).attr('name');
  $(".ing-cal").addClass('hidden');
  $(".ing-cal").html('');
  swal({
    title: "¿Que desea hacer?",
    text: "Eliminar el Mantenimiento o editarlo",
    type: "warning",
    showCancelButton: true,
    cancelButtonText: "Eliminar",
    confirmButtonColor: "#F89406",
    confirmButtonText: "Editar!",
    closeOnConfirm: true
  },
  function(isConfirm){
    if (isConfirm) {
      $(".ing-cal").load("agregar-actualizar-mantenimiento-equipo.php?id_equipo="+id_equipo+"&id_mantenimiento="+id_mantenimiento);
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
    }
    else {
      espereshow();
      $.ajax({
        url:"../php/ins_upd_mant.php",
        cache:false,
        type:"POST",
        data:"id_sup="+id_mantenimiento,
        success: function(datos){
          setTimeout(esperehide, 500);
          if(datos !== ''){
            $(".ing-cal").addClass('hidden');
            $(".ing-cal").html('');
            swal({
              title: "Felicidades!",
              text: "El registro se ha eliminado correctamente!",
              type: "success",
              confirmButtonText: "Continuar",
              confirmButtonColor: "#94B86E"
            },
            function () {
              $(".ing-cal").load("historial-equipo-por-tipo.php?id_equipo="+id_equipo);
              $(".ing-cal").height(altopag);
              $(".ing-cal").removeClass('hidden');
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
    }
  });
}
// funcion que se ejecuta al hacer click en el boton nuevo en el historial de mantenimiento en equipos
function nuevoMantenimiento () {
  var altopag = resizePag();
  var id_equipo = $("#rmb_equipos_id").val();
  $(".ing-cal").load("agregar-actualizar-mantenimiento-equipo.php?id_equipo="+id_equipo);
  $(".ing-cal").height(altopag);
  $(".ing-cal").removeClass('hidden');
}
// Funcion que se ejecuta al hacer click en el boton cerrar en la ventana modal del formulario de ingreso, edicion o condulta de documentos
function cerrarModalModal (datos) {
  var altopag = resizePag();
  var id_equipo = $("#rmb_equipos_id").val();
  espereshow();
  $(".ing-cal").html('');
  $(".ing-cal").load("historial-equipo-por-tipo.php?id_equipo="+id_equipo);
  $(".ing-cal").height(altopag);
  $(".ing-cal").removeClass('hidden');
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al cargar la pagina de historial de mantenimiento
function detMantenimiento () {
  $(".close").on("click", cerrarModalModal);
  setTimeout(esperehide, 500);
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

// Contactos

// fincion que se ejecuta al mostrar el formulario de agregar, editar o ver documento
function editDocumento () {
  $(".box_contac.form-contacto").load("form_cont.php");
  $(".close").on("click", cerrarModalDocs);
  $(".input-group-addon").on("click", agregarAptosMens);
  $("span").children(".glyphicon-remove").on("click", removerAptosMens);
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

// Apartamentos

// funcion que se ejecuta al hacer click en el boton mas del form de tipos de aptos
function agregarAptosMens (datos) {
  var altopag = resizePag();
  var cont = 0;
  var id_repite = "";
  // obtenemos los datos del destinatario a agregar
  var valor = $("#rmb_residente_id").val();
  var texto = $("#rmb_residente_id option:selected").text();
  var campo = "#rmb_residente_id";
  var div_cont = "#des-para";
  // validamos que se haya agregado un valor en el campo numero de apartamento
  if(valor){
    // creamos la variable que contiene lo que se va agregar
    var contenido = '<span><span name="'+valor+'" class="rel-aptos">'+texto+'</span><i class="glyphicon glyphicon-remove"></i></span>';
    $(div_cont).append(contenido);
    $(campo).val("");
    $(campo).focus();
  }
  else{
    $(".ing-cal").addClass('hidden');
    swal({
       title: "Error!",
       text: "Seleccione un destinatario",
       type: "warning",
       confirmButtonColor: "#F8BB86",
       confirmButtonText: "Entiendo!"
    },
    function () {
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      $(campo).focus();
    });
  }
  if($("span").find('.rel-aptos')){
    $(".rel-aptos").each(function(){
      if(cont === 0){
        id_repite = id_repite + $(this).attr('name');
      }
      else{
        id_repite = id_repite + "," + $(this).attr('name');
      }
      cont = cont + 1;
    });
    $(".input-group-md").load("./selec_para.php?id_res=" + id_repite);
    $("#destinatarios-para").val(id_repite);
  }
  $("span").children(".glyphicon-remove").on("click", removerAptosMens);
}
// funcion que se ejecuta al hacer click en el icono remover de cada uno de los apartamentos agregados
function removerAptosMens (datos) {
  $(this).parent("span").remove();
  var cont = 0;
  var id_repite = "";
  if($("span").find('.rel-aptos')){
    $(".rel-aptos").each(function(){
      if(cont === 0){
        id_repite = id_repite + $(this).attr('name');
      }
      else{
        id_repite = id_repite + "," + $(this).attr('name');
      }
      cont = cont + 1;
    });
    $(".input-group-md").load("./selec_para.php?id_res=" + id_repite);
    $("#destinatarios-para").val(id_repite);
  }
}


// Estado Financiero / Tesorería

// funcion que se ejecuta al hacer click en los botones de los años en estado financiero
function consultarEstadoAnio (datos) {
  var altopag = resizePag();
  espereshow();
  // capturamos el html del boton presionado
  var tipo_btn = $(this).html();
  var id_apto = $("#id_apto").val();
  $(".ing-cal").load("estado-financiero.php?id_apto="+id_apto+"&anio="+tipo_btn);
  $(".ing-cal").height(altopag);
  $(".ing-cal").removeClass('hidden');
}
// funcion que se ejecuta al hacer clic dentro de un panel collapse
function restablecerPanel(panelbody, paneldefault){
  // alert("restablecerPanel");
  setTimeout(function(){
    panelbody.css("height","auto");
    paneldefault.removeClass('collapsed');
    panelbody.removeClass('collapse').addClass('in');
    var clase = panelbody.attr('class');
  }, 0);
}
// funcion que se ejecuta cuando se carga la página de nuevo concepto en edicion de tesoreria
function cargaNuevoConceptoEstadoFinanciero(){
  var panelbody = $("#form-new-concept").closest('.panel-body');
  var paneldefault = $("#form-new-concept").closest('.panel-default');
  var id_tes = panelbody.attr('id').split('historial-financiero-');
  var mes = panelbody.data('mes');
  var anio = panelbody.data('anio');
  var id_apto = $('#id_apto').val();
  restablecerPanel(panelbody, paneldefault);
  $(".btn-regresar").on('click', function(event) {
    // event.preventDefault();
    restablecerPanel(panelbody, paneldefault);
    $(panelbody).load("estado-financiero-editar-cobro.php?id_tes="+id_tes[1]);
  });
  $(".form-control").on('click', function(event) {
    // event.preventDefault();
    restablecerPanel(panelbody, paneldefault);
  });
  $(".btn-ingresar").on('click', function(event) {
    // event.preventDefault();
    restablecerPanel(panelbody, paneldefault);
    $( "#form-new-concept" ).submit();
  });
}
// funcion que se ejecuta al cargar el formulario de edicion de los cobros
function cargaEditarEstadoFinanciero(datos){
  var panelbody = $(".class-edit-cobro").closest('.panel-body');
  var paneldefault = $(".class-edit-cobro").closest('.panel-default');
  var id_tes = panelbody.attr('id').split('historial-financiero-');
  var mes = panelbody.data('mes');
  var anio = panelbody.data('anio');
  var id_apto = $('#id_apto').val();
  restablecerPanel(panelbody, paneldefault);
  $(".form-control").on('click', function(event) {
    // event.preventDefault();
    restablecerPanel(panelbody, paneldefault);
  });
  $(".btn-actualizar").on('click', function(event) {
    // event.preventDefault();
    restablecerPanel(panelbody, paneldefault);
    $( "#form-concept" ).submit();
  });
  $(".btn-regresar").on('click', function(event) {
    // event.preventDefault();
    restablecerPanel(panelbody, paneldefault);
    $(panelbody).load("estado-financiero-detalle.php?id_tes="+id_tes[1]+"&mes="+mes+"&anio="+anio+"&id_apto="+id_apto);
  });
  $(".btn-new-concept").on('click', function(event) {
    // event.preventDefault();
    restablecerPanel(panelbody, paneldefault);
    $(panelbody).load("estado-financiero-new-concept.php?id_tes="+id_tes[1]);
  });
  $(".btn-del-concept").on('click', function(event) {
    // event.preventDefault();
    restablecerPanel(panelbody, paneldefault);
    var id_concept = $(this).data('concept');
    var id_apto = $('#id_apto').val();
    var altopag = resizePag();
    var fecha = new Date();
    var anio = fecha.getFullYear();
    // alert(id_concept);
    $.ajax({
        url:"../php/ins_upd_estfin.php",
        cache:false,
        type:"POST",
        data:"id_sup="+id_concept+"&rmb_tesoreria_id="+id_tes[1],
        success: function(datos){
            if(datos !== ''){
                // alert(datos);
                var panelbody = $(".class-edit-cobro").closest('.panel-body');
                var id_tes = $("#rmb_tesoreria_id").val();
                swal({
                    title: "Felicidades!",
                    text: "El registro se ha eliminado correctamente!",
                    type: "success",
                    confirmButtonText: "Continuar",
                    confirmButtonColor: "#94B86E"
                },
                function(){
                    $(".ing-cal").load("estado-financiero.php?id_apto=" + id_apto + "&anio=" + anio);
                    $(".ing-cal").height(altopag);
                    $(".ing-cal").removeClass('hidden');
                });
            }
            else{
                setTimeout(esperehide, 1000);
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
  esperehide();
}
// funcion que se ejecuta al hacer click en el boton de editar cobro
function editarEstadoFinanciero (datos) {
  espereshow();
  var id_apto = $("#id_apto").val();
  var panelbody = $(this).closest('.panel-body');
  var paneldefault = $(this).closest('.panel-default');
  restablecerPanel(panelbody, paneldefault);
  var id_tes = panelbody.attr('id').split('historial-financiero-');
  var text_boton = $(this).html();
  if(text_boton === 'Editar Cobro'){
    $(panelbody).load("estado-financiero-editar-cobro.php?id_tes="+id_tes[1]);
  }
  else{
    $(panelbody).load("estado-financiero-nuevo-pago.php?id_tes="+id_tes[1]+"&id_apto="+id_apto);
  }
  
}
// funcion que se ejecuta al cargar el formulario de Nuevo cobro
function cargaNuevoEstadoFinanciero(datos){
  var id_apto = $("#id_apto").val();
  var anio = $(".btn-anios.active").html();
  var altopag = resizePag();
  var panelbody = $("#form-new-pago").closest('.panel-body');
  var paneldefault = $("#form-new-pago").closest('.panel-default');
  restablecerPanel(panelbody, paneldefault);
  $(".form-control").on('click', function(event) {
    // event.preventDefault();
    restablecerPanel(panelbody, paneldefault);
  });
  $(".btn-actualizar").on('click', function(event) {
    // alert("btn-actualizar");
    restablecerPanel(panelbody, paneldefault);
    $( "#form-new-pago" ).submit();
  });
  $(".btn-regresar").on('click', function(event) {
    restablecerPanel(panelbody, paneldefault);
    $(".ing-cal").load("estado-financiero.php?id_apto=" + id_apto + "&anio=" + anio);
    $(".ing-cal").height(altopag);
    $(".ing-cal").removeClass('hidden');

    $(panelbody).load("estado-financiero-detalle.php?id_tes="+id_tes[1]+"&mes="+mes+"&anio="+anio+"&id_apto="+id_apto);
  });
  esperehide();
}
// Funcion que se ejecuta al hacer click en un boton de nuevo pago o nuevo cobro
function nuevoEstadoFinanciero(){
  var tipo = $(this).data('tipo');
  var id_apto = $("#id_apto").val();
  if(tipo === 'cobro'){
    // alert(tipo);
    $(".modal-body").load("estado-financiero-nuevo-cobro.php");
  }
  else{
    // alert(tipo);
    $(".modal-body").load("estado-financiero-nuevo-pago.php?id_apto="+id_apto);
  }
  
}
// funcion que se ejecuta al cargar la pagina de estado financiero
function cargaEstadoFinanciero () {
  $(".close").on("click", cerrarModalDocs);
  $(".btn-anios").on("click", consultarEstadoAnio);
  $(".btn-editar").on("click", editarEstadoFinanciero);
  $(".btn-nuevo").on("click", nuevoEstadoFinanciero);
  setTimeout(esperehide, 500);
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
  var tipo        = $(this).closest(".id_tipo").attr("id_tipo");
  var id          = $(this).closest(".id_tipo").attr('name');
  var title_boton = $(this).attr('title');
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

// Calendario

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

// Estadisticas

// Funcion que genera las estadisticas de servicios públicos segun fechas seleccionadas
function generarEstadistica (argument) {
  var serv_fini = $("#serv_fini").val();
  var serv_ffin = $("#serv_ffin").val();
  $("#col-md-12").load("./estadisticas-servicios-publicos.php?serv_fini="+serv_fini+"&serv_ffin="+serv_ffin);
}
// function que se ejecuta al cargar la pagina de estadisticas
function cargarEstadisticas (argument) {
  $(".btn-primary").on("click", generarEstadistica);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al cargar la página del formulario de servicios públicos
function cargaFormServiciosPublicos () {
  setTimeout(esperehide, 500);
  $(".close").on("click", cerrarModalDocs);
  $(".btn-regresar").on("click", cerrarModalDocs);
}
// funcion que se ejecuta al hacer click en el boton enviar en el resultados individuales encuesta
function enviarResultadosServiciosPublicos(argument) {
  $(".ing-cal").load("lista-de-apartamentos-creaPDF.php");
  swal({
    title: "Atención!",
    text: "Escriba una dirección de correo electrónico:",
    type: "input",
    inputType: "text",
    inputPlaceholder: "Correo electrónico",
    showLoaderOnConfirm: true,
    showCancelButton: true,
    closeOnConfirm: false,
    cancelButtonText: "Cancelar",
    confirmButtonText: "Enviar"
  },
  function(inputValue){
    if (inputValue === false){
      return false;
    }
    else if (inputValue === "") {
      swal.showInputError("Digite un correo electrónico");
      return false;
    }
    else{
      swal.close();
      espereshow();
      var request = $.ajax({
        url: "lista-de-apartamentos-enviaPDF.php",
        method: "POST",
        data: { email : inputValue },
        dataType: "html"
      });
      request.done(function( datos ) {
        if(datos.length){
          setTimeout(esperehide, 500);
          swal({
            title: "Felicidades!",
            text: "Los resultados se han enviado al correo "+inputValue,
            type: "success",
            confirmButtonText: "Continuar",
            confirmButtonColor: "#94B86E"
          },
          function(){
            $(".ing-cal").html("");
            $(".ing-cal").addClass('hidden');
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
      });
      request.fail(function( jqXHR, textStatus ) {
          setTimeout(esperehide, 500);
          swal({
              title: "Error!",
              text: "Ha ocurrido un error,\nrevise la información diligenciada he intentelo nuevamente.",
              type: "error",
              confirmButtonText: "Aceptar",
              confirmButtonColor: "#E25856"
          });
          return;
      });
    }
  });
  $(".ing-cal").addClass('hidden');
}
// funcion que se ejecuta al hacer click en los botones de la lista de servicios públicos
function verServiciosPublicos (event) {
  espereshow();
  event.preventDefault();
  var altopag = resizePag();
  var id_reg = $(this).parent('a').parent('td').attr('name');
  var clase = $(this).attr('title');
  var fecha = new Date();
  var anio = fecha.getFullYear();
  switch(clase){
    case 'Ver detalle del registro':
      $(".ing-cal").load("publicos-form.php?id_reg=" + id_reg + "&ver=1");
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'Editar registro':
      $(".ing-cal").load("publicos-form.php?id_reg=" + id_reg);
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'Eliminar registro':
      swal({
         title: "¿Esta Seguro?",
         text: "Se borrará el registro con # id " + id_reg,
         type: "warning",
         showCancelButton: true,
         cancelButtonText: "Cancelar",
         confirmButtonColor: "#F8BB86",
         confirmButtonText: "Eliminar!",
         closeOnConfirm: false
      },
      function(){
        $.ajax({
          url:"../php/ins_upd_serv.php",
          cache:false,
          type:"POST",
          data:"id_sup="+id_reg,
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
                $("#col-md-12").load("./publicos.php?tabla=rmb_servicios&nom=ServiciosPublicos");
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
      break;
    case 'Nuevo registro':
      $(".ing-cal").load("publicos-form.php");
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
  }
}
// Funcion que se ejecuta al cargar la pagina de estados financieros listado
function cargaListaServiciosPublicos () {
  $(".btn-accion").on("click", verServiciosPublicos);
  setTimeout(function(){$("#tabla > thead > tr > th:last-child").removeClass('sorting');}, 100);
  $(".btn-default.form-control").on("click", enviarResultadosServiciosPublicos);
  esperehide();
  // setTimeout(cerrar_alert, 8500);
}

// Evaluaciones


// funcion que se ejecuta al cargar la paginna del form de agregar o editar tareas
function cargaFormEvaluacion () {
  setTimeout(esperehide, 500);
  $(".btn-regresar").on("click", regresarListaEvaluacion);
}
// funcion que se ejecuta al hacer click en el boton de regresar en el formulario de tareas
function regresarListaEvaluacion (argument) {
  espereshow();
  $("#col-md-12").load('evaluacion-lista.php');
}
// Funcion que se ejecuta al cargar la pagina de lista de evaluaciones
function cargaListaEvaluaciones () {
  $(".btn-accion").on("click", accionEvaluacion);
  setTimeout(function(){$("#tabla > thead > tr > th:last-child").removeClass('sorting');}, 300);
  setTimeout(esperehide, 500);
}
// Función que se ejecuta al hacer click en los botones del listado de evaluaciones
function accionEvaluacion (datos) {
  var evento = $(this).attr('title');
  var data_id = $(this).closest(".lista_evaluaciones").attr('name');
  if (evento === 'Nuevo registro'){
    $("#col-md-12").load("evaluacion-form.php");
  }
  else if (evento === 'Consultar información'){
    $("#col-md-12").load("evaluacion-resultados.php?id_eva=" + data_id);
  }
  else if (evento === 'Editar Información'){
    $("#col-md-12").load("evaluacion-form.php?id_upd=" + data_id);
  }
  else if (evento === 'Borrar registro'){
    setTimeout(esperehide, 500);
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
        url:"../php/ins_upd_eva.php",
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
                $("#col-md-12").load('evaluacion-lista.php');
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
}
// funcion que se ejecuta al cargar el listado de categorias por evaluación
function accionListaCateEva () {
  $(".btn-accion-cate-eva").on("click", formListaCateEva);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de Categorias por evaluacion
function formListaCateEva (datos) {
  espereshow();
  $("#btn-form-edit-eva").addClass('hidden');
  var evento = $(this).attr('title');
  if (evento === 'Nuevo registro'){
    $("#categorias-evaluacion").load("evaluacion-form-cate-eva.php");
  }
  else if (evento === 'Consultar información'){
    var data_id = $(this).parent(".lista_cate-eva").attr('name');
    $("#categorias-evaluacion").load("evaluacion-form-cate-eva.php?id_ver=" + data_id);
  }
  else if (evento === 'Editar Información'){
    var data_id = $(this).parent(".lista_cate-eva").attr('name');
    $("#categorias-evaluacion").load("evaluacion-form-cate-eva.php?id_upd=" + data_id);
  }
  else if (evento === 'Borrar registro'){
    setTimeout(esperehide, 500);
    var data_id = $(this).parent(".lista_cate-eva").attr('name');
    swal({
       title: "¿Esta Seguro?",
       text: "Se borrará la categoría y los temas relacionados",
       type: "warning",
       showCancelButton: true,
       cancelButtonText: "Cancelar",
       confirmButtonColor: "#F8BB86",
       confirmButtonText: "Eliminar!",
       closeOnConfirm: false
    },
    function(){
      $.ajax({
        url:"../php/ins_upd_eva_cate.php",
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
                $("#categorias-evaluacion").load("evaluacion-lista-cate-eva.php");
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
}
// funcion que se ejecuta al cargar la paginna del form de agregar o editar tareas
function cargaFormCategoriaEvaluacion () {
  setTimeout(esperehide, 500);
  $(".btn-regresar-cat").on("click", regresarListaCategoriasEvaluacion);
}
// funcion que se ejecuta al hacer click en el boton de regresar en el formulario de tareas
function regresarListaCategoriasEvaluacion (argument) {
  espereshow();
  var id_eva = $("#id_eva").val();
  $("#categorias-evaluacion").load('evaluacion-lista-cate-eva.php?id_eva='+id_eva);
  $("#btn-form-edit-eva").removeClass('hidden');
}
// funcion que se ejecuta al cargar la paginna del form de agregar o editar tareas
function cargaFormTemaEvaluacion () {
  setTimeout(esperehide, 500);
  $(".btn-regresar-tema").on("click", regresarListaTemaEvaluacion);
}
// funcion que se ejecuta al hacer click en el boton de regresar en el formulario de tareas
function regresarListaTemaEvaluacion (argument) {
  espereshow();
  var id_eva = $("#id_eva").val();
  var id_cat = $("#id_cat").val();
  $("#temas-categorias-evaluacion").load('evaluacion-lista-tema-cate-eva.php?id_eva='+id_eva+'&id_cat='+id_cat);
  $("#btn-form-edit-cate-eva").removeClass('hidden');
}
// funcion que se ejecuta al cargar el listado de categorias por evaluación
function accionListaTemaCateEva () {
  $(".btn-accion-tema-cate-eva").on("click", formListaTemaCateEva);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de Categorias por evaluacion
function formListaTemaCateEva (datos) {
  espereshow();
  $("#btn-form-edit-cate-eva").addClass('hidden');
  var evento = $(this).attr('title');
  if (evento === 'Nuevo registro'){
    $("#temas-categorias-evaluacion").load("evaluacion-form-tema-cate-eva.php");
  }
  else if (evento === 'Consultar información'){
    var data_id = $(this).parent(".lista-tema-cate-eva").attr('name');
    $("#temas-categorias-evaluacion").load("evaluacion-form-tema-cate-eva.php?id_ver=" + data_id);
  }
  else if (evento === 'Editar Información'){
    var data_id = $(this).parent(".lista-tema-cate-eva").attr('name');
    $("#temas-categorias-evaluacion").load("evaluacion-form-tema-cate-eva.php?id_upd=" + data_id);
  }
  else if (evento === 'Borrar registro'){
    setTimeout(esperehide, 500);
    var data_id = $(this).parent(".lista-tema-cate-eva").attr('name');
    var id_cat = $("#id_cat").val();
    var id_eva = $("#id_eva").val();
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
        url:"../php/ins_upd_eva_cate_tema.php",
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
                $("#temas-categorias-evaluacion").load("evaluacion-lista-tema-cate-eva.php?id_cat="+id_cat+"&id_eva="+id_eva);
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
}
// Funcion que se ejecuta al cargar la pagina de listado de categorias
function cargaListaCategorias () {
  $(".btn-accion").on("click", accionCategorias);
  setTimeout(function(){$("#tabla > thead > tr > th:last-child").removeClass('sorting');}, 300);
  setTimeout(esperehide, 500);
}
// Función que se ejecuta al hacer click en los botones del listado de categorias
function accionCategorias (datos) {
  var evento = $(this).attr('title');
  if (evento === 'Nuevo registro'){
    $("#col-md-12").load("./evaluacion-form-cate.php");
  }
  else if (evento === 'Consultar información'){
    var data_id = $(this).parent("#lista_categoria").attr('name');
    $("#col-md-12").load("./evaluacion-form-cate.php?id_ver=" + data_id);
  }
  else if (evento === 'Editar Información'){
    var data_id = $(this).parent("#lista_categoria").attr('name');
    $("#col-md-12").load("./evaluacion-form-cate.php?id_upd=" + data_id);
  }
  else if (evento === 'Borrar registro'){
    setTimeout(esperehide, 500);
    var data_id = $(this).parent("#lista_categoria").attr('name');
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
        url:"../php/ins_upd_cate.php",
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
                $("#col-md-12").load("evaluacion-lista-cate.php");
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
}
// funcion que se ejecuta al cargar la paginna del form de agregar o editar tareas
function cargaFormCategoria () {
  setTimeout(esperehide, 500);
  $(".btn-regresar-cat").on("click", regresarListaCategorias);
}
// funcion que se ejecuta al hacer click en el boton de regresar en el formulario de tareas
function regresarListaCategorias (argument) {
  espereshow();
  $("#col-md-12").load("evaluacion-lista-cate.php");
}
// Funcion que se ejecuta al cargar la pagina de listado de categorias
function cargaListaTemas () {
  $(".btn-accion").on("click", accionTemas);
  setTimeout(function(){$("#tabla > thead > tr > th:last-child").removeClass('sorting');}, 300);
  setTimeout(esperehide, 500);
}
// Función que se ejecuta al hacer click en los botones del listado de categorias
function accionTemas (datos) {
  var evento = $(this).attr('title');
  if (evento === 'Nuevo registro'){
    $("#col-md-12").load("./evaluacion-form-tema.php");
  }
  else if (evento === 'Consultar información'){
    var data_id = $(this).parent("#lista_tema").attr('name');
    $("#col-md-12").load("./evaluacion-form-tema.php?id_ver=" + data_id);
  }
  else if (evento === 'Editar Información'){
    var data_id = $(this).parent("#lista_tema").attr('name');
    $("#col-md-12").load("./evaluacion-form-tema.php?id_upd=" + data_id);
  }
  else if (evento === 'Borrar registro'){
    setTimeout(esperehide, 500);
    var data_id = $(this).parent("#lista_tema").attr('name');
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
        url:"../php/ins_upd_tema.php",
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
                $("#col-md-12").load("evaluacion-lista-tema.php");
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
}
// funcion que se ejecuta al cargar la paginna del form de agregar o editar tareas
function cargaFormTema () {
  setTimeout(esperehide, 500);
  $(".btn-regresar-tema").on("click", regresarListaTemas);
}
// funcion que se ejecuta al hacer click en el boton de regresar en el formulario de tareas
function regresarListaTemas (argument) {
  espereshow();
  $("#col-md-12").load("evaluacion-lista-tema.php");
}
// Funcion que se ejecuta al cargar la pagina de lista de evaluaciones a calificar
function cargaListaCalificaEva () {
  $(".btn-accion").on("click", accionCalificaEva);
  setTimeout(function(){$("#tabla > thead > tr > th:last-child").removeClass('sorting');}, 300);
  setTimeout(esperehide, 500);
}
// Función que se ejecuta al hacer click en el boton calificar del listado de evaluaciones a calificar
function accionCalificaEva (datos) {
  var evento = $(this).attr('title');
  var data_id = $(this).closest(".lista_evaluaciones").attr('name');
  if (evento === 'Calificar Evaluación'){
    $("#col-md-12").load("califica-evaluacion-form.php?id_upd=" + data_id);
  }
}
// funcion que se ejecuta al cargar la paginna del form de calificar evaluación
function cargaFormCalificaEva () {
  setTimeout(esperehide, 500);
  $(".btn-regresar").on("click", regresarCalificaEva);
  $(".btn-accion").on("click", accionformCalificaEva);
}
// funcion que se ejecuta al hacer click en el boton de regresar en el formulario de calificar evaluacion
function regresarCalificaEva (argument) {
  espereshow();
  $("#col-md-12").load('calificar-evaluacion.php');
}
// Función que se ejecuta al hacer click en el boton calificar del listado de evaluaciones a calificar
function accionformCalificaEva (datos) {
  var evento = $(this).attr('title');
  var data_id = $(this).closest(".lista-cate-eva").attr('name');
  var id_eva = $("#id_eva").val();
  if (evento === 'Calificar Categoría'){
    $("#col-md-12").load("califica-evaluacion-form-cate.php?id_cat=" + data_id + "&id_eva=" + id_eva);
  }
}
// funcion que se ejecuta al cargar la paginna del form de calificar categoria evaluación
function cargaFormCalificaCateEva () {
  setTimeout(esperehide, 500);
  $(".btn-regresar").on("click", regresarCalificaCateEva);
  $(".btn-accion").on("click", accionformCalificaCateEva);
}
// funcion que se ejecuta al hacer click en el boton de regresar en el formulario de calificar categoria evaluacion
function regresarCalificaCateEva (argument) {
  espereshow();
  var id_eva = $("#id_eva").val();
  $("#col-md-12").load('califica-evaluacion-form.php?id_upd='+id_eva);
}
// Función que se ejecuta al hacer click en el boton calificar del listado de categorias a calificar
function accionformCalificaCateEva (datos) {
  var evento = $(this).attr('title');
  var data_id = $(this).closest(".lista-tema-cate-eva").attr('name');
  var id_eva = $("#id_eva").val();
  var id_cat = $("#id_cat").val();
  if (evento === 'Calificar Tema'){
    $("#col-md-12").load("califica-evaluacion-form-tema.php?id_upd=" + data_id + "&id_eva=" + id_eva + "&id_cat=" + id_cat);
  }
}
// funcion que se ejecuta al cargar la paginna del form de calificar categoria evaluación
function cargaFormCalificaTemaEva () {
  setTimeout(esperehide, 500);
  $(".btn-regresar").on("click", regresarCalificaTemaEva);
  $(".btn-accion").on("click", accionformCalificaTemaEva);
}
// funcion que se ejecuta al hacer click en el boton de regresar en el formulario de calificar categoria evaluacion
function regresarCalificaTemaEva (argument) {
  espereshow();
  var id_eva = $("#id_eva").val();
  var id_cat = $("#id_cat").val();
  $("#col-md-12").load('califica-evaluacion-form-cate.php?id_eva='+id_eva+"&id_cat="+id_cat);
}
// Función que se ejecuta al hacer click en el boton calificar del listado de categorias a calificar
function accionformCalificaTemaEva (datos) {
  var evento = $(this).attr('title');
  var data_id = $(this).closest(".lista-tema-cate-eva").attr('name');
  if (evento === 'Calificar Tema'){
    $("#col-md-12").load("califica-evaluacion-form-tema.php?id_ver=" + data_id);
  }
}



// Quienes somos

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
// funcion que se ejecuta al cargar el formulario del consejo y comite en quienes somos
function cargaFormQuienesConsejoComite() {
  $(".regresar").on("click", volverQuienes);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en los iconos de editar y/o eliminar en quienes somos
function editarMiembro(argument) {
  espereshow();
  var boton = $(this);
  var botonHTML = boton.attr('title');
  var data_id = boton.data('id');
  var data_quien = boton.data('quien');
  var pag = "";
  if(botonHTML === 'Eliminar Registro'){
    setTimeout(esperehide, 500);
    if(data_quien === 2){pag = "consejo";}
    else if(data_quien === 3){pag = "comite";}
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
        url:"../php/ins_upd_quienes-consejo-comite.php",
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
                $("#collapseExample" + data_quien).load(pag + ".php");
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
  else if(botonHTML === 'Editar Registro'){
    setTimeout(esperehide, 500);
    $(boton).closest(".panel-body").load("quienes-somos-form-consejo-comite.php?id_res=" + data_id + "&data_quien=" + data_quien);
  }
}
// funcion que se ejecuta al hacer click en los botones de nuevo, editar y/o eliminar en consejo y comite en quienes somos
function nuevoMiembro(argument) {
  espereshow();
  var boton = $(this);
  var botonHTML = boton.html();
  var data_quien = boton.data('quien');
  if(data_quien !== 4){
    if(botonHTML === 'Nuevo'){
      $(boton).closest(".panel-body").load("quienes-somos-form-consejo-comite.php?data_quien=" + data_quien);
    }
    else if(botonHTML === 'Eliminar'){
      setTimeout(esperehide, 500);
      var data_id = boton.data('id');
      if(data_quien === 1){pag = "administracion";}
      else if(data_quien === 2){pag = "consejo";}
      else if(data_quien === 3){pag = "comite";}
      else if(data_quien === 4){pag = "edificio";}
      else if(data_quien === 5){pag = "contador";}
      else if(data_quien === 6){pag = "revisor";}
      else if(data_quien === 7){pag = "seguridad";}
      else if(data_quien === 8){pag = "servicios";}
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
          url:"../php/ins_upd_quienes.php",
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
                  $("#collapseExample" + data_quien).load(pag + ".php");
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
    else if(botonHTML === 'Editar'){
      setTimeout(esperehide, 500);
      var data_id = boton.data('id');
      $(boton).closest(".panel-body").load("quienes-somos-form.php?id_res=" + data_id + "&data_quien=" + data_quien);
    }
  }
  else{
    $(boton).closest(".panel-body").load("quienes-somos-edificio-form.php?id_proy=" + sess_proy);
  }
}
// funcion que se ejecuta al hacer click o pasar mouse sobre imagen para ver iconos de edicion y eliminación
function mostrarOcultarIconosConsejoComite(argument) {
  // alert("mostrarOcultarIconos");
  $(this).find('.iconos-edit-consejo-comite').toggleClass('hidden');
}
// funcion que se ejecuta al cargar la pagina lista de consejo y lista de comite en quienes somos
function cargarConsejoComite () {
  $('.mieconsejo').on('mouseover', mostrarOcultarIconosConsejoComite);
  $('.mieconsejo').on('mouseout', mostrarOcultarIconosConsejoComite);
  $('.miecomite').on('mouseover', mostrarOcultarIconosConsejoComite);
  $('.miecomite').on('mouseout', mostrarOcultarIconosConsejoComite);
  $(".btn.btn-default.pull-right").on("click", nuevoMiembro);
  $("div.iconos-edit-consejo-comite > .glyphicon.glyphicon-pencil").on("click", editarMiembro);
  $("div.iconos-edit-consejo-comite > .glyphicon.glyphicon-remove").on("click", editarMiembro);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al cargar la pagina tipo modal del admnistrador
function cargarPerfil () {
  // $('dt').on("click", abrirPestanaQuienes);
  $('.mieconsejo').on('mouseover', mostrarOcultarIconos);
  $('.mieconsejo').on('mouseout', mostrarOcultarIconos);
  $('.miecomite').on('mouseover', mostrarOcultarIconos);
  $('.miecomite').on('mouseout', mostrarOcultarIconos);
  $(".btn.btn-default.pull-right").on("click", abrirFormQuienes);
  $("div.iconos-edit > .glyphicon.glyphicon-pencil").on("click", abrirFormQuienesIconos);
  $("div.iconos-edit > .glyphicon.glyphicon-remove").on("click", abrirFormQuienesIconos);
  $(".btn.btn-default.pull-right.form-edificio").on("click", abrirFormQuienesEdificio);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en la pestaña del acodeon azul en edificio - quienes somos
function abrirPestanaQuienes(event) {
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
// funcion que se ejecuta al hacer click o pasar mouse sobre imagen para ver iconos de edicion y eliminación
function mostrarOcultarIconos(argument) {
  // alert("mostrarOcultarIconos");
  $(this).find('.iconos-edit').toggleClass('hidden');
}
// funcion que se ejecuta al hacer click en los botones de nuevo, editar y/o eliminar en quienes somos
function abrirFormQuienes(argument) {
  espereshow();
  var boton = $(this);
  var botonHTML = boton.html();
  var data_quien = boton.data('quien');
  if(data_quien !== 4){
    if(botonHTML === 'Nuevo'){
      $(boton).closest(".panel-body").load("quienes-somos-form.php?data_quien=" + data_quien);
    }
    else if(botonHTML === 'Eliminar'){
      setTimeout(esperehide, 500);
      var data_id = boton.data('id');
      if(data_quien === 1){pag = "administracion";}
      else if(data_quien === 2){pag = "consejo";}
      else if(data_quien === 3){pag = "comite";}
      else if(data_quien === 4){pag = "edificio";}
      else if(data_quien === 5){pag = "contador";}
      else if(data_quien === 6){pag = "revisor";}
      else if(data_quien === 7){pag = "seguridad";}
      else if(data_quien === 8){pag = "servicios";}
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
          url:"../php/ins_upd_quienes.php",
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
                  $("#collapseExample" + data_quien).load(pag + ".php");
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
    else if(botonHTML === 'Editar'){
      setTimeout(esperehide, 500);
      var data_id = boton.data('id');
      $(boton).closest(".panel-body").load("quienes-somos-form.php?id_res=" + data_id + "&data_quien=" + data_quien);
    }
  }
  else{
    $(boton).closest(".panel-body").load("quienes-somos-edificio-form.php?id_proy=" + sess_proy);
  }
}
// funcion que se ejecuta al cargar el php del formulario de quienes somos
function cargaFormQuienes() {
  var formQuienes = $("#form-quienes");
  formQuienes.find('#rmb_carg_id').on("change", mostrarRazonSocial);
  var cargo = formQuienes.find('#rmb_carg_id').val();
  if(cargo){
    if((cargo === '3') || (cargo === '10') || (cargo === '13') || (cargo === '16') || (cargo === '18')){
      $("#rmb_residente_nom2").closest(".form-group").removeClass('hidden');
      if(!$("#rmb_residente_foto").closest(".form-group").hasClass('hidden')){
        $("#rmb_residente_foto").closest(".form-group").addClass('hidden');
      }
    }
    else{
      if(!$("#rmb_residente_nom2").closest(".form-group").hasClass('hidden')){
        $("#rmb_residente_nom2").closest(".form-group").addClass('hidden');
      }
      if($("#rmb_residente_foto").closest(".form-group").hasClass('hidden')){
        $("#rmb_residente_foto").closest(".form-group").removeClass('hidden');
      }
    }
  }
  //Cuando se selecciona una imagen en usuario
  $('.fileimagen').on('change', function(e) {
     PreImagen(this, e);
  });
  $(".regresar").on("click", volverQuienes);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al seleccionar un cargo tipo empresa en el form de quienes somos
function mostrarRazonSocial(argument) {
  var cargo = $(this).val();
  if((cargo === '3') || (cargo === '10') || (cargo === '13') || (cargo === '16') || (cargo === '18')){
    // validamos si el elemento de razon social NO se esta mostrando
    if($("#rmb_residente_nom2").closest(".form-group").hasClass('hidden')){
      // quitamos la clase hidden para mostrar el elemento razon social
      $("#rmb_residente_nom2").closest(".form-group").removeClass('hidden');
    }
    // validamos si el elemento de página web NO se esta mostrando
    if($("#rmb_residente_perm").closest(".form-group").hasClass('hidden')){
      // quitamos la clase hidden para mostrar el elemento página web
      $("#rmb_residente_perm").closest(".form-group").removeClass('hidden');
    }
    // validamos si el elemento de foto se esta mostrando
    if(!$("#rmb_residente_foto").closest(".form-group").hasClass('hidden')){
      // ocultamos el elemento de foto
      $("#rmb_residente_foto").closest(".form-group").addClass('hidden');
    }
  }
  else{
    // validamos que el campo razon social se esta mostrando
    if(!$("#rmb_residente_nom2").closest(".form-group").hasClass('hidden')){
      // ocultamos el campo de razon social
      $("#rmb_residente_nom2").closest(".form-group").addClass('hidden');
    }
    // validamos que el campo página web se esta mostrando
    if(!$("#rmb_residente_perm").closest(".form-group").hasClass('hidden')){
      // ocultamos el campo de página web
      $("#rmb_residente_perm").closest(".form-group").addClass('hidden');
    }
    if($("#rmb_residente_foto").closest(".form-group").hasClass('hidden')){
      $("#rmb_residente_foto").closest(".form-group").removeClass('hidden');
    }
  }
}
// funcion que se ejecuta al hcer click en el boton regresar del form quienes
function volverQuienes(argument) {
  var quien = $(this).data('quien');
  var pag = "";
  if(quien === 1){pag = "administracion";}
  else if(quien === 2){pag = "consejo";}
  else if(quien === 3){pag = "comite";}
  else if(quien === 4){pag = "edificio";}
  else if(quien === 5){pag = "contador";}
  else if(quien === 6){pag = "revisor";}
  else if(quien === 7){pag = "seguridad";}
  else if(quien === 8){pag = "servicios";}
  $("#collapseExample" + quien).load(pag + ".php");
}
// funcion que se ejecuta al hacer click en los iconos de editar y/o eliminar en quienes somos
function abrirFormQuienesIconos(argument) {
  espereshow();
  var boton = $(this);
  var botonHTML = boton.attr('title');
  var data_id = boton.data('id');
  var pag = "";
  var data_quien = boton.data('quien');
  if(botonHTML === 'Eliminar Registro'){
    setTimeout(esperehide, 500);
    if(data_quien === 1){pag = "administracion";}
    else if(data_quien === 2){pag = "consejo";}
    else if(data_quien === 3){pag = "comite";}
    else if(data_quien === 4){pag = "edificio";}
    else if(data_quien === 5){pag = "contador";}
    else if(data_quien === 6){pag = "revisor";}
    else if(data_quien === 7){pag = "seguridad";}
    else if(data_quien === 8){pag = "servicios";}
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
        url:"../php/ins_upd_quienes.php",
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
                $("#collapseExample" + data_quien).load(pag + ".php");
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
  else if(botonHTML === 'Editar Registro'){
    setTimeout(esperehide, 500);
    $(boton).closest(".panel-body").load("quienes-somos-form.php?id_res=" + data_id + "&data_quien=" + data_quien);
  }
}
// funcion que se ejecuta al hacer click en los iconos de editar y/o eliminar en quienes somos
function abrirFormQuienesEdificio(argument) {
  espereshow();
  var boton = $(this);
  var botonHTML = boton.attr('title');
  var data_id = boton.data('id');
  var pag = "";
  var data_quien = boton.data('quien');
  if(botonHTML === 'Eliminar Registro'){
    setTimeout(esperehide, 500);
    if(data_quien === '1'){pag = "administracion";}
    else if(data_quien === '2'){pag = "consejo";}
    else if(data_quien === '3'){pag = "comite";}
    else if(data_quien === '4'){pag = "edificio";}
    else if(data_quien === '5'){pag = "contador";}
    else if(data_quien === '6'){pag = "revisor";}
    else if(data_quien === '7'){pag = "seguridad";}
    else if(data_quien === '8'){pag = "servicios";}
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
        url:"../php/ins_upd_quienes.php",
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
                $("#collapseExample" + data_quien).load(pag + ".php");
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
  else if(botonHTML === 'Editar Registro'){
    setTimeout(esperehide, 500);
    $(boton).closest(".panel-body").load("quienes-somos-form.php?id_res=" + data_id + "&data_quien=" + data_quien);
  }
}
// funcion que se ejecuta al cargar el php del formulario de quienes somos edificio
function cargaFormQuienesEdificio() {
  $(".regresar").on("click", volverQuienesEdificio);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hcer click en el boton regresar del form quienes
function volverQuienesEdificio(argument) {
  var quien = 4;
  var pag = "edificio";
  var proy = $("#id_upd").val();
  $("#collapseExample" + quien).load(pag + ".php?id_proy="+proy);
}

// Question

// Funcion que se ejecuta al cargar la pagina de question
function cargarQuestion () {
  $(".panel").on("click", verRespuesta);
  $(".btn.btn-default.pull-right").on("click", abrirFormQuestion);
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
// funcion que se ejecuta al hacer click en los botones de nuevo, editar y/o eliminar en question
function abrirFormQuestion(argument) {
  espereshow();
  var boton = $(this);
  var botonHTML = boton.html();
  if(botonHTML === 'Nuevo'){
    $("#col-md-12").load("question-form.php");
  }
  else if(botonHTML === 'Eliminar'){
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
        url:"../php/ins_upd_question.php",
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
                $("#col-md-12").load("question.php");
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
  else if(botonHTML === 'Editar'){
    setTimeout(esperehide, 500);
    var data_id = boton.data('id');
    $("#col-md-12").load("question-form.php?id_upd=" + data_id);
  }
}
// funcion que se ejecuta al cargar el php del formulario de contacto
function cargaFormQuestion() {
  $(".btn.btn-default.regresar").on("click", volverQuestion);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton regresar del form contacto
function volverQuestion(argument) {
  espereshow();
  $("#col-md-12").load("question.php");
}


// Cambiar contraseña

// funcion que se ejecuta al cargar el formulario de cambiar contraseña
function cargaFormPass(argument) {
  $(".btn.btn-default.regresar").on("click", irInicio);
  setTimeout(esperehide, 500);
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

// Configuración

// funcion que desactiva funcionalidad del elemento
function desactivarAccion (datos) {
    setTimeout(function(){
        if($("#tabla > thead > tr > th:last-child").hasClass('sorting_asc')){
            $("#tabla > thead > tr > th:last-child").removeClass('sorting_asc');
        }
        else if($("#tabla > thead > tr > th:last-child").hasClass('sorting_desc')){
            $("#tabla > thead > tr > th:last-child").removeClass('sorting_desc');
        }
        else{
            $("#tabla > thead > tr > th:last-child").removeAttr('class');
        }
    }, 0);
}
// función que se ejecuta al hacer click en los botones de nuevo registro o volver al inicio en la lista de maestros
function nuevoVolver (datos) {
    espereshow();
    var boton = $(this).html();
    if(boton === 'Volver'){
      $("#col-md-12").load("./lista-de-apartamentos.php");
      history.pushState({page: "lista-de-apartamentos.php"}, "lista de apartamentos", "lista-de-apartamentos.html");
    }
    else{
        var tabla = $("#nom-tabla").val();
        var nom = encodeURIComponent($("#nom").val());
        $("#col-md-12").load("./form-master.php?tabla="+tabla+"&nom="+nom);
    }
}
//al hacer clic en el boton Editar o Borrar en lista maestros
function accionRegistro(datos) {
  var id = $(this).attr('id');
  var val = $(this).children('button').attr('title');
  var tabla = $("#nom-tabla").val();
  var nom = encodeURIComponent($("#nom").val());
  switch(val){
    case 'Eliminar':
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
        //Enviar los datos para Borrar
        $.ajax({
          url:"../php/edicion-master.php",
          cache:false,
          type:"POST",
          data: "id_sup="+id+"&tabla="+tabla,
          success: function(datos){
            if(datos !== ''){
              $("#col-md-12").load("./lista-master.php?tabla="+tabla+"&nom="+nom);
              swal({
                 title: "Eliminado!",
                 text: "El registro se ha eliminado.",
                 type: "success",
                 confirmButtonText: "Continuar",
                 confirmButtonColor: "#94B86E"
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
            }
          }
        });
      });
      break;
    case 'Editar Información':
      $("#col-md-12").load("./form-master.php?tabla="+tabla+"&nom="+nom+"&id="+id);
      break;
    case 'Ver Información':
      $("#col-md-12").load("./form-master.php?tabla="+tabla+"&nom="+nom+"&id="+id+"&ver=si");
      break;
  }
}
// funcion que se ejecuta al cargar la lista de maestros
function cargaLista () {
    setTimeout(esperehide, 1000);
    setTimeout(function(){
        $("#tabla > thead > tr > th:last-child").removeClass('sorting');
    }, 200);
    $("#tabla > thead > tr > th:last-child").on('click', desactivarAccion);
    $(".new-reg").on("click", nuevoVolver);
    $(".btn_est").on("click", accionRegistro);
}
// funcion que se ejecuta cuando se hace clic en algun boton del form en maestros
function accionForm (datos) {
    var id_boton = $(this).attr('id');
    var tabla = $("#nom-tabla").val();
    var nom = encodeURIComponent($("#nom").val());
    var campos = $("#campos").val();
    var requeridos = $("#requeridos").val();
    var camp = campos.split(',');
    var campo_post = "";
    if((requeridos.length) && (id_boton !== 'cancel')){
        var req = requeridos.split(',');
        for (var i = 0; i < req.length; i++) {
            var valor_req = $("#"+req[i]).val();
            if(valor_req === ''){
                swal({title: "Error!",text: "Este campo es requerido.",type: "error",confirmButtonText: "Aceptar",confirmButtonColor: "#E25856"},function(){$("#"+req[i]).focus();});
                return false;
            }
        }
    }
    for(var i = 0; i < camp.length; i++){
        if(i === 0){
          campo_post += camp[i]+"="+$("#"+camp[i]).val();
        }
        else{
          campo_post += "&"+camp[i]+"="+$("#"+camp[i]).val();
        }
    }
    // validamos si la tabla es la de banner
    if((tabla === 'rmb_banner') || (tabla === 'rmb_tcont')){
      var datos_form = new FormData($("#form_master")[0]);
    }
    switch(id_boton){
      case 'cancel':
        $("#col-md-12").load("./lista-master.php?tabla="+tabla+"&nom="+nom);
        return;
        break;
      case 'ingresar':
        if((tabla === 'rmb_banner') || (tabla === 'rmb_tcont')){
          var send_post = datos_form;
        }
        else{
          var send_post = "ins=1&tabla="+tabla+"&"+campo_post;
        }
        break;
      case 'actualizar':
        if((tabla === 'rmb_banner') || (tabla === 'rmb_tcont')){
          var send_post = datos_form;
        }
        else{
          var id = $("#id").val();
          var send_post = "id_upd="+id+"&tabla="+tabla+"&"+campo_post;
        }
        break;
    }
    //Enviar los datos para ingresar o actualizar
    if((tabla === 'rmb_banner') || (tabla === 'rmb_tcont')){
      $.ajax({
          url:"./edicion-master.php",
          cache:false,
          type:"POST",
          contentType:false,
          data:send_post,
          processData:false,
          success: function(datos){
              if(datos !== ''){
                  swal({
                      title: "Felicidades!",
                      text: datos,
                      type: "success",
                      confirmButtonText: "Continuar",
                      confirmButtonColor: "#94B86E"
                  },
                  function() {
                      $("#col-md-12").load("./lista-master.php?tabla="+tabla+"&nom="+nom);
                  });
              }
              else{
                  swal({
                    title: "Error!",
                    text: "No se pudo "+id_boton+" el registro",
                    type: "error",
                    confirmButtonText: "Aceptar",
                    confirmButtonColor: "#E25856"
                  },
                  function() {
                      $("#"+req[i]).focus();
                  });
              }
          }
      });
    }
    else{
      $.ajax({
          url:"../php/edicion-master.php",
          cache:false,
          type:"POST",
          data:send_post,
          success: function(datos){
              if(datos !== ''){
                  swal({
                      title: "Felicidades!",
                      text: datos,
                      type: "success",
                      confirmButtonText: "Continuar",
                      confirmButtonColor: "#94B86E"
                  },
                  function() {
                      $("#col-md-12").load("./lista-master.php?tabla="+tabla+"&nom="+nom);
                  });
              }
              else{
                  swal({
                    title: "Error!",
                    text: "No se pudo "+id_boton+" el registro",
                    type: "error",
                    confirmButtonText: "Aceptar",
                    confirmButtonColor: "#E25856"
                  },
                  function() {
                      $("#"+req[i]).focus();
                  });
              }
          }
      });
    }
}
// funcion que se ejecuta al cargar el archivo form en maestros
function cargaForm () {
  setTimeout(esperehide, 1000);
  $(".btn").on("click", accionForm);
  //Cuando se selecciona una imagen en usuario
  $('.fileimagen').on('change', function(e) {
     PreImagen(this, e);
  });
}



















function mostrarsubmenu (datos) {
  $(this).toggleClass('open');
}
// Funcion que se ejecuta al cargar el listado de usuarios / residentes
function accionResidentes() {
   $('.lista_historial_facturas > button').on('click', verEditarBorrarUsuarios);
   $('.lista_historial_facturas > button').on('touch', verEditarBorrarUsuarios);
   setTimeout(esperehide, 1500);
}
// Funcion que se ejecuta al hacer clic en las opciones del listado de usuarios / residentes
function verEditarBorrarUsuarios (datos) {
   espereshow();
   var id_registro = $(this).parent("td").attr('name');
   var html_opc = $(this).children('i').attr("class");
   switch(html_opc){
      case "glyphicon glyphicon-remove":
         swal({
            title: "¿Esta Seguro?",
            text: "Se borrará el registro con # id " + id_registro,
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancelar",
            confirmButtonColor: "#F8BB86",
            confirmButtonText: "Eliminar!",
            closeOnConfirm: false
         },
         function(){
            swal({
               title: "Eliminado!",
               text: "El registro se ha eliminado.",
               type: "success",
               confirmButtonText: "Continuar",
               confirmButtonColor: "#94B86E"
            });
         });
         setTimeout(esperehide, 1500);
         break;
      case "glyphicon glyphicon-eye-open":
         $("#col-md-12").load('detalle-del-apartamento.php?ver='+id_registro);
         break;
      case "glyphicon glyphicon-pencil":
         $("#col-md-12").load('detalle-del-apartamento.php?id_upd='+id_registro);
         break;
      default:
         $("#col-md-12").load('detalle-del-apartamento.php?ver='+id_registro);
         break;
   }
}
// Funcion que se ejecuta al hacer click en los botones de agregar nuevo campo en el detalle del usuario
function mostrarCamposDinamicos (datos) {
   espereshow();
   var MaxInputs     = 8; //Número Maximo de Campos
   var id_div        = $(this).attr('id');
   var contenedor    = "#contenedor"+id_div; //ID del contenedor
   var campos = "";

   switch(id_div){
      case "1":
         campos = '<div><table style="width: 95%"><tr><td><label for="ejemplo_password_1">Nombre</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Ingrese el nombre"/></td><td><label for="ejemplo_password_1">Fecha Nacimiento</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Fecha de nacimiento"/></td><td><label for="sel1">Género</label><select class="form-control" id="sel1"> <option>Seleccione...</option><option>Masculino</option><option>Femenino</option></select></td><td><label for="sel1">Tiene Hijos?</label><select class="form-control" id="sel1"> <option>Seleccione...</option><option>Si</option><option>No</option></select></td><td><label for="sel1">Vínculo</label><select class="form-control" id="sel1"> <option>Seleccione...</option><option>Padre/Madre</option><option>Hijo/Hija</option><option>Esposo/Esposa</option><option>Familiar</option><option>Amigo/Amiga</option></select></td><td><button class="btn btn-danger" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></button><button class="btn btn-success"><i class="glyphicon glyphicon-plus" title="Agregar"></i></button></td></tr></table></div>';
         break;
      case "2":
         campos = '<div><table style="width: 100%"><tr><td><label for="ejemplo_password_1">Nombre</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Ingrese el nombre"/></td><td><label for="ejemplo_password_1">Nº Identificación</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Nº Identificación"/></td><td><label for="sel1">Horario</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Horario"/></td><td><label for="sel1">Permisos</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Permisos"/></td><td><label for="sel1">Tipo</label><select class="form-control" id="sel1"> <option>Seleccione...</option><option>Guarda Espaldas</option><option>Empleada de servicio</option><option>Otro</option></select></td><td><label for="sel1">Foto</label><input style="padding: 0;" type="file" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Permisos"/></td><td><button class="btn btn-danger" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></button><button class="btn btn-success"><i class="glyphicon glyphicon-plus" title="Agregar"></i></button></td></tr></table></div>';
         break;
      case "3":
         campos = '<div><table style="width: 95%"><tr><td><label for="ejemplo_password_1">Tipo</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Tipo"/></td><td><label for="ejemplo_password_1">Raza</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Raza"/></td><td><label for="sel1">Nombre</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Nombre"/></td><td><label for="sel1">Vacunas</label><input style="padding: 0;" type="file" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Permisos"/></td><td><button class="btn btn-danger" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></button><button class="btn btn-success"><i class="glyphicon glyphicon-plus" title="Agregar"></i></button></td></tr></table></div>';
         break;
      case "4":
         campos = '<div><table style="width: 95%"><tr><td><label for="ejemplo_password_1">Tipo</label><select class="form-control" id="sel1"> <option>Seleccione...</option><option>Automovil</option><option>Moto</option><option>Bicicleta</option><option>Otro</option></select></td><td><label for="ejemplo_password_1">Marca</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Marca"/></td><td><label for="sel1">Modelo</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Modelo"/></td><td><label for="sel1">Placa</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Placa"/></td><td><label for="sel1">Color</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Color"/></td><td><button class="btn btn-danger" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></button><button class="btn btn-success"><i class="glyphicon glyphicon-plus" title="Agregar"></i></button></td></tr></table></div>';
         break;
      case "5":
         campos = '<div><table style="width: 95%"><tr><td><label for="ejemplo_password_1">Nombre</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Nombre"/></td><td><label for="ejemplo_password_1">Número de Identificación.</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Número de Identificación."/></td><td><label for="ejemplo_password_1">Permisos</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Permisos"/></td><td><label for="ejemplo_password_1">Número de contacto</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Número de contacto"/></td><td><button class="btn btn-danger" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></button><button class="btn btn-success"><i class="glyphicon glyphicon-plus" title="Agregar"></i></button></td></tr></table></div>';
         break;
      case "6":
         campos = '<div><table style="width: 95%"><tr><td><label for="ejemplo_password_1">Nombre</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Nombre"/></td><td><label for="ejemplo_password_1">Número de Identificación.</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Número de Identificación."/></td><td><label for="ejemplo_password_1">Teléfono Contacto</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Teléfono Contacto"/></td><td><label for="ejemplo_password_1">Teléfono Celular</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Teléfono Celular"/></td><td><label for="ejemplo_password_1">Correo Electrónico</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Correo Electrónico"/></td><td><button class="btn btn-danger" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></button><button class="btn btn-success"><i class="glyphicon glyphicon-plus" title="Agregar"></i></button></td></tr></table></div>';
         break;
      default:
         break;
   }
   //var x = número de campos existentes en el contenedor
   var x = $(contenedor+" div").length + 1;
   var FieldCount = x - 1; //para el seguimiento de los campos
   if (x <= MaxInputs) //max input box allowed
   {
      FieldCount++;
      //agregar campo
      $(contenedor).append(campos);
      x++; //text box increment
   }
   $(".btn-danger").on("click", quitarCampoDinamico);
   setTimeout(esperehide, 1500);
}
// Funcion que quita el campo dinamico agregado haciendo click en el boton danger
function quitarCampoDinamico (datos) {
   espereshow();
   $(this).parent('td').parent('tr').parent('tbody').parent('table').parent('div').remove(); //eliminar el campo
   setTimeout(esperehide, 1500);
}
// funcion que habilita o deshabilita opciones en datos basicos del residente
function toggle(elemento) {
    if (elemento.value == "arrendatario") {
        document.getElementById("uno").style.display = "block";
        document.getElementById("esdelbanco").style.display = "none";
        document.getElementById("viveahi").style.display = "none";
        document.getElementById("vivealguien").style.display = "none";
        document.getElementById("coninmobiliaria").style.display = "block";
        document.getElementById("dos").style.display = "block";
        document.getElementById("tres").style.display = "block";
    }
    else if (elemento.value == "banco") {
        document.getElementById("esdelbanco").style.display = "block";
        document.getElementById("uno").style.display = "block";
        document.getElementById("dos").style.display = "none";
        document.getElementById("tres").style.display = "none";
        document.getElementById("viveahi").style.display = "block";
        document.getElementById("vivealguien").style.display = "none";
        document.getElementById("coninmobiliaria").style.display = "block";
        document.getElementById("inmobiliaria").style.display = "none";
    }
    else if (elemento.value == "propietario") {
        document.getElementById("viveahi").style.display = "block";
        document.getElementById("vivealguien").style.display = "none";
        document.getElementById("coninmobiliaria").style.display = "block";
        document.getElementById("uno").style.display = "block";
        document.getElementById("dos").style.display = "none";
        document.getElementById("tres").style.display = "none";
        document.getElementById("esdelbanco").style.display = "none";
    }
    else {
        if (elemento.value == "noapartamento") {
            document.getElementById("vivealguien").style.display = "block";
        } else if (elemento.value == "nohabitado") {
            document.getElementById("agregarCampo").style.display = "none";
        } else if (elemento.value == "habitado") {
            document.getElementById("agregarCampo").style.display = "block";
        } else if (elemento.value == "apartamento") {
            document.getElementById("vivealguien").style.display = "none";
        } else if (elemento.value == "siinmbiliaria") {
            document.getElementById("inmobiliaria").style.display = "block";
        } else if (elemento.value == "noinmbiliaria") {
            document.getElementById("inmobiliaria").style.display = "none";
        }
    }
}
// Funcion que cierra el detalle del evento al hacer click en el boton cancelar
function cerrarDetEvento (event) {
    event.preventDefault();
    $(".ing-cal").html("");
    $(".ing-cal").addClass('hidden');
}
// funcion que se ejecuta al carga la pagina de agregar estado financiero
function addEstFinanciero () {
  $(".btn-danger").on("click", cerrarModalDocs);
  $(".close").on("click", cerrarModalDocs);
  $("#agrega_concepto").on("click", agregarConcepto);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton agregar concepto en el formulario de agregar estado financierro
function agregarConcepto (datos) {
  var concepto_val = $("#concepto").val();
  var concepto_text = $("#concepto option:selected").html();
  var valor    = $("#valor").val();
  if((concepto_val !== '') && (valor !== '')){
    $("#conceptos").append('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"><span>'+concepto_text+'</span></div><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-right">$ '+valor+'</div><div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"><button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></div></div>');
  }
  else{
    if(concepto_val === ''){
      alert("El campo concepto es requerido");
      $("#concepto").focus();
    }
    else{
      alert("El campo valor es requerido");
      $("#valor").focus();
    }
  }
  $("#concepto").val('');
  $("#valor").val('');
}






// funcion que se ejecuta al cargar la pagina de maestros
function cargaMaestros () {
  $(".master").on("click", verMaestros);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton de un maestro
function verMaestros (argument) {
  espereshow();
  var id = $(this).attr('id');
  var tabla = $(this).attr('name');
  $("#col-md-12").load("0_list.php?tabla="+tabla+"&id="+id);
}
// funcion que se ejecuta al cargar la lista del maestro selecionado
function listaMaestros () {
  $(".btn").on("click", editarMaestros);
  setTimeout(esperehide, 500);
  setTimeout(cerrar_alert, 5000);
}
// funcion que se ejecuta al hacer click en los botones de la lista de estados financieros
function editarMaestros (datos) {
  var altopag = resizePag();
  var clase = $(this).attr('class');
  var id = $(this).parent("td").attr('name');
  var tabla = $(this).parent("td").attr('id');
  switch(clase){
    case 'btn btn-info':
      $(".ing-cal").load("0_edit.php?id="+id+"&tabla="+tabla+"&ver=1");
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'btn btn-success':
      $(".ing-cal").load("0_edit.php?id="+id+"&tabla="+tabla);
      $(".ing-cal").height(altopag);
      $(".ing-cal").removeClass('hidden');
      break;
  }
}
// funcion que se ejecuta al carga la pagina numero 4 de informes
function cargaInformes () {
  $(".btn").on("click", mostrarInforme);
  setTimeout(esperehide, 500);
  setTimeout(cerrar_alert, 5000);
}
// funcion que se ejecuta al hacer click en generar informe
function mostrarInforme (datos) {
  $("#lista_informe").removeClass('hidden');
}




// funcion que se ejecuta al cargar los datos del apartamento y si existe un apartamento
function cargarHabitantes (id_apto) {
  espereshow();
  $("#habita_content").load("./habitantes.php?id_apto="+id_apto);
}
// funcion que se ejecuta al cargar el listado de habitantes
function accionHabitantes () {
  $(".btn").on("click", formHabitante);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de habitantes
function formHabitante (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  if(tipo === 'Nuevo registro'){
    $("#habita_content").load("./habitantes_ed.php?id_apto="+id_apartamento);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#habita_content").load("./habitantes_ed.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Editar Información'){
      $("#habita_content").load("./habitantes_ed.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Eliminar'){
      $("#habita_content").load("./habitantes_ed.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
  } 
}
// funcion que se ejecuta al cargar el formulario de habitante
function editarHabitante () {
  $("#cancelar").on("click", regresaLista);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton cancelar
function regresaLista (datos) {
  var pag = $(this).attr('name');
  var id_apto = $("#id_apartamento").val();
  espereshow();
  $("#habita_content").load("./"+pag+"?id_apto="+id_apto);
}
// funcion que se ejecuta al cargar los datos del apartamento y si existe un apartamento
function cargarAutorizadas (id_apto) {
  espereshow();
  $("#autori_content").load("./autorizadas.php?id_apto="+id_apto);
}
// funcion que se ejecuta al cargar el listado de personas autorizadas
function accionAutorizadas () {
  $(".btn").on("click", formAutorizadas);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de habitantes
function formAutorizadas (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  if(tipo === 'Nuevo registro'){
    $("#autori_content").load("./autorizadas_ed.php?id_apto="+id_apartamento);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#autori_content").load("./autorizadas_ed.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Editar Información'){
      $("#autori_content").load("./autorizadas_ed.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Eliminar'){
      $("#autori_content").load("./ins_upd_autori.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
  } 
}
// funcion que se ejecuta al cargar el formulario de personas autorizadas
function editarAutorizadas () {
  $("#cancelar").on("click", regresaListaAutorizadas);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton cancelar
function regresaListaAutorizadas (datos) {
  var pag = $(this).attr('name');
  var id_apto = $("#id_apartamento").val();
  espereshow();
  $("#autori_content").load("./"+pag+"?id_apto="+id_apto);
}
// funcion que se ejecuta al cargar los datos del apartamento y si existe un apartamento
function cargarEmergencia (id_apto) {
  espereshow();
  $("#emerg_content").load("./emergencia.php?id_apto="+id_apto);
}
// funcion que se ejecuta al cargar el listado de personas Emergencia
function accionEmergencia () {
  $(".btn").on("click", formEmergencia);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de habitantes
function formEmergencia (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  if(tipo === 'Nuevo registro'){
    $("#emerg_content").load("./emergencia_ed.php?id_apto="+id_apartamento);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#emerg_content").load("./emergencia_ed.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Editar Información'){
      $("#emerg_content").load("./emergencia_ed.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Eliminar'){
      $("#emerg_content").load("./ins_upd_autori.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
  } 
}
// funcion que se ejecuta al cargar el formulario de personas Emergencia
function editarEmergencia () {
  $("#cancelar").on("click", regresaListaEmergencia);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton cancelar
function regresaListaEmergencia (datos) {
  var pag = $(this).attr('name');
  var id_apto = $("#id_apartamento").val();
  espereshow();
  $("#emerg_content").load("./"+pag+"?id_apto="+id_apto);
}
// funcion que se ejecuta al cargar los datos del apartamento y si existe un apartamento
function cargarServicio (id_apto) {
  espereshow();
  $("#serv_content").load("./servicio.php?id_apto="+id_apto);
}
// funcion que se ejecuta al cargar el listado de personas de servicio
function accionServicio () {
  $(".btn").on("click", formServicio);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer clic en los botones del listado de personal de servicio
function formServicio (datos) {
  espereshow();
  var tipo = $(this).attr('title');
  var id_apartamento = $("#id_apartamento").val();
  if(tipo === 'Nuevo registro'){
    $("#serv_content").load("./servicio_ed.php?id_apto="+id_apartamento);
  }
  else{
    var id_habita = $(this).parent("div").attr('name');
    if(tipo === 'Ver Información'){
      $("#serv_content").load("./servicio_ed.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Editar Información'){
      $("#serv_content").load("./servicio_ed.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
    else if(tipo === 'Eliminar'){
      $("#serv_content").load("./ins_upd_autori.php?id_habita="+id_habita+"&id_apto="+id_apartamento);
    }
  } 
}
// funcion que se ejecuta al cargar el formulario de personas Servicio
function editarServicio () {
  $("#cancelar").on("click", regresaListaServicio);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton cancelar del formulario de personal de sesrvicio
function regresaListaServicio (datos) {
  var pag = $(this).attr('name');
  var id_apto = $("#id_apartamento").val();
  espereshow();
  $("#serv_content").load("./"+pag+"?id_apto="+id_apto);
}

























$(document).on('ready', cargarInicio);









