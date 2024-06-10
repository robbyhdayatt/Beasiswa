// script.js

// Add interactivity or animations if needed
document.addEventListener('DOMContentLoaded', () => {
    console.log('Document is ready.');

    // Example: Adding confirmation before delete
    document.querySelectorAll('form button[name="delete"]').forEach(button => {
        button.addEventListener('click', (event) => {
            if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                event.preventDefault();
            }
        });
    });
});
