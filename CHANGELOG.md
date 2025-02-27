# Changelog

All notable changes to `laravel-smspoh-v3` will be documented in this file.

## [1.0.1] - 2024-01-20

### Added
- Enhanced phone number handling for international formats
- Improved error handling for API responses
- Added comprehensive input validation for phone numbers

### Fixed
- Fixed URL encoding for international phone numbers with '+' prefix
- Resolved authentication token generation issues
- Improved error message clarity for API exceptions

### Changed
- Updated documentation with international phone number format examples
- Optimized API response handling for better performance
- Enhanced error handling in SMSPohChannel

## [1.0.0] - 2024

### Added

- Initial release of Laravel SMSPoh V3 Integration package
- SMS sending functionality with proper error handling
- Laravel notification channel support
- Balance checking capability
- SMS status checking feature
- Verification SMS support
- Configuration file with environment variables support
- Comprehensive test suite with mock HTTP client
- Laravel Service Provider for easy integration
- Support for Laravel versions 8.x through 11.x
- Guzzle HTTP client integration for API communication
- SMSPohException class for proper error handling

### Requirements

- PHP ^7.3 or ^8.0
- Laravel ^8.0|^9.0|^10.0|^11.0
- Guzzle HTTP ^7.0

### Installation

```bash
composer require myomyintaung512/laravel-smspoh-v3
```

### Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --provider="myomyintaung512\LaravelSmspoh\SMSPohServiceProvider"
```

Add your SMSPoh credentials to your .env file:

```
SMSPOH_API_KEY=your_api_key
SMSPOH_API_SECRET=your_api_secret
SMSPOH_SENDER_ID=your_sender_id
SMSPOH_BASE_URL=https://v3.smspoh.com/api/rest
```
