$(function(){
    
    $('.confirm-delete').on('click', function () {
        event.preventDefault();
        console.log(this);
        var button = this; // OU event.currentTarget
        swal({
            title: "Êtes vous sûr de couloir supprimer cette brasserie ??",
            text: "Vous ne pourrez plus goûter les bierrers de cxette brasserie.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then(function (hasConfirm) {
            if (hasConfirm) {
                console.log($(button));
                window.location = $(button).attr('href');

            }    
         
          });

    });
 
});


