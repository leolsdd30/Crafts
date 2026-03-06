# Action: SearchCraftsmen

## Idea & Main Objective
The `SearchCraftsmen.php` action acts as the platform's core matching engine. 

## Purpose & Role
Provides a neat interface to find workers based on multiple dynamic criteria (category, location, price, rating) without cluttering the search view with complex SQL.

## Required Code & Logic
- An `execute(array $filters)` method.
- Logic to assemble a dynamic SQL query using PDO based on provided `$filters` array.
- Geospatial calculation: If `$filters['lat']` and `$filters['lng']` are provided, it must append a Haversine formula to the SQL statement to sort by distance.
- Pagination logic to ensure the UI doesn't crash if there are thousands of plumbers.
