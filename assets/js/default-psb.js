
//SweetAlert Versi JS
function mySwalalert(msg, typ) {

    if (typ == "success") {
        Swal.fire({
            title: "Berhasil",
            html: msg,
            icon: typ,
            timer: 5000,
            showCancelButton: false,
            showConfirmButton: false

        });
    } else if (typ == "info") {
        Swal.fire({
            title: "Info",
            html: msg,
            icon: typ,
            timer: 5000,
            showCancelButton: false,
            showConfirmButton: false

        });
    } else if (typ == "error") {
        Swal.fire({
            title: "Error / Gagal",
            html: msg,
            icon: typ,
            timer: 5000,
            showCancelButton: false,
            showConfirmButton: false

        });
    } else if (typ == "warning") {
        Swal.fire({
            title: "Peringatan",
            html: msg,
            icon: typ,
            timer: 5000,
            showCancelButton: false,
            showConfirmButton: false

        });
    }
}

