# View: Public Search Marketplace

## Idea & Main Objective
The `search.php` view is the heavy-lifting UI where homeowners browse craftsmen.

## Purpose & Role
Displays the output of `SearchCraftsmen.php` action and provides controls to refine those results.

## Required Code & Logic
- Alpine.js bound input filters (e.g., `x-model="searchCategory"`, `x-model="maxDistance"`).
- A grid outputting the `craftsman-card` component for each matched worker.
- (Optional but recommended) A map view toggle powered by Google Maps API or Leaflet.
