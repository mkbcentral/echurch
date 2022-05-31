import Swal from 'sweetalert2'
//MAKE IS ONLINE PREACHING DIALOG
window.addEventListener('show-meke-online-confirmation-preaching',event=>{
    Swal.fire({
        title: 'Are-you sure ',
        text: "To make online this preaching ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('makeIsOnlineLsitener');
        }
        })
})
window.addEventListener('data-valided',event=>{
    Swal.fire(
        'Oprétion !',
        event.detail.message,
        'success'
    );
});

//MAKE IS ONLINE CHURCH DIALOG
window.addEventListener('show-meke-online-confirmation-church',event=>{
    Swal.fire({
        title: 'Are-you sure ',
        text: "To make online this church ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
        }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit('makeChurchIsOnlineLsitener');
        }
        })
})
window.addEventListener('data-valided',event=>{
    Swal.fire(
        'Oprétion !',
        event.detail.message,
        'success'
    );
});