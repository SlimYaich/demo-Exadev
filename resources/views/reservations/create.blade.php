@extends ('layouts.master')

@section ('content')
   <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card border border-primary shadow-sm">
                <h3 class="card-header">Louer cette voiture </h3>
                <div class="row my-3">
                    <div class="col-md-12">
                    <div class="card">
    <h3 class="text-info p-4">{{$voiture->marque}} </h3>
    <div class="card-img-top">
        <img src="{{$voiture->image}}" class="img-fluid rounded m-2" alt="">
    </div>
    <div class="card-body">

             
               <p class="d-flex flex-row justify-content-start">
                <span class="badge badge-danger mx-3"> Nombre de Place : {{$voiture->nbPlace}} </span>
                <span class="badge badge-primary mr-3"> Catégorie :  {{$voiture->catégorie}} </span>
                <span class="badge badge-primary mr-3"> PrixJ  :  {{$voiture->PrixJ}} Dinars </span>
                
               </p>
     
  
          </div>
          </div>
                    </div>
                </div>
                <div class="card-body">

                <form action="{{route('reservations.store')}}" method="post">
                    @csrf


            

                    <div class="form-group">
                       <label for="date_debut_location">Date début location </label>
                       <input type="date" class="form-control" name="date_debut_location" id="" placeholder="Date début location..." aria-describedby="helpId">  
                     </div> 

                     <div class="form-group">
                       <label for="date_fin_location">Date fin location </label>
                       <input type="date" class="form-control" name="date_fin_location" id="" placeholder="Date fin location..." aria-describedby="helpId">  
                     
                     
                     <input type="hidden" name="Voiture_id" value="{{$voiture->id}}">
                      </div> 

                   


                     <div class="form-group">
                       <button type="submit" class="btn btn-primary">Valider</button>
                      </div>
                      </form> 

               </div>
               </div>

            
               </div>


          

</div>
@endsection