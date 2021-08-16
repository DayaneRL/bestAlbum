
$("#formArtista").validate(
    {
        errorElement:"span",
        submitHandler: function(form){
            form.submit();
        },
        rules:{
            "artista[nome]":{
                required:true,
                minlength:5
            },
            "artista[dt_nascimento]": {
                required: true,
                minlength: 10,
            },
            "artista[genero]": {
                required: true,
            },
            // url: {
            //     required: true,
            //     minlength: 5,
            //     maxlength: 100
            // }
        },
        messages:{
            "artista[nome]":{
                required:"Esse campo não pode ser vazio",
                minlength:"Obrigatório pelo menos 5 caracteres"
            },
            "artista[dt_nascimento]": {
                required:"Esse campo não pode ser vazio",
                minlength: "Obrigatório pelo menos 10 caracteres"
            },
            "artista[genero]": {
                required: "Esse campo não pode ser vazio",
            },
            // url: {
            //     required: "Esse campo não pode ser vazio",
            //     minlength:"Obrigatório pelo menos 5 caracteres",
            //     maxlength: "Apenas até 100 caracteres"
            // }
        }

    }
)

$("#formAlbum").validate(
    {
        errorElement:"span",
        submitHandler: function(form){
            form.submit();
        },
        rules:{
            "album[nome]":{
                required:true,
                minlength:5
            },
            
            "album[artista_id]": {
                required: true,
            },
            
        },
        messages:{
            "album[nome]":{
                required:"Esse campo não pode ser vazio",
                minlength:"Obrigatório pelo menos 5 caracteres"
            },
            "album[artista_id]": {
                required: "Esse campo não pode ser vazio",
            },
        }

    }
)