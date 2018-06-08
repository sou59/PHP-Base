$(function () {
    $('.confirm-delete').on('click', function (event) {
        event.preventDefault();
        var button = this; // Ou event.currentTarget
        // Plugin Sweet Alert
        swal({
            title: 'Êtes-vous sûr de vouloir supprimer cette brasserie ?',
            text: 'Vous ne pourrez plus goûter les bières de cette brasserie.',
            icon: 'warning',
            buttons: true,
            dangerMode: true
        }).then(function (hasConfirm) {
            if (hasConfirm) { // Il veut supprimer la brasserie
                console.log($(button));
                // On redirige vers le lien du bouton
                window.location = $(button).attr('href');
            }
        });
    });
});
