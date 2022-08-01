@extends ('layouts.master')

@section ('content')
   <div class="row my-4">
        <div class="col-md-4">
            <div class="card.bg-light border border-primary">
              <h3 class="card-header">
                   Recherche
             </h3>

             <div class="card-body">
                <form action="{{route('voitures.index')}}" method="post">
                   @csrf
                    <div class="form-group">
                        <label for="search">Recherche </label>
                        <input type="text" class="form-control" name="search" id="" placeholder="Recherche..." aria-describedby="helpId">  
                      </div> 

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Valider</button>
                       </div>
                       </form> 
</div>
</div>
</div>
<div class="col-md-8">
  <div class="card border border-primary">
    <h3 class="card-header">{{$voiture->marque}} </h3>
    <div class="card-img-top">
        <img src="{{$voiture->image}}" class="img-fluid rounded m-2" alt="">
    </div>
    <div class="card-body">

             
               <p class="d-flex flex-row justify-content-start">
                <span class="badge badge-danger mx-3"> Nombre de Place : {{$voiture->nbPlace}} </span>
                <span class="badge badge-primary mr-3"> Catégorie :  {{$voiture->catégorie}} </span>
                <span class="badge badge-primary mr-3"> PrixJ  :  {{$voiture->PrixJ}} Dinars </span>
                @if ($voiture->dispo)
              @auth
              <p>
                 <a href="{{route('reservation.create' ,$voiture->id)}}" class="btn btn-primary"> Réserver </a>
              </p>
                 @else
                 <p>
                 <a href="{{route('users.login')}}" class="btn btn-primary"> Réserver </a>
                 </p>
              @endauth

                @else
                <span class="badge badge-warning">
                  Réservé
                </span>

                @endif
               </p>
     
  
          </div>
          </div>
          </div>


          

</div>
@endsection