# Root: package.json

## Idea & Main Objective
The `package.json` file is the NodeJS dependency manager used strictly for the frontend assets in this PHP project.

## Purpose & Role
Downloads and manages Tailwind CSS for the design system.

## Required Code & Logic
- Requires `tailwindcss`.
- Defines scripts: `"dev": "npx tailwindcss -i ./resources/css/app.css -o ./public/assets/css/main.css --watch"`.
- Similar scripts for minification during production builds.
