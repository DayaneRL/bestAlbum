$(document).ready(function(){
    let nota_album = $('.nota_album');
    if(nota_album){
        $(nota_album).each(function(){
            let button = $(this).parents(".row").find("#star-"+$(this).val());
            fixaNota(button, "star-"+$(this).val())
        })
    }
    let nota_artista = $('.nota_artista');
    if(nota_artista){
        $(nota_artista).each(function(){
            let button = $(this).parents(".row").find("#star-"+$(this).val());
            fixaNota(button, "star-"+$(this).val())
        })
    }

    if($(document).find('.media')){
        $('.media').each(function(){
            let nota_media = Number.parseInt($(this).val());
            if(nota_media){
                let media_id = "media_"+nota_media; 

                $(this).parents('p').find('i').each(function(){
                    if($(this).attr('id') <= media_id){
                        $(this).attr('class', 'fas fa-star');
                    }else if($(this).attr('id') > media_id){    
                        $(this).attr('class', 'far fa-star');
                    }
                })
            }
        })
    }
})

$('.btn-star').on("click",async function(){
    let this_id = $(this).attr('id');
    let clicked = this;

    let classe_id = this_id.split('-');
    let nota = classe_id[1];
    let id = $("#user_id").val();
    let album = $(this).parents(".row").find(".album_id").val();
    let artista = $(this).parents(".row").find(".artista_id").val();
    let token =  document.getElementsByName("_token")[0].value;

    // console.log(id, token, nota, album, artista);
    if( id && token && nota && (album || artista)){
        await fixaNota(clicked, this_id);
        const mudanca = realizarMudanca();
        if(album){
            var resultado = await mudanca.enviaNotaAlbum(id, token, nota,album);
            if($(this).parents(".row").hasClass('album-show')){
                $('.album-show').find('.col-md-1').remove();
                $('.album-show').append('<div class="col-12 col-md-1"><input type="hidden" class="nota_album_id" value="'+resultado.nota_id+'"><p><a class="btn-delete" id=""><i class="fas fa-trash"></i></a> </p></div>');
            }
        }
        if(artista){
            var resultado = await mudanca.enviaNotaArtista(id, token, nota, artista);
            if($(this).parents(".row").hasClass('artista-show')){
                $('.artista-show').find('.col-md-1').remove();
                $('.artista-show').append('<div class="col-12 col-md-1"><input type="hidden" class="nota_artista_id" value="'+resultado.nota_id+'"><p><a class="btn-delete" id=""><i class="fas fa-trash"></i></a> </p></div>');
            }
        }
        if(resultado){
            if(resultado.status==1){ 
                console.log(resultado.mensagem)
                
            }else{
                console.log('ERRO: '+ resultado.status)
                console.log(resultado.mensagem)
            }
        }else{
            $.confirm({
                title: 'Atenção!',
                content: 'Algo deu errado',
                buttons: {
                    confirmar: function () {
                        retiraNota(clicked);
                    }
                }
            });
        }
    }else{
        let promisse = await fixaNota(clicked, this_id);
        setTimeout(function(){ 
            $.confirm({
                title: 'Atenção!',
                content: 'Você precisar estar logado',
                buttons: {
                    confirmar: function () {
                        retiraNota(clicked);
                    }
                }
            });
        }, 1000);
        
    }
})

function fixaNota(element, this_id){
    return new Promise((resolve, reject) => {
        $(element).parents('p').find('a').each(function(){
            if($(this).attr('id') <= this_id){
                $(this).find('i').attr('class', 'fas fa-star');
            }else if($(this).attr('id') > this_id){    
                $(this).find('i').attr('class', 'far fa-star');
            }
        })
        
        resolve({status:"ok"});
    })
}

function retiraNota(element){
    $(element).parents('p').find('a').each(function(){
        $(this).find('i').attr('class', 'far fa-star');        
    })
}

function realizarMudanca() {
    return { 
        enviaNotaAlbum(id, token, nota, album){
            return new Promise((resolve, reject) => {
                $.ajax({
                    type: 'POST',
                    url: window.location.origin +'/nota-album/'+id+'-'+nota+'-'+album,
                    data: {
                        "_token": token,
                        "id": id
                    },
                    success: function(response){
                        resolve(response)
                    }
                })
            })
        } ,
        enviaNotaArtista(id, token, nota, artista){
            return new Promise((resolve, reject) => {
                $.ajax({
                    type: 'POST',
                    url: window.location.origin +'/nota-artista/'+id+'-'+nota+'-'+artista,
                    data: {
                        "_token": token,
                        "id": id
                    },
                    success: function(response){
                        resolve(response)
                    }
                })
            })
        },
        destroyNotaArtista( token, nota_artista_id){
            return new Promise((resolve, reject) => {
                $.ajax({
                    type: 'DELETE',
                    url: window.location.origin +'/delete-nota-artista/'+nota_artista_id,
                    data: {
                        "_token": token
                    },
                    success: function(response){
                        resolve(response);
                    }
                })
            })
        } ,
        destroyNotaAlbum( token, nota_album_id){
            return new Promise((resolve, reject) => {
                $.ajax({
                    type: 'DELETE',
                    url: window.location.origin +'/delete-nota-album/'+nota_album_id,
                    data: {
                        "_token": token
                    },
                    success: function(response){
                        resolve(response)
                    }
                })
            })
        } ,
    }
}

$(document).on('click', '.btn-delete',function(event, element){
    let clicked = this;
    $.confirm({
        title: 'Atenção!',
        content: 'Tem certeza que deseja deletar essa nota?',
        buttons: {
            confirmar: async function () {
                let nota_artista_id = $(clicked).parents('.row').find('.nota_artista_id').val();
                let nota_album_id = $(clicked).parents('.row').find('.nota_album_id').val();
                let token =  document.getElementsByName("_token")[0].value;
                const mudanca = realizarMudanca();
                // console.log(nota_artista_id,nota_album_id, token);
                if((nota_artista_id || nota_album_id) && token){
                    if(nota_artista_id){
                        console.log(nota_artista_id)
                        var resultado = await mudanca.destroyNotaArtista( token, nota_artista_id);
                    }
                    if(nota_album_id){
                        console.log(nota_album_id)
                        var resultado = await mudanca.destroyNotaAlbum( token, nota_album_id);
                    }
                    if(resultado){
                        if(resultado.status==1){
                            console.log(resultado.mensagem)
                            retiraNota($(clicked).parents('.row').find('a.btn-star'));
                            setTimeout(function(){
                                $(clicked).fadeTo(2000, 500).slideUp(500);
                            }, 500);
                            $(clicked).parents('div.col-10').remove();
                        }else{
                            console.log('ERRO: '+ resultado.status);
                            console.log(resultado.mensagem);
                        }
                    }
                }
            },
            cancelar: function () {
                //$.alert('Ação cancelada!');
            }
        }
    });
})