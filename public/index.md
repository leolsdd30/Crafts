# Public: index

## Idea & Main Objective
The `index.php` file inside `/public` is the solitary point where all web traffic enters the application.

## Purpose & Role
Acts as the "Front Controller". It receives the URL, spins up the `.php` logic, and fires back the HTML view.

## Required Code & Logic
- Requires `/bootstrap/app.php`.
- Evaluates `$_SERVER['REQUEST_URI']` to determine which controller/page to load (basic routing).
- Displays 404 views if a route does not match.
- This is the *only* PHP file exposed directly to web browser requests.
