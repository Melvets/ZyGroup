// jQuery live search
$(document).ready(function() {
    $('#keyword').on('keyup', function() {
        $.get('ajax/member.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
        });
    });
});

// jQuery Fancybox
// $(document).ready(function() {
//     $(".picture").fancybox();
// });