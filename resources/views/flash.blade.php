<script>
    @if(session()->has('flash_message'))
        Swal.fire({
            title : "{{session('flash_message.title')}}",
            text : "{{session('flash_message.message')}}",
            icon : "{{session('flash_message.level')}}",
            timer: 5000,
        showConfirmButton: false,
        html: $('<div>')
        .addClass('some-class')
        .text('{{session('flash_message.message')}}'),
        animation: false,
        customClass: 'animated tada'
    });
    @endif
</script>
