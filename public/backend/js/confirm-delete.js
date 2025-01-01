    function confirmDelete(event, link) {
        // Prevent the default action (redirect)
        event.preventDefault();

        // Show confirmation prompt
        if (confirm("Bạn có chắc là muốn xóa mục này không?")) {
            // If user confirms, proceed with the deletion by redirecting to the link's href
            window.location.href = link.href;
        }
    }
