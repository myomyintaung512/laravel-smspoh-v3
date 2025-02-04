# Laravel SMSPoh V3 Integration

This package provides an easy way to integrate SMSPoh SMS services into your Laravel application.

## Installation

```bash
composer require myomyintaung512/laravel-smspoh-v3
```

Publish the configuration file:

```bash
php artisan vendor:publish --provider="myomyintaung512\LaravelSmspoh\SMSPohServiceProvider"
```

## Configuration

Add the following variables to your .env file:

```env
SMSPOH_API_KEY=your_api_key
SMSPOH_API_SECRET=your_api_secret
SMSPOH_SENDER_ID=your_sender_id
SMSPOH_BASE_URL=https://v3.smspoh.com/api/rest
```

## Usage

### Basic Usage

```php
use myomyintaung512\LaravelSmspoh\Facades\SMSPoh;

// Send SMS
app()->smspoh->send('1234567890', 'Your message here');

// Check balance
$balance = app()->smspoh->balance();

// Send verification SMS
app()->smspoh->verify('1234567890', 'Your verification code is: 123456');

// Check message status
app()->smspoh->status('message_id');
```

### Using Laravel Notifications

```php
use Illuminate\Notifications\Notification;
use myomyintaung512\LaravelSmspoh\SMSPohChannel;

class VerificationNotification extends Notification
{
    public function via($notifiable)
    {
        return [SMSPohChannel::class];
    }

    public function toSMSPoh($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => 'Your verification code is: ' . $this->code
        ];
    }
}
```

## License

This package is open-sourced software licensed under the MIT license.
