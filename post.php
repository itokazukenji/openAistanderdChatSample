<?php
if (
    $_POST['text'] === '' ||
    $_POST['text'] === null
) {
    exit;
}

require_once 'config.php';

require __DIR__ . '/vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;

$open_ai = new OpenAi(OPEN_AI_KEY);

$complete = $open_ai->completion([
    'model' => 'text-davinci-003',
    'prompt' => $_POST['text'],
    "temperature" => 0.9,
    "max_tokens" => 150,
    "top_p" => 1,
    "frequency_penalty" => 0.0,
    "presence_penalty" => 0.6,
    "stop" => [" Human:", " AI:"]
]);

$response_text = json_decode($complete);

echo $response_text->choices[0]->text;