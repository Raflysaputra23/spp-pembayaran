export default function SwetAlertMixin(type, pesan, title) {
    Swal.fire({
        title: `${title}`,
        text: `${pesan}`,
        icon: `${type}`
    });
}