# Notification: Push

## Idea & Main Objective
The `Push.php` class pushes real-time WebSocket events to the browser.

## Purpose & Role
Makes the messaging UI and dashboard feel "alive" without requiring the user to refresh the page.

## Required Code & Logic
- Integrates with a service like Pusher or an open-source alternative (Laravel WebSockets equivalent).
- `broadcastNewMessage($message_data, $channel_id)` method.
- `broadcastStatusChange($booking_id, $new_status)` method to instantly update the UI.
