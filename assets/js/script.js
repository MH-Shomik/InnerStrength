$(document).ready(function () {
    // Sidebar toggle
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    // Initialize DataTables
    $('.data-table').DataTable({
        responsive: true
    });

    // Activate tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();
});