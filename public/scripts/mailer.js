$(document).ready(function () {
    $('.contact-us-form').submit(function (event) {
        event.preventDefault();
        $('.loading-message').show();
        $('.sent-message').hide();
        $('.sent-not-message').hide();
        $.ajax({
            type: 'POST',
            url: 'scripts/mailer.php',
            data: {
                "contactName": $('#contactName').val(),
                "contactSubject": $('#contactSubject').val(),
                "contactEmail": $('#contactEmail').val(),
                "contactMessage": $('#contactMessage').val()
            },
            dataType: 'json',
            encode: true,
            success: function (response) {
                if (response.success) {
                    $('.sent-message').show();
                    $('.sent-not-message').hide();
                    $('.loading-message').hide();
                } else {
                    $('.sent-message').hide();
                    $('.sent-not-message').show();
                    $('.loading-message').hide();
                }
            }
        });
    });

    $('#contactModal').on('hidden.bs.modal', function(event) {
        $('.sent-message').hide();
        $('.sent-not-message').hide();
        $('.loading-message').hide();
        $('#contactName').val('');
        $('#contactSubject').val('');
        $('#contactEmail').val('');
        $('#contactMessage').val('');
    });
});
