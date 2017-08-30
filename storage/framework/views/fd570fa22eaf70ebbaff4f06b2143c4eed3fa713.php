<script>
    $(document).ready(function () {
        $('#aceptar').click(function () {
            $.ajax({
                url: '<?php echo e(route($routeView)); ?>',
                type: "POST",
                data: {'_token': $('input[name=_token]').val(), 'tipo': 1},
                success: function (data) {
                    $('#myModal').html(data);
                    $('#myModal').modal({
                        show: true,
                        backdrop: 'static',
                        keyboard: false
                    });
                }
            });
        });

    });

    function enviar(variable) {

        var token = $('input[name=_token]').val();
        dataId = $('input:radio[name="id"]:checked').val();
        var ruta;

        if($("input[name='id']:radio").is(':checked')) {
            ruta = '<?php echo e(route($routeView)); ?>';

            $.post(ruta,{'_token': token, 'tipo' : variable, 'id' : dataId},function(data) {
                $('#myModal').html(data);
                $('#myModal').modal({
                    show: true,
                    backdrop: 'static',
                    keyboard: false
                });
            });
        }
        else
        {
            $('#form').attr('action', "<?php echo e(route($msnError)); ?>");
            $('#form').submit();
        }
    }
</script>