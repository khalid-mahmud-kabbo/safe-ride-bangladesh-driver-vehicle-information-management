(function ($) {
    "use strict";
    $(document).ready(function () {
        $('#detailsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: $('#table-url').data("url"),
            columns: [
                {
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                { 
                    data: 'photo', 
                    name: 'photo' 
                },
                { 
                    data: 'name', 
                    name: 'name' 
                },
                { 
                    data: 'phone_number', 
                    name: 'phone_number' 
                },
                { 
                    data: 'license_number', 
                    name: 'license_number' 
                },
                { 
                    data: 'registration_number', 
                    name: 'registration_number' 
                },
                { 
                    data: 'nid_number', 
                    name: 'nid_number' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });
    });
})(jQuery)
