<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with GPT</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Chat with GPT</h1>
    <form id="chatForm" action="{{ route('chat.chat') }}" method="POST">
        @csrf
        <textarea name="message" id="message" rows="4" cols="50" placeholder="Type your message here..."></textarea>
        <button type="submit">Send</button>
    </form>
    <div id="response"></div>

    <script>
        $('#chatForm').on('submit', function(e) {
            e.preventDefault();

            let action = $(this).attr('action');
            let method = $(this).attr('method');
            let dataForm = $(this).serialize();

            $.ajax({
                url: action,
                method: method,
                data: dataForm,
                success: function(data) {
                    $('#response').text(data.response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#response').text('Error: ' + errorThrown);
                }
            });
        });
    </script>
</body>
</html>
