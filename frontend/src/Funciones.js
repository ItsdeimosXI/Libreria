import Swal from 'sweetalert2';
import axios from 'axios';

export function show_alerta(mensaje,icono,foco=''){
    if(foco !=''){
        document.getElementById(foco).focus();
    }
    Swal.fire({
        title:mensaje,
        icon:icono,
        customClass: {confirmButton: 'btn btn-primary', popup: 'animated zoomIn'},
        buttonsStyling: false
    });
}

export function confirmar(id,descripcion){
    var url = 'http://127.0.0.1:8000/apiv1/generos/' + id;
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {confirmButton:'btn btn-success', cancelButton: 'btn btn-danger'},
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: 'Seguro que quiere eliminar el genero '+ descripcion,
        text: 'Se perdera el genero',
        icon: 'question',
        showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Si, eliminar',
        cancelButtonText:'<i class="fa-solid fa-ban"></i>Cancelar',
    }).then((result) => {
        if (result.isConfirmed){
            enviarSolicitud('DELETE',(id) ,url, 'Genero eliminado');
        }else{
            show_alerta('Operacion completada', 'info');
        }
    })
}

export function enviarSolicitud(metodo, parametros, url, mensaje){
    axios({method:metodo, url:url, data:parametros}).then(function(respuesta){
        var status = respuesta.data[0]['status'];
        if(status ='success'){
            show_alerta(mensaje, status);
            window.setTimeout(function(){
                window.location.href='/';
            },1000);
        }
        else {
            var listado = '';
            var errores = respuesta.data[1]['errors'];
            Object.keys(errores).forEach(
                key => listado += errores[key][0]+''
            );
            show_alerta(listado, 'error');
        }
    }).catch(function(error){
        show_alerta('Error en la operacion', 'error');
    });
}