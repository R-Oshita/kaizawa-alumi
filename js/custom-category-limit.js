jQuery(document).ready(function($) {
    $('#categorychecklist input[type="checkbox"]').on('change', function() {
        if ($(this).is(':checked')) {
            $('#categorychecklist input[type="checkbox"]').not(this).prop('checked', false);
        }
    });
});
