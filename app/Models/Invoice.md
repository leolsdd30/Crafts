# Model: Invoice

## Idea & Main Objective
The `Invoice.php` model handles the generation and tracking of legal tax/receipt documents.

## Purpose & Role
Ensures professional compliance by giving homeowners proof of payment and craftsmen summaries of their earnings.

## Required Code & Logic
- Properties: `id`, `transaction_id`, `invoice_number`, `pdf_path`, `issued_at`.
- A method capable of aggregating data from `Booking` and `Transaction` to format into a PDF template.
