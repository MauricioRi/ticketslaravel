function eliminarUsuario(usuario) {
    
    Swal.fire({
        title: 'Seguro?',
        text: "No se podra deshacer esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax('usuario/' + usuario, {
                type: 'DELETE'
            }, function (data) {
                console.log(data);
            });
            Swal.fire(
                'Eliminado',
                'Se elimino el usuario',
                'success'
            );
            table.bootstrapTable('refresh');
            
        }
    })


}


function editarUsuario(id) {
    location.href = '/usuario/'+id
}

function editarMiUsuario(id) {
    location.href = '/miusuario/'+id
}