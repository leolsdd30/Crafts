# Action: ProcessUploads

## Idea & Main Objective
The `ProcessUploads.php` action scales, crops, and saves user-uploaded images.

## Purpose & Role
To prevent users from uploading massive 10MB phone pictures that would slow down the platform. Optimizes storage space and load times.

## Required Code & Logic
- `execute($file, $destination_folder, $max_width = 800)`
- PHP GD or Imagick logic to resize the image while maintaining aspect ratio.
- Security checks: verifying MIME type is strictly `image/jpeg`, `image/png`, or `image/webp`.
- Moving the secure file to the permanent `/public/uploads` or `/storage/app/private` directory.
