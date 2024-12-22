# LaraToasts - Elegant Toast Notifications for Laravel

A simple, lightweight package for displaying toast notifications in your Laravel applications with zero dependencies.

## Features

- 🚀 Zero dependencies
- 🎨 Clean and modern design
- 🔧 Easy to integrate
- 📱 Fully responsive
- ⚡ Lightweight
- 🎯 Three notification types: success, info, and danger

## Installation

Install the package via composer:

```bash
composer require prajwal89/lara-toasts
```

## Usage

### 1. Include Required Assets

Add these Blade directives in your layout file (typically in `layouts/app.blade.php`):

```php
<!DOCTYPE html>
<html>
<head>
    @laraToastCSS
</head>
<body>
    @include('lara-toasts::toast')

    <!-- Your content -->
    
    @laraToastJs
</body>
</html>
```

### 2. Show Notifications

You can trigger toasts using the following methods:

```php
// Success notification
laraToast()->success('Success!', 'Operation completed successfully');

// Info notification
laraToast()->info('Info', 'Here is some information');

// Danger notification
laraToast()->danger('Error!', 'Something went wrong');

```

### Method Parameters

All notification methods accept the following parameters:

```php
laraToast()->success(
    string $title,                    // Required: Toast title
    string $description = null,       // Optional: Toast description
    int $autoCloseInMs = 5000        // Optional: Auto-close duration (default: 5000ms)
);
```

## Examples

```php
// Basic usage
laraToast()->success('Success!', 'Your changes have been saved.');

// With custom duration
laraToast()->info('Processing', 'Please wait while we process your request.', 3000);

// Error notification
laraToast()->danger('Error!', 'Unable to connect to the server.');

// Persistent Notification
laraToast()->danger('Error!', 'Persistent Message')->persistent();
```

## License

This package is open-sourced software licensed under the MIT license.
