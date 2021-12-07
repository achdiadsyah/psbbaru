
        <script>
        $(document).ready(function(){

            // Get Data
            $.ajax({
                type: "GET",
                url: '<?= base_url('biodata/ajax_get'); ?>',
                async : true,
                dataType : 'json',
                success: function (data) {
                    $.each( data, function( key, value ) {
                        var keys = "#"+key;
                        $(keys).html(value);
                    });
                }
            });

        });
        </script>