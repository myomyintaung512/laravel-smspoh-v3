<?php

namespace myomyintaung512\LaravelSmspoh\Exceptions;

class SMSPohException extends \Exception
{
    const ERROR_INVALID_API_KEY = 1001;
    const ERROR_INVALID_SENDER_ID = 1002;
    const ERROR_INVALID_RECIPIENT = 1003;
    const ERROR_INVALID_MESSAGE = 1004;
    const ERROR_INSUFFICIENT_BALANCE = 1005;
    const ERROR_API_CONNECTION = 1006;
    const ERROR_INVALID_RESPONSE = 1007;

    protected $errorData;

    public function __construct($message = "", $code = 0, $errorData = [], \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errorData = $errorData;
    }

    public function getErrorData()
    {
        return $this->errorData;
    }

    public static function invalidApiKey($message = "Invalid API key provided")
    {
        return new static($message, self::ERROR_INVALID_API_KEY);
    }

    public static function invalidSenderId($message = "Invalid sender ID provided")
    {
        return new static($message, self::ERROR_INVALID_SENDER_ID);
    }

    public static function invalidRecipient($message = "Invalid recipient number provided")
    {
        return new static($message, self::ERROR_INVALID_RECIPIENT);
    }

    public static function invalidMessage($message = "Invalid message content")
    {
        return new static($message, self::ERROR_INVALID_MESSAGE);
    }

    public static function insufficientBalance($message = "Insufficient balance to send message")
    {
        return new static($message, self::ERROR_INSUFFICIENT_BALANCE);
    }

    public static function apiConnectionError($message = "Failed to connect to SMSPoh API")
    {
        return new static($message, self::ERROR_API_CONNECTION);
    }

    public static function invalidResponse($message = "Invalid response from SMSPoh API", $responseData = [])
    {
        return new static($message, self::ERROR_INVALID_RESPONSE, $responseData);
    }
}
