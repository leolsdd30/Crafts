# Component: Chat

## Idea & Main Objective
The `chat.php` component is the interactive messenger window.

## Purpose & Role
Can be embedded cleanly into the Dashboard to allow users to talk to each other.

## Required Code & Logic
- Expects a `$messages` array.
- Loops through and determines if the message was sent by `me` or `them` to apply right-aligned (blue) or left-aligned (gray) Tailwind bubble classes.
