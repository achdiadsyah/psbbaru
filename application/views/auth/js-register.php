<script>
        $(document).ready(function(){

            $('#jalur').change(function(){
                if($(this).val() == 'undangan'){
                    $('#kode_title').removeClass('d-none');
                    $('#kode_form').removeClass('d-none');

                    $("#kode_undangan").prop('required',true);

                    $('#akademi_title').removeClass('d-none');
                    $('#akademi_form').removeClass('d-none');
                } else  {
                    $('#kode_title').addClass('d-none');
                    $('#kode_form').addClass('d-none');

                    $("#kode_undangan").prop('required',false);

                    $('#akademi_title').addClass('d-none');
                    $('#akademi_form').addClass('d-none');
                }
            });

        });
</script>