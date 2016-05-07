function invitado(cual) {
    switch(cual) {
        case 'S':
            document.getElementById("UserUsername").value = "Invitado";
            document.getElementById("UserUsername").style.display = "none";
            document.getElementById("UserPassword").value = "invitado";
            document.getElementById("UserPassword").style.display = "none";
            break;
        case 'N':
            document.getElementById("UserUsername").value = "";
            document.getElementById("UserUsername").style.display = "block";
            document.getElementById("UserPassword").value = "";
            document.getElementById("UserPassword").style.display = "block";
            break;
    }
}

function actualiza(Url, Capa, valor) {
    //var $q = jQuery.noConflict();

    $.ajax({
        type: 'post',
        url: Url + '/' + valor,
        dataType: 'html',
        success: function(data) {
            $("#" + Capa).html(data)
        }
    });

    return false;
}

function showMessage(msg, type) {
    $(document).ready(function() {
        switch (type) {
            case 'success':
                $().toastmessage('showSuccessToast', msg);
                break;
            case 'notice':
                $().toastmessage('showNoticeToast', msg);
                break;
            case 'warning':
                $().toastmessage('showWarningToast', msg);
                break;
            case 'danger':
                $().toastmessage('showErrorToast', msg);
                break;
            default:
                $().toastmessage('showSuccessToast', msg);
                break;
        }
    });
}
function validarAjax(Url, Capa, formulario) {
    var $j = jQuery.noConflict();


    $.ajax({
        type: 'POST',
        //data: 'input1='+$("#input1").val()+'&imput2='+$("#input1").val(),
        data: $j('#' + formulario).serialize(),
        url: Url,
        dataType: 'html',
        success:
                function(data) {



                    $('#ajax-loader').fadeIn(100); // mostramos el gif animado
                    $("#" + Capa).html('');
                    $("#" + Capa).html(data);
                }
    });
    return false;

}


function enviarAjax(Url, Capa, formulario) {
    $('#cargando').html('<div><img src="img/loading.gif"/ width="50px">\n\
     Cargando...Espere...</div>');
    var $j = jQuery.noConflict();


    $.ajax({
        statusCode: {
            403: function() {

                //showMessage('Su Sesion ha sido Cerrada por Inactividad', 'notice');
                window.location.replace("app/webroot/index.php");
            }},
        type: 'POST',
        //data: 'input1='+$("#input1").val()+'&imput2='+$("#input1").val(),
        data: $j('#' + formulario).serialize(),
        url: Url,
        dataType: 'html',
        success:
                function(data) {



                    $('#ajax-loader').fadeIn(100); // mostramos el gif animado
                    $("#" + Capa).html('');
                    $("#" + Capa).html(data);
                    $('#cargando').html('<div></div>');

                }
    });
    return false;

}

function enviarAjaxDivContenido(Url, Capa, formulario) {
    $('#boton').html('<div><img src="img/loading.gif"/ width="30px">\n\
     Procesando...</div>');
    var $j = jQuery.noConflict();


    $.ajax({
        statusCode: {
            403: function() {

                //showMessage('Su Sesion ha sido Cerrada por Inactividad', 'notice');
                window.location.replace("app/webroot/index.php");
            }},
        type: 'POST',
        //data: 'input1='+$("#input1").val()+'&imput2='+$("#input1").val(),
        data: $j('#' + formulario).serialize(),
        url: Url,
        dataType: 'html',
        success:
                function(data) {



                    $('#ajax-loader').fadeIn(100); // mostramos el gif animado
                    $("#" + Capa).html('');
                    $("#" + Capa).html(data);
                    $('#cargando').html('<div></div>');

                }
    });
    return false;

}

function enviarAjaxDivCargando(Url, Capa, formulario, Capa2) {
    $("#" + Capa2).html('<div><img src="img/loading.gif"/ width="30px">\n\
     Procesando...</div>');
    var $j = jQuery.noConflict();
    $.ajax({
        statusCode: {
            403: function() {

                //showMessage('Su Sesion ha sido Cerrada por Inactividad', 'notice');
                window.location.replace("app/webroot/index.php");
            }},
        type: 'POST',
        //data: 'input1='+$("#input1").val()+'&imput2='+$("#input1").val(),
        data: $j('#' + formulario).serialize(),
        url: Url,
        dataType: 'html',
        success:
                function(data) {



                    $('#ajax-loader').fadeIn(100); // mostramos el gif animado
                    $("#" + Capa).html('');
                    $("#" + Capa).html(data);
                    $('#cargando').html('<div></div>');

                }
    });
    return false;

}
function enviarAjaxDivContenidoAdmin(Url, Capa, formulario) {
    $('#boton').html('<div><font color="red" size="2"><b>procesando... espere por favor...</font></b></div>');
    var $j = jQuery.noConflict();
    $.ajax({
        statusCode: {
            403: function() {

                //showMessage('Su Sesion ha sido Cerrada por Inactividad', 'notice');
                window.location.replace("app/webroot/index.php");
            }},
        type: 'POST',
        //data: 'input1='+$("#input1").val()+'&imput2='+$("#input1").val(),
        data: $j('#' + formulario).serialize(),
        url: Url,
        dataType: 'html',
        success:
                function(data) {



                    $('#ajax-loader').fadeIn(100); // mostramos el gif animado
                    $("#" + Capa).html('');
                    $("#" + Capa).html(data);
                    $('#cargando').html('<div></div>');

                }
    });
    return false;

}

function enviarAjaxDivContenidoAdminCapa(Url, Capa, formulario) {
    $('#' + Capa).html('<div><font color="red" size="2"><b>procesando... espere por favor...</font></b></div>');
    var $j = jQuery.noConflict();


    $.ajax({
        statusCode: {
            403: function() {

                //showMessage('Su Sesion ha sido Cerrada por Inactividad', 'notice');
                window.location.replace("app/webroot/index.php");
            }},
        type: 'POST',
        //data: 'input1='+$("#input1").val()+'&imput2='+$("#input1").val(),
        data: $j('#' + formulario).serialize(),
        url: Url,
        dataType: 'html',
        success:
                function(data) {



                    $('#ajax-loader').fadeIn(100); // mostramos el gif animado
                    $("#" + Capa).html('');
                    $("#" + Capa).html(data);
                    $('#cargando').html('<div></div>');

                }
    });
    return false;

}
function enviarAjax2(Url, Capa, formulario) {
    $('#contenido').html('<div><img src="img/loading.gif"/ width="100px">\n\
     Cargando...Espere111...</div>');

    $.ajax({
        statusCode: {
            403: function() {

                //showMessage('Su Sesion ha sido Cerrada por Inactividad', 'notice');
                window.location.replace("app/webroot/index.php");
            }},
        type: 'GET',
        //data: 'input1='+$("#input1").val()+'&imput2='+$("#input1").val(),
        data: $('#' + formulario).serialize(),
        url: Url,
        dataType: 'html',
        success: function(data) {
            $("#" + Capa).html('');
            $("#" + Capa).html(data);
            $("#cargando").css("display", "inline");
            $("#" + Capa).load(Url, function() {
                $("#cargando").css("display", "none");
            });

        }
    });

    return false;
}

function enviarAjaxGet(Url, Capa) {

    $('#' + Capa).html('<div><img src="img/loading.gif"/ width="100px">\n\
     Cargando...Espere...</div>');
    $.ajax({
        statusCode: {
            403: function() {

                //showMessage('Su Sesion ha sido Cerrada por Inactividad', 'notice');
                window.location.replace("app/webroot/index.php");
            }},
        type: 'GET',
        //data: 'input1='+$("#input1").val()+'&imput2='+$("#input1").val(),
        //data: $('#'+formulario).serialize(),
        url: Url,
        dataType: 'html',
        success: function(data) {
            $("#" + Capa).html('');
            $("#" + Capa).html(data);
        }
    });

    return false;
}
function removeBackdrop() {
    $(function() {
        $('#divModal').html('');
        $('.modal-backdrop').removeClass('modal-backdrop');

    });
}