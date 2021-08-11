@extends('template.app')

@section('breadcrumb')
<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Início</li>
@endsection 

@section('nav-home')
active
@endsection 

@section('title')
Home
@endsection

@section('content')

    <div class="container">

        <div class="card">
            <div class="card-header text-center">
                <h3>Melhores Albuns</h3>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-12 col-md-2">
                        <img class="img-cover" src="../assets/img/team-3.jpg" alt="artist-cover"/>
                    </div>
                    <div class="col-12 col-sm-10">
                        <h4>Nome Album</h4>
                        <p>
                            <a class="btn-star" id="star-1"><i class="far fa-star"></i></a>
                            <a class="btn-star" id="star-2"><i class="far fa-star"></i></a>
                            <a class="btn-star" id="star-3"><i class="far fa-star"></i></a>
                            <a class="btn-star" id="star-4"><i class="far fa-star"></i></a>
                            <a class="btn-star" id="star-5"><i class="far fa-star"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="card">
            <div class="card-header text-center">
                <h3>Melhores Artistas</h3>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-12 col-md-2">
                        <img class="img-cover" src="../assets/img/team-4.jpg" alt="artist-cover"/>
                    </div>
                    <div class="col-12 col-sm-10">
                        <h4>Nome Artista</h4>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-md-2">
                        <img class="img-cover" src="../assets/img/team-4.jpg" alt="artist-cover"/>
                    </div>
                    <div class="col-12 col-sm-10">
                        <h4>Nome Artista</h4>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12 col-md-2">
                        <img class="img-cover" src="../assets/img/team-4.jpg" alt="artist-cover"/>
                    </div>
                    <div class="col-12 col-sm-10">
                        <h4>Nome Artista</h4>
                        <p>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </p>
                    </div>
                </div>
            </div>
        </div>  
        
    </div>

@endsection

@section('script')
<script>
    // $('.btn-star')
    // .hover(
    //     function() {
    //     }, function() {
    //     }
    //  );
    $('.btn-star').click(function(){
    this_id = $(this).attr('id');
    clicked = this;
    $(this).parents('p').find('a').each(function(){
        if($(this).attr('id') <= this_id){
            $(this).find('i').attr('class', 'fas fa-star');
        }else if($(this).attr('id') > this_id){    
            $(this).find('i').attr('class', 'far fa-star');
        }
    })
})
    
</script>
@endsection