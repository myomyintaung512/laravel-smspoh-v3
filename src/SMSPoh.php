<?php

namespace myomyintaung512\LaravelSmspoh;

use GuzzleHttp\Client;
use myomyintaung512\LaravelSmspoh\Exceptions\SMSPohException;

class SMSPoh
{
    protected $apiKey;
    protected $senderId;
    protected $baseUrl;
    protected $client;

    public function __construct($apiKey, $senderId, $baseUrl)
    {
        $this->apiKey = $apiKey;
        $this->senderId = $senderId;
        $this->baseUrl = $baseUrl;
        $this->client = new Client();
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function send($to, $message)
    {
        try {
            $response = $this->client->post($this->baseUrl . '/send', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'sender' => $this->senderId,
                    'to' => $to,
                    'message' => $message,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new SMSPohException($e->getMessage(), $e->getCode());
        }
    }

    public function balance()
    {
        try {
            $response = $this->client->get($this->baseUrl . '/balance', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new SMSPohException($e->getMessage(), $e->getCode());
        }
    }

    public function verify($to, $message)
    {
        try {
            $response = $this->client->post($this->baseUrl . '/verify', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'sender' => $this->senderId,
                    'to' => $to,
                    'message' => $message,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new SMSPohException($e->getMessage(), $e->getCode());
        }
    }

    public function status($messageId)
    {
        try {
            $response = $this->client->get($this->baseUrl . '/status/' . $messageId, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                ],
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            throw new SMSPohException($e->getMessage(), $e->getCode());
        }
    }
}
