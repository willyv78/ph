// variables globales
var sess_id   = $("#user_id").val();
var sess_perf = $("#sess_user_perf").val();
var sess_mail = $("#sess_user_mail").val();


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
// Funcion que carga la pagina inicial 0 en el administrador
function cargarInicio() {
  $("#col-md-12").load("./lista-de-apartamentos.php");
  $(".menu_movil").on('click', cargarPagina);
  $(".menu_movil").on('touch', cargarPagina);
  history.pushState({page: "lista-de-apartamentos.php"}, "lista de apartamentos", "lista-de-apartamentos.html");
}
// Funcion que se ajecuta cuando se hace click en un item del menu
function cargarPagina (event) {
  espereshow();
  event.preventDefault();
  var date = new Date();
  var time = date.getTime();
  var pagina = $(this).attr('href');
  
  $("#col-md-12").html("");
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
  else{
    var val_pag = pagina.split('-');
    var pag = val_pag[2];
    $("#col-md-12").load("./"+pag+".php");
    history.pushState({page: pag+".php"}, pag, pag+".html");
  }
  $(".navbar-collapse").removeClass('in');
  $(".navbar-collapse").addClass('collapse');
}
// Funcion que se ejecuta al cargar la pagina de estados financieros listado
function accionEstFinanciero () {
  $(".btn").on("click", verEstFinanciero);
  setTimeout(function(){$("#tabla > thead > tr > th:last-child").removeClass('sorting');}, 100);
  setTimeout(esperehide, 500);
  setTimeout(cerrar_alert, 8500);
}
// funcion que se ejecuta al hacer click en los botones de la lista de estados financieros
function verEstFinanciero (event) {
  espereshow();
  event.preventDefault();
  var id_apto = $(this).parent('a').parent('td').attr('name');
  var clase = $(this).attr('title');
  switch(clase){
    case 'Estado Financiero':
      $(".ing-cal").load("estado-financiero.php?id_apto="+id_apto);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'Datos del Apartamento':
      $("#col-md-12").load('detalle-del-apartamento.php?id_apto='+id_apto);
      history.pushState({page: "detalle-del-apartamento.php?id_apto="+id_apto}, "Detalle del apartamento", "detalle-del-apartamento.html");
      break;
    case 'Enviar mensaje':
      $(".ing-cal").load("contactar-al-administrador.php");
      $(".ing-cal").removeClass('hidden');
      break;
    case 'Nuevo registro':
      $("#col-md-12").load('detalle-del-apartamento.php');
      history.pushState({page: "detalle-del-apartamento.php"}, "Detalle del apartamento", "detalle-del-apartamento.html");
      break;
  }
}
// funcion para volver o cargar una pagina dad en el cuerpo del contenido
function regresarPagina (pagina) {
  $("#col-md-12").load("./"+pagina);
}
// Funcion que se ejecuta al cargar la pagina detalle del usuario
function camposDinamicos () {
  $('dl a').on("click", abrirPestana);
  $('button.btn-default').on('click', botonRegresar);
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
  $("dl dd").html("");
  var tipo = $(this).attr('id');
  var id_apto = $("#id_apartamento").val();
  // oculta todos los div activos
  $('dl dd').hide();
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
  else if(tipo === 'habitantes'){pag = "lista_residentes.php?id_apto="+id_apto+"&tipo_res=2&tipo_nom="+tipo;}
  else if(tipo === 'servicio'){pag = "lista_residentes.php?id_apto="+id_apto+"&tipo_res=5&tipo_nom="+tipo;}
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
    $(this).next().hide();
    $(this).next().html('');
    setTimeout(esperehide, 100);
  }
  // si no se esta mostrando se muestra y se agrega la clase activo
  else {
    // oculta todos los div activos
    $('dl dd').hide();
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
      $("#"+tipo_nom).next().load("../php/ins_upd_lista.php?id_habita="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res);
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
      $("#"+tipo_nom).next().load("../php/ins_upd_lista.php?id_habita="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res);
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
      $("#"+tipo_nom).next().load("./ins_upd_lista.php?id_habita="+id_habita+"&id_apto="+id_apartamento+"&tipo_res="+tipo_res);
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
// funcion que se ejecuta al cargar el formulario del detalle del apartamento
function cargaFormAptos () {
  setTimeout(esperehide, 500);
  $(".glyphicon-search").on("click", datosPredeterminados);
}
// funcion que se ejecuta al hacer click en buscar tipo de apartamento por numero de apartamento
function datosPredeterminados (datos) {
  // obtengo el numero del apartamento
  var apto = $("#rmb_aptos_nom").val();
  var id_upd = $("#id_upd").val();
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
          data = datos.split("|");
          $("#rmb_aptos_area").val(data[0]);
          $("#rmb_aptos_priv").val(data[1]);
          $("#rmb_aptos_banos").val(data[2]);
          $("#rmb_aptos_coc").val(data[3]);
          $("#rmb_aptos_hab").val(data[4]);
          $("#rmb_aptos_balc").val(data[5]);
          $("#rmb_aptos_coef").val(data[6]);
          $(".nombre_tipo").html(data[7]);
          $("#rmb_taptos_id").val(data[8]);
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
          $("#rmb_aptos_terr").val(data[11]);
        }
        else{
          setTimeout(esperehide, 500);
          swal({
            title: "Error!",
            text: "Ha ocurrido un error,\nEl número de apartamento ya existe\n no puede utilizarlo.",
            type: "error",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#E25856"
          });
          return;
        }
      }
    });
  }
}
// Funcion que se ejecuta cuando se carga la pagina equipos y manteminiento en inventario
function cargarMantenimiento () {
  $("button.btn-default").on("click", editMantenimiento);
  $("#content-mant").load("./tipos-de-equipos-y-mantenimiento.php");
  // setTimeout(cerrar_alert, 5000);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en nuevo o editar equipo
function editMantenimiento (datos) {
  espereshow();
  $("#cerrar_modal").on("click", cerrarModalDocs);
  $(".close").on("click", cerrarModalDocs);
  var id = $(this).parent("div").attr('id');
  var id_equipo = $(this).parent("div").attr('name');
  switch(id){
    case 'nuevo':
      var tipo_equipo = $("#rmb_teq_id").val();
      if(tipo_equipo){
        $(".ing-cal").load("agregar-actualizar-equipo-por-tipo.php?tipo_equipo="+tipo_equipo);
        $(".ing-cal").removeClass('hidden');
        $("#rmb_teq_id").val("");
      }
      else{
        setTimeout(esperehide, 500);
        $("#rmb_teq_id").focus();
        swal({
            title: "Atención!",
            text: "Seleccione un tipo de equipo!",
            type: "error",
            confirmButtonText: "Aceptar",
            confirmButtonColor: "#E25856"
        });
        return;
      }
      
      break;
    case 'editar':
      $(".ing-cal").load("agregar-actualizar-equipo-por-tipo.php?id_equipo="+id_equipo);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'historial':
      $(".ing-cal").load("historial-equipo-por-tipo.php?id_equipo="+id_equipo);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'detalle':
      $(".ing-cal").load("ver-mas-equipo-por-tipo.php?id_equipo="+id_equipo);
      $(".ing-cal").removeClass('hidden');
      // alert("Estamos aca");
      break;
    case 'regresar':
      $("#col-md-12").load("./equipos-y-mantenimientos.php");
      history.pushState({page: "equipos-y-mantenimientos.php"}, "Equipos Activos", "equipos-activos.html");
      break;
  }
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
  $("button.btn-default").on("click", editMantenimiento);
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
  $("button.btn-default").on("click", nuevoMantenimiento);
  $("tbody > tr").on("click", editarMantenimiento);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton nuevo en el historial de mantenimiento en equipos
function editarMantenimiento (datos) {
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
  if(this.html() === 'Nuevo'){
    var id_equipo = $("#rmb_equipos_id").val();
    $(".ing-cal").load("agregar-actualizar-mantenimiento-equipo.php?id_equipo="+id_equipo);
    $(".ing-cal").removeClass('hidden');
  }
}
// Funcion que se ejecuta al hacer click en el boton cerrar en la ventana modal del formulario de ingreso, edicion o condulta de documentos
function cerrarModalModal (datos) {
  var id_equipo = $("#rmb_equipos_id").val();
  espereshow();
  $(".ing-cal").html('');
  $(".ing-cal").load("historial-equipo-por-tipo.php?id_equipo="+id_equipo);
  $(".ing-cal").removeClass('hidden');
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al cargar la pagina de historial de mantenimiento
function detMantenimiento () {
  $(".close").on("click", cerrarModalModal);
  setTimeout(esperehide, 500);
}
// Funcion que se ejectuta al cargar la pagina de mensajes
function verMensajes () {
  $("#mensajes").load("lista-mensajes.php");
  $("button").on("click", accionMensajes);
  setTimeout(esperehide, 500);
}
// Funcion que se ejecuta al hacer click en los botones de la pagina de mensajes
function accionMensajes (datos) {
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
  var id_mensaje = $(this).parent("div").attr('id-mensaje');
  var tipoboton = $(this).html();
  switch(tipoboton){
    case 'Reenviar':
      $(".ing-cal").load("reenviar-mensaje.php?id_mensaje="+id_mensaje);
      $(".ing-cal").removeClass('hidden');
      break;
    case 'Responder':
      $(".ing-cal").load("responder-mensaje.php?id_mensaje="+id_mensaje);
      $(".ing-cal").removeClass('hidden');
      break;
  }
}
// fincion que se ejecuta al mostrar el formulario de agregar, editar o ver documento
function editDocumento () {
  $(".close").on("click", cerrarModalDocs);
  $(".input-group-addon").on("click", agregarAptosMens);
  $("span").children(".glyphicon-remove").on("click", removerAptosMens);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en el boton mas del form de tipos de aptos
function agregarAptosMens (datos) {
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
// fincion que se ejecuta al cargar la pagina de estado financiero
function cargaEstadoFinanciero () {
  $(".close").on("click", cerrarModalDocs);
  $(".btn-anios").on("click", consultarEstadoAnio);
  $(".btn-nuevo").on("click", nuevoEstadoFinanciero);
  $(".btn-editar").on("click", editarEstadoFinanciero);
  setTimeout(esperehide, 500);
}
// funcion que se ejecuta al hacer click en los botones de los años en estado financiero
function consultarEstadoAnio (datos) {
  espereshow();
  // capturamos el html del boton presionado
  var tipo_btn = $(this).html();
  var id_apto = $("#id_apto").val();
  $(".ing-cal").load("estado-financiero.php?id_apto="+id_apto+"&anio="+tipo_btn);
  $(".ing-cal").removeClass('hidden');
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
// function que se ejecuta al cargar la pagina de estadisticas
function cargarEstadisticas (argument) {
  setTimeout(esperehide, 500);
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
         campos = '<div><table style="width: 95%"><tr><td><label for="ejemplo_password_1">Nombre</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Nombre"/></td><td><label for="ejemplo_password_1">CC.</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="CC."/></td><td><label for="ejemplo_password_1">Permisos</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Permisos"/></td><td><label for="ejemplo_password_1">Número de contacto</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Número de contacto"/></td><td><button class="btn btn-danger" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></button><button class="btn btn-success"><i class="glyphicon glyphicon-plus" title="Agregar"></i></button></td></tr></table></div>';
         break;
      case "6":
         campos = '<div><table style="width: 95%"><tr><td><label for="ejemplo_password_1">Nombre</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Nombre"/></td><td><label for="ejemplo_password_1">CC.</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="CC."/></td><td><label for="ejemplo_password_1">Teléfono Contacto</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Teléfono Contacto"/></td><td><label for="ejemplo_password_1">Teléfono Celular</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Teléfono Celular"/></td><td><label for="ejemplo_password_1">Correo Electrónico</label><input type="text" class="form-control" name="mitexto[]" id="campo_' + FieldCount + '" placeholder="Correo Electrónico"/></td><td><button class="btn btn-danger" title="Eliminar"><i class="glyphicon glyphicon-remove"></i></button><button class="btn btn-success"><i class="glyphicon glyphicon-plus" title="Agregar"></i></button></td></tr></table></div>';
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
  var clase = $(this).attr('class');
  var id = $(this).parent("td").attr('name');
  var tabla = $(this).parent("td").attr('id');
  switch(clase){
    case 'btn btn-info':
      $(".ing-cal").load("0_edit.php?id="+id+"&tabla="+tabla+"&ver=1");
      $(".ing-cal").removeClass('hidden');
      break;
    case 'btn btn-success':
      $(".ing-cal").load("0_edit.php?id="+id+"&tabla="+tabla);
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









