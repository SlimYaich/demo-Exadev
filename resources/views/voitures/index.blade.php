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
                        <input type="text" class="form-control" name="search" id="" placeholder="Recherche">  
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
    
    <h3 class="card-header">{{$title}} <span class="badge badge-primary"> {{$count}} </span> </h3>
    <div class="card-body">
     @foreach ($voitures as $voiture)
     <div class="media mb-2 ">
        <div class="media-left">
       <img src="{{$voiture->image}}" width="70" heigth="70" class="rounded-circle" alt="">
          </div>

          <div class="media-body">
              <h3 class="text-info">
                <a href="{{route('voitures.show' , $voiture->id)}}" class="btn btn-link">
                  {{$voiture->marque}}
                </a>
               </h3>
               <p class="d-flex flex-row justify-content-start">
                <span class="badge badge-danger mx-3"> Nombre de Place : {{$voiture->nbPlace}} </span>
                <span class="badge badge-primary mr-3"> Catégorie :  {{$voiture->catégorie}} </span>
                <span class="badge badge-primary mr-3"> PrixJ  :  {{$voiture->PrixJ}} Dinars </span>
                @if ($voiture->dispo)
                <span class="badge badge-success">
                  Disponible
                </span>
                @else
                <span class="badge badge-warning">
                  Réservé
                </span>

                @endif
               </p>
           </div>
          
          </div>
          <hr>
     @endforeach
          </div>
          <div class="d-flex justify-content-center">
            {!! $voitures->links() !!}
          </div>
          </div>
          </div>


          

</div>
@endsection