$(document).ready(function() {
    $.ajax({
        url: '{{ route('send.naam') }}',
        type: 'GET',
        success: function(response) {
            // Verwerk de response, bijvoorbeeld door de variabele in een element te plaatsen
            $('#resultaat').text(response.naam);
        }
    });
});
