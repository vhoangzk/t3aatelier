<!-- jQuery UI -->
<script src="{{ asset('admin/vendors/jquery-ui/jquery-ui-git.js') }}"></script>
<script>
    $(document).ready(function() {
        let notify_option = {
            position: 'bottom right'
        };
        if (typeof AjaxSortingURL == 'undefined') {
            $.notify("{{ ucwords(lang('you must set variable (AjaxSortingURL)', $translation)) }}", { position: 'bottom right', className: 'warn' });
        }

        $('.sorted_table').sortable({
            axis: 'y',
            update: function (event, ui) {
                var data_list = $(this).sortable('serialize');
                $.ajax({
                    type: 'POST',
                    url: AjaxSortingURL,
                    data: {
                        _token: '{{ csrf_token() }}',
                        rows: data_list,
                    },
                    success: function(data){
                        $.notify("{{ ucwords(lang('moved', $translation)) }}", { position: 'bottom right', className: 'success' });
                    },
                    error: function (data, textStatus, errorThrown) {
                        $.notify("{{ ucwords(lang('moving failed', $translation)) }}", { position: 'bottom right', className: 'error' });
                    }
                });
            }
        });
    });
</script>
