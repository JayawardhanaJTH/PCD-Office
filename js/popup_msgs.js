function error_popup(msg){
    Swal.fire({
        icon: 'error',
        title: 'Oops..',
        text: msg
    })
}

function success_popup(msg){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: msg,
        showConfirmButton: false,
        timer: 2500
    })
}