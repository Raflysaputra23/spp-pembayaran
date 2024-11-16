export function SwetAlertInfo(type, pesan, title) {
    Swal.fire({
        title: `${title}`,
        text: `${pesan}`,
        icon: `${type}`
    });
}

export function SwetAlertConfirm(type, pesan, title) {
    return Swal.fire({
        title: `${title}`,
        text: `${pesan}`,
        icon: `${type}`,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!"
    });
}