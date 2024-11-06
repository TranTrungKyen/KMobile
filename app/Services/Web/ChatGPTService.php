<?php

namespace App\Services\Web;

use App\Services\Contracts\ChatGPTServiceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Class ChatGPTService.
 *
 * @package namespace App\Services\Web;
 */
class ChatGPTService implements ChatGPTServiceInterface
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getResponse($prompt)
    {
        $apiKey = env('OPENAI_API_KEY');
        $url = 'https://api.openai.com/v1/chat/completions';

        try {
            $response = $this->client->post($url, [
                'headers' => [
                    'Authorization' => "Bearer {$apiKey}",
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo', // Bạn có thể thay đổi model nếu cần
                    'messages' => [
                        ['role' => 'user', 'content' => $prompt],
                    ],
                    'max_tokens' => 150, // Số lượng token tối đa trong response
                ],
            ]);

            $data = json_decode($response->getBody(), true);
            return $data['choices'][0]['message']['content'] ?? 'No response from API.';
        } catch (RequestException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
