# View: Auth Register

## Idea & Main Objective
The `register.php` view handles incoming new users.

## Purpose & Role
It must cleanly separate the two intents: "I want to hire someone" vs "I want to work".

## Required Code & Logic
- A toggle (Alpine.js `x-show`) that changes the form fields based on whether the user selects "Homeowner" or "Craftsman".
- Craftsman flow must include file uploads for ID and License (multipart/form-data).
- Submits to `Signup.php` Auth Action.
