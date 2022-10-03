<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-info">
                    <h3>Alba</h3>
                    <p>A Assembleia Legislativa do Estado da Bahia (ALBA) faz parte da organização política
                        administrativa do estado, conforme preconiza a Constituição Federal no seu título III,
                        capítulo I. A ALBA é composta por 63 deputados estaduais, eleitos pelo voto direto para
                        mandatos de quatro anos. Assim, representa a maioria do povo baiano. Nesta Casa são
                        decididos as principais resoluções que afetam de forma direta ou indireta a população
                        baiana. Por isso é fundamental a transparencia e a publicização de tudo que aqui se passa.
                    </p>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Links Úteis</h4>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Quem Somos</a></li>
                        <li><a href="#">Serviços</a></li>
                        @if(Auth::guest())
                            <li><a href="#">Cadastro</a></li>
                        @elseif(Auth::user())
                            <li><a href="#">Perfil</a></li>
                        @else
                            <li><a href="#">Perfil</a></li>
                        @endif
                        <li><a href="#">Termos de uso</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contato</h4>
                    <p>
                        Palácio Dep. Luis Eduardo Magalhães <br>
                        1ª Avenida, 130, CAB, <br>
                        CEP: 41.745-001, <br>
                        Salvador - Bahia. <br>
                        <strong>Telefone:</strong> +55 (71) 3015 7268<br>
                        <strong>Email:</strong> nucleodetransparencia@alba.ba.gov.br<br>
                    </p>

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <img src="{{asset('images/logo.png')}}" alt="" width="80%" class="img-fluid">
                </div>

                <!-- NEWSLETTER
                <div class="col-lg-3 col-md-6 footer-newsletter">
                     <h4>Assine nossa Newsletter</h4>
                     <p>Mantenha-se informado e atualizado com todos os eventos e ações da Associação dos Ex-alunos do
                     CMS. Inscreva-se para receber a nossa Newsletter em seu email. Eventos, confraternizações, promoções,
                      convênios e muito mais.</p>
                     <form action="" method="post">
                         <input type="email" name="email"><input type="submit" value="Inscreva-se">
                     </form>
                 </div>-->

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>ASCOM/ALBA</strong>. Todos os direitos reservados
        </div>
        <div class="credits">
            Designed by <a href="#">ASCOM</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('vendor/counterup/counterup.min.js')}}"></script>
<script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('vendor/aos/aos.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
    CKEDITOR.replace('wysiwyg-editor', {
        filebrowserUploadUrl: "#",
        filebrowserUploadMethod: 'form'
    });
</script>

<script type="text/javascript">
    $("#cpf").mask("000.000.000-00");
    $("#cnpj").mask("00.000.000/0000-00");
    $("#dtnasc").mask("00/00/0000");
    $("#tel_fixo").mask('(00) 0000-0000/9999-9999/9999-9999/9999-9999/9999-9999');
    $("#celular").mask('(00) 00000-0000');
    $("#tel_com").mask('(00) 0000-00009');
    $("#cep").mask('00.000-000');
</script>
<script>
    $(document).ready(function()
    {
        $("#price").maskMoney({
            prefix: "R$ ",
            decimal: ",",
            thousands: "."
        });
    });
</script>
<script type="text/javascript">
    function handleInput(e) {
        var ss = e.target.selectionStart;
        var se = e.target.selectionEnd;
        e.target.value = e.target.value.toUpperCase();
        e.target.selectionStart = ss;
        e.target.selectionEnd = se;
    }
</script>
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
