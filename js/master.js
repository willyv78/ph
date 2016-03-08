// variables globales
var sess_id   = $("#user_id").val();
var sess_perf = $("#sess_user_perf").val();
var sess_mail = $("#sess_user_mail").val();
// Funcion que se ejecuta para ver el mensaje de cargando
function espereshow ()
{
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
// Funcion que carga la pagina inicial 0 en el administrador
function cargarInicio() {
   $("#col-md-12").load("./inicio.php");
   $(".menu_movil").on('click', cargarPagina);
   $(".menu_movil").on('touch', cargarPagina);
   // $(".sub-menu").on('touch', mostrarsubmenu);
}
// Funcion que se ajecuta cuando se hace click en un item del menu
function cargarPagina (datos) {
   espereshow();
   var pagina = $(this).attr('href');
   var val_pag = pagina.split('#');
   var pag = val_pag[1];
   $("#col-md-12").html();
   $("#col-md-12").load("./"+pag+".php");
   $(".navbar-collapse").removeClass('in');
   $(".navbar-collapse").addClass('collapse');
}
// funcion que se ejecuta al cargar la pagina de inicio de master
function cargaInicio () {
    $(".btn-config").on('click', cargarLista);
    setTimeout(esperehide, 1000);
}
// funcion que se ejecuta al hacer click en algun boton en configuracion
function cargarLista (datos) {
    espereshow();
    var tabla = $(this).attr('name');
    var nom = encodeURIComponent($(this).children('button').html());
    $("#col-md-12").load("./lista.php?tabla="+tabla+"&nom="+nom);
}
// funcion que se ejecuta al cargar la lista de maestros
function cargaLista () {
    setTimeout(esperehide, 1000);
    setTimeout(function(){
        $("#tabla > thead > tr > th:last-child").removeClass('sorting');
    }, 200);
    $("#tabla > thead > tr > th:last-child").on('click', desactivarAccion);
    $(".new-reg").on("click", nuevoVolver);
    $(".acciones").on("click", accionRegistro);
}
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
        $("#col-md-12").load("./inicio.php");
    }
    else{
        var tabla = $("#nom-tabla").val();
        var nom = encodeURIComponent($("#nom").val());
        $("#col-md-12").load("./form.php?tabla="+tabla+"&nom="+nom);
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
// funcion que se ejecuta cuando se hace clic en algun boton del form en maestros
function accionForm (datos) {
    var id_boton = $(this).attr('id');
    var tabla = $("#nom-tabla").val();
    var nom = encodeURIComponent($("#nom").val());
    var campos = $("#campos").val();
    var requeridos = $("#requeridos").val();
    var camp = campos.split(',');
    var campo_post = "";
    if(requeridos.length){
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
            if(((camp[i] === 'rmb_residente_foto') || (camp[i] === tabla+'_img') || (camp[i] === 'rmb_tcont_icono') || (camp[i] === 'rmb_proyecto_foto')) && (camp[i] !== 'rmb_banner_img')){
                var test6 = window.btoa($("#vistaPrevia").attr("src"));
                campo_post += camp[i]+"="+test6+"";
            }
            else{
                campo_post += camp[i]+"="+$("#"+camp[i]).val();
            }
        }
        else{
            if(((camp[i] === 'rmb_residente_foto') || (camp[i] === tabla+'_img') || (camp[i] === 'rmb_tcont_icono') || (camp[i] === 'rmb_proyecto_foto')) && (camp[i] !== 'rmb_banner_img')){
                var test6 = window.btoa($("#vistaPrevia").attr("src"));
                campo_post += "&"+camp[i]+"="+test6;
            }
            else{
                campo_post += "&"+camp[i]+"="+$("#"+camp[i]).val();
            }
        }
    }

    // validamos si la tabla es la de banner
    if(tabla === 'rmb_banner'){
      var datos_form = new FormData($("#form_master")[0]);
    }

    switch(id_boton){
      case 'cancel':
        $("#col-md-12").load("./lista.php?tabla="+tabla+"&nom="+nom);
        return;
        break;
      case 'ingresar':
        if(tabla === 'rmb_banner'){
          var send_post = datos_form;
        }
        else{
          var send_post = "ins=1&tabla="+tabla+"&"+campo_post;
        }
        break;
      case 'actualizar':
        if(tabla === 'rmb_banner'){
          var send_post = datos_form;
        }
        else{
          var id = $("#id").val();
          var send_post = "id_upd="+id+"&tabla="+tabla+"&"+campo_post;
        }
        break;
    }
    //Enviar los datos para ingresar o actualizar
    if(tabla === 'rmb_banner'){
      $.ajax({
          url:"./edicion.php",
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
                      $("#col-md-12").load("./lista.php?tabla="+tabla+"&nom="+nom);
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
          url:"./edicion.php",
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
                      $("#col-md-12").load("./lista.php?tabla="+tabla+"&nom="+nom);
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
//al hacer clic en el boton Editar o Borrar en lista maestros
function accionRegistro(datos) {
    var id = $(this).attr('id');
    var val = $(this).html();
    var tabla = $("#nom-tabla").val();
    var nom = encodeURIComponent($("#nom").val());
    switch(val){
        case 'Borrar':
            //Enviar los datos para Borrar
            $.ajax({
               url:"./edicion.php",
               cache:false,
               type:"POST",
               data: "id_sup="+id+"&tabla="+tabla,
               success: function(datos){
                  if(datos !== ''){
                     $("#col-md-12").load("./lista.php?tabla="+tabla+"&nom="+nom);
                     alert(datos);
                  }
                  else{alert("No se pudo "+val+" el registro");}
               }
            });
            break;
        case 'Editar':
            $("#col-md-12").load("./form.php?tabla="+tabla+"&nom="+nom+"&id="+id);
            break;
    }
}
// funcion que se ejecuta al cargar el archivo form en maestros
function cargaProyecto () {
    setTimeout(esperehide, 1000);
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
    //Cuando se selecciona una imagen en usuario
    $('.fileimagen').on('change', function(e) {
       PreImagen(this, e);
    });
}
//funcion para pre cargar la imagen seleccionada en campo tipo file imagen
function PreImagen(campo, e){
   var Lector, oFileInput = campo;
   if (oFileInput.files.length !== 0) {
      Lector = new FileReader();
      Lector.onloadend = function(e) {
         $('#vistaPrevia').attr('src', e.target.result);     
         };
      Lector.readAsDataURL(oFileInput.files[0]);
   }      
}




























$(document).on('ready', cargarInicio);