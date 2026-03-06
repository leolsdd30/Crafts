# Service: Twilio (Mock)

## Idea & Main Objective
The `Twilio.php` class mocks SMS integrations for the university project.

## Purpose & Role
Provides the interface to simulate a "Real World" feeling of immediate SMS alerts for professionals and homeowners, without incurring actual SMS fees.

## Required Code & Logic
- Instead of initializing a real Twilio client with `$_ENV['TWILIO_SID']`, it will just intercept the messages.
- `sendSMS($to_phone_number, $message_body)` method will immediately return true.
- Under the hood, this method writes the `$message_body` to a local file (e.g., `storage/logs/sms.log`) or a custom debugging screen so that professors can verify the "sent" text.
