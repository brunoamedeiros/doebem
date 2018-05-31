$(document).ready(function(){
    embedYoutube();

    $('[data-toggle="tooltip"]').tooltip();

    // Formulário de Cadastro de Instituição
    $('.cnpj').mask('00.000.000/0000-00');
    $('.cep').mask('00000-000');
    $('.fone').mask('(00) 0000-00009');
    $('.cpf').mask('000.000.000-00');
    $('.real').mask('000.000.000.000.000.00', {reverse: true});
    $('.data').mask('00/00/0000', {reverse: true});

    // Adicionar redes sociais na instituição
    $('.add-socials').on('click', function (e) {
        e.preventDefault();

        if($('.select-redes-sociais').length < 4) {

            $('.select-redes-sociais:last-of-type').clone().appendTo('.redes-sociais');
            $('.select-redes-sociais:last-of-type input').val('');

            if(!$('.select-redes-sociais:last-of-type').has('.remove-socials').length){
                $('.select-redes-sociais:last-of-type').append(
                    '<button type="button" class="btn oi oi-plus col-sm-0.2 form-group col-lg-1 remove-socials">\n' +
                    '<i class="material-icons">remove</i>\n' +
                    '</button>'
                );
            }
        } else {
            $(this).addClass("disabled");
        }
    });

    // Converter links do youtube em iframes
    function embedYoutube() {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/,
            element = $('div[data-youtube]');

        element.each(function () {
            var url = $(this).data('youtube'),
                match = url.match(regExp);

            if (match && match[2].length == 11) {
                var iframeMarkup = '<iframe width="100%" height="315" src="http://www.youtube.com/embed/'
                    + match[2] + '" frameborder="0" allowfullscreen></iframe>';

                $(this).append(iframeMarkup);
            }
        })
    }

    // Scroll para as seções
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));

        if( target.length ) {
            event.preventDefault();

            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1000);
        }
    });

    // Remover redes sociais na instituição
    $('body').on('click', '.remove-socials', function (e) {
        e.preventDefault();
        $(this).parent().remove();

        if($('.select-redes-sociais').length <= 4) {
            $('.add-socials').removeClass("disabled");
        }
    });

    $('.btn-add-item').on('click', function(e) {
        var $clone = $('.form-item').clone();

        console.log('teste');
    });

    // Adicionar valores no campo valor no momento da contribuição
    $('.sugestao-pagamento button').on('click', function () {
        var valor = $(this).data('valor');
        $('.real').val(valor);
    });
});

// Validação dos formulários
// (function() {
//     'use strict';
//     window.addEventListener('load', function() {
//         // Fetch all the forms we want to apply custom Bootstrap validation styles to
//         var forms = document.getElementsByClassName('needs-validation');
//         // Loop over them and prevent submission
//         var validation = Array.prototype.filter.call(forms, function(form) {
//             form.addEventListener('submit', function(event) {
//                 event.preventDefault();
//
//                 if (form.checkValidity() === false) {
//                     event.preventDefault();
//                     event.stopPropagation();
//                 }
//                 form.classList.add('was-validated');
//             }, false);
//         });
//     }, false);
// })();