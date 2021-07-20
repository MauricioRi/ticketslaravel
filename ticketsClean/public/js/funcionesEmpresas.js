const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

function eliminarEmpresa(empresa) {
    
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
            $.ajax('empresa/' + empresa, {
                type: 'DELETE'
            }, function (data) {
                console.log(data);
            });
            Swal.fire(
                'Eliminada',
                'Se elimino la empresa',
                'success'
            );
            table.bootstrapTable('refresh')
            
        }
    })


}


function editarEmpresa(id) {
    location.href = '/empresa/'+id
}