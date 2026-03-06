# View: Homeowner Messages

## Idea & Main Objective
The `messages.php` view is the chat interface where Homeowners talk to their hired Craftsmen.

## Purpose & Role
Keeps communication native to the platform, ensuring privacy and providing a paper trail if a Dispute arises.

## Required Code & Logic
- A two-pane layout (conversations list on the left, active chat on the right).
- Alpine.js and WebSockets polling to append new `Message` bubbles in real-time.
- Input box with an AJAX POST handler to submit new messages without refreshing the page.
