
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('select#predio').change(function(){
            var idPredio = $(this).val();

            $.get('/pesq/get-alas/'+idPredio, function (alas){
                $('select#ala').empty();
                $.each(alas, function (key, value){
                    $('select#ala').append('<option value='+value.id+'>'+value.nome+'</option>');
                });
            });
        });
    </script>
    <script type="text/javascript">
        $('select#andar').click(function (){
            var idAla = $('select#ala').val();

            $.get('/pesq/get-andars/'+idAla, function (andars){
                $('select#andar').empty();
                $.each(andars, function (key, value){
                    $('select#andar').append('<option value='+value.id+'>'+value.nome+'</option>');
                });
            });
        });
    </script>
