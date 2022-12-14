<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style>
body {
    width: 300px;
    margin: 0 auto;
    background: #f9b8b8;
}

textarea {
    box-sizing: border-box;
    width: 100%;
    height: 100px;
    margin-bottom: 10px;
    padding: 10px;
    font-size: 16px;
    border-radius: 10px;
}

h3 {
    text-align: center;
    color: #5b1a18;
}

.submit-button {
    text-align: right;
}


.response {
}

.post-text-box {
    display: flex;
    justify-content: end;
    max-width: 250px;
    margin: 10px 0 10px 50px;
}

.post-text-box div {
    display: inline-block;
    padding: 10px;
    background-color: #fcdbb3;
    border-radius: 10px;
}

.response-text-box {
    max-width: 250px;
    margin: 10px 50px 10px 0;
}

.response-text-box div {
    display: inline-block;
    padding: 10px;
    background-color: #f7f7f7;
    border-radius: 10px;
}


</style>
</head>
<body>
    <h3>OpenAi API Test</h3>
    <div>
        <textarea name="" id="text" cols="30" rows="5" placeholder="AIとチャットしてみよう"></textarea>
    </div>
    <div class="submit-button">
        <button id="submit">送信</button>
    </div>

    <div class="response"></div>
<script>
$('#submit').on('click', function() {
    $('.response').prepend('<div class="post-text-box"><div>' + $('#text').val() + '</div></div>');

    $.ajax({
        url: 'post.php',
        type: 'POST',
        dataType: 'text',
        data: {
            'text': $('#text').val(),
        },
        success: function(data) {
            console.log(data);

            $('.response').prepend('<div class="response-text-box"><div>' + data + '</div></div>');

        },
        error: function(data) {
            console.log('エラー');
        }
    });

    $('#text').val('');
});

</script>
</body>
</html>