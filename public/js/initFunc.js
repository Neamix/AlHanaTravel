$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': "application/json"
    },

    beforeSend: function() {
        console.log(window.loader);
        $(`.loader[data-load="${window.loader}"]`).removeClass('d-none')
    },

    complete: function() {
        $(`.loader[data-load="${window.loader}"]`).addClass('d-none');
    }
});