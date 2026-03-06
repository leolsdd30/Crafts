# View: Craftsman Profile Editor

## Idea & Main Objective
The `profile.php` view allows the worker to manage how they appear to the public.

## Purpose & Role
Crucial for marketing themselves. They can update their hourly rate, service category, bio, and upload portfolio images.

## Required Code & Logic
- A multipart/form-data form for uploading new images (handled by `ProcessUploads` action).
- Inputs for `hourly_rate`, `service_category`, and custom JSON tagging for specific skills.
- A "Preview" button to see their public `/profile.php` page.
