<?php

namespace myomyintaung512\LaravelSmspoh\Tests;

use myomyintaung512\LaravelSmspoh\SMSPoh;
use Orchestra\Testbench\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class SMSPohTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return ['Myomyintaung\LaravelSmspoh\SMSPohServiceProvider'];
    }

    public function testSendSMS()
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode(['status' => 'success'])),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $smspoh = new SMSPoh('test-key', 'test-sender', 'https://smspoh.com/api/v3');
        $smspoh->setClient($client);

        $response = $smspoh->send('1234567890', 'Test message');
        
        $this->assertEquals(['status' => 'success'], $response);
    }
}