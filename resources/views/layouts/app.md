# Layout: App

## Idea & Main Objective
The `app.php` layout is the master HTML shell for the public and homeowner/craftsman pages.

## Purpose & Role
Prevents duplicating the `<head>`, `<nav>`, and `<footer>` across 30 different views.

## Required Code & Logic
- Standard HTML5 boilerplate.
- CDN links for Tailwind CSS and Alpine.js.
- A dynamic `yield('content')` style logic where child view files inject their specific code.
- PHP logic in the `<nav>` to show "Login" if `$_SESSION` is empty, or "Dashboard" if logged in.
