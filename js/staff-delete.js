function delete_staff(staffId) {
    // alert(pid);

    var id = "delete";
    var dt = {id: id, staffId: staffId};

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'php/staff-add.php',
                method: 'POST',
                data: dt,
                success: function (msg) {
                    if (msg == 1) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        people_load();
                    }
                },
                error: function (request, error) {
                    alert("Request: " + JSON.stringify(error));
                }
            });
        }
    })

}
