@extends ('layouts.master')

@section ('content')
   <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card border border-primary shadow-sm">
                <h3 class="card-header">Connexion </h3>
                <div class="card-body">

                <form action="{{route('users.auth')}}" method="post">
                    @csrf
                   
                   <div class="form-group">
                       <label for="email">Email </label>
                       <input type="email" class="form-control" name="email" id="" placeholder="Email..." aria-describedby="helpId">  
                     </div> 

                     <div class="form-group">
                       <label for="password">Mot de passe </label>
                       <input type="password" class="form-control" name="password" id="" placeholder="Mot de passe..." aria-describedby="helpId">  
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