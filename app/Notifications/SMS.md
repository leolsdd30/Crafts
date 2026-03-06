# Notification: SMS

## Idea & Main Objective
The `SMS.php` class formats text messages before pushing them through `Twilio.php`.

## Purpose & Role
Keeps SMS messages succinct to save on character limits/costs while keeping users informed of critical updates.

## Required Code & Logic
- `notifyCraftsmanOfNewJob($craftsman_phone, $homeowner_name, $job_category)` method.
- `notifyHomeownerOfArrival($homeowner_phone, $craftsman_name)` method.
- Focuses on extremely short, actionable plain-text updates.
