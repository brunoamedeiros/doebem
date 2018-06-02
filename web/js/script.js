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

function initMap() {
    var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 15,
        center: {lat: -34.397, lng: 150.644}
    });

    var geocoder = new google.maps.Geocoder();

    geocodeAddress(geocoder, map);
}

function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('endereco').value;

    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);

            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        }
    });
};

qtdIten = 0;
lista_itens_del = []

$(document).ready(function(){
    $('#btn-add-item').on('click', function(){
        var item = [],
            formItens = $('#form-iten'),
            campos = $('#form-iten input'),
            itemHtml;

        if(campos[0].value == "" || campos[1].value == "" || campos[2].value == ""){
            $('.alert-danger').html('Todos os campos são necessários').show();
        }else {
            if(campos[0].value != "" && campos[1].value != "" && campos[2].value != "") {
                item['descricao'] = campos[0].value;
                item['qtd'] = campos[1].value;
                item['valor'] = campos[2].value;
                item['id'] = qtdIten;
        
                itemHtml = retornaComponenteitem(item);
        
                criaInputsHiden(item);
                qtdIten++;
    
                $('#lista-itens').append(itemHtml);
        
                $('.remover-item').on('click', function(){
                    $(this).parent().parent().remove();
                });
        
                for(var i = 0; i < campos.length; i++) {
                    campos[i].value = "";
                };

                $('.alert-danger').hide();
            };
        };
    });

    $('.btn-cadastrar-item').on('click', function(e){
        if($('.btn-excluir').length){
            var campos = $('#form-iten input');

            if(campos[0].value == "" || campos[1].value == "" || campos[2].value == ""){
                $('.alert-danger').html('Todos os campos são necessários').show();
                e.preventDefault();  
            };         
        }else{
            if(!$('.lista-itens').length) {
                $('.alert-danger').html('É necessário ter pelo menos um item em seu projeto').show();
                e.preventDefault();
            };
        };
    });

    $('.btn-excluir').on('click', function(){
        var el = $(this),
            id_item = el.data('id-item');

        $('.btn-excluir-confirma').data('id-item', id_item);
    });

    $('.btn-excluir-confirma').on('click', function(){
       var id_item = $(this).data('id-item');

       if($.inArray(id_item, lista_itens_del) == -1 && $('.form-itens').length > 1){
            lista_itens_del.push(id_item);

            $("#lista-itens-del").append(
                "<input type='hidden' name='deletar[] = ['" + id_item + "'] value='" + id_item + "'/>"
            ); 
            
            $("#item-del-" + id_item).parent().parent().remove();
            $("#list-id-item-" + id_item).remove();
        }else{
            $('.alert-danger').html('Não é possível excluir este item pois é necessário ter pelo menos um item em seu projeto').show();
        };
    })
});

function criaInputsHiden(item) {
    var listaitens = $('#lista-itens'),
        descricao,
        qtd,
        valor;

    descricao =
    '<input type="hidden" id="item-' + qtdIten + '-descricao" class="" name="Item[' + qtdIten + '][descricao]" value="' + item['descricao'] + '">';

    qtd = 
    '<input type="hidden" id="item-' + qtdIten + '-quantidade" class="form-control" name="Item[' + qtdIten + '][quantidade]" value="' + item['qtd'] + '">';

    valor = 
    '<input type="hidden" id="item-' + qtdIten + '-quantidade" class="form-control" name="Item[' + qtdIten + '][valor]" value="' + item['valor'] + '">';

    listaitens.append(descricao);
    listaitens.append(qtd);
    listaitens.append(valor);
}

function retornaComponenteitem(item) {
    return elItem = 
        '<div class="lista-itens list-group-item list-group-item-action flex-column align-items-start">'+
            '<div class="d-flex w-100 justify-content-between">'+
                '<h5 class="mb-1">' +
                    item['qtd'] + ' ' + item['descricao'] +
                '</h5>'+
                '<button type="button" class="close remover-item">'+
                    '<span aria-hidden="true">×</span>'+
                '</button>'+
            '</div>'+
            '<p class="mb-1">'+
                'R$ ' + item['valor'] +
            '</p>'+
        '</div>';
}

function editaItem() {
    var btn = $(".js-btn-edit");

    btn.on('click', function(){
        console.log($(this));
    });
}