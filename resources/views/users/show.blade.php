@extends ('layouts.master')

@section ('content')
   <div class="row my-4">
        <div class="col-md-4">
           <div class="card text-left">
                <img class="card-img-top"src="{{$user->image}}" alt="">
                <div class="card-body">
                    <h4 class="card-title">{{$user->name}} </h4>
                    <p class="card-text d-flex flex-row align-items-center">
                        <span class="badge badge-primary mr-2">Téléphone: {{$user->tel}} </span>
                        <span class="badge badge-danger">Ville: {{$user->ville}} </span>

                    </p>
          </div>
          </div>
          </div>

          <div class="col-md-8">
            <h3> Mes Commandes </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th> Marque</th>
                        <th> Catégorie </th>
                        <th> Prix Journée </th>
                        <th> nb_jours </th>
                        <th> Date début </th>
                        <th> Date fin</th>
                        <th> PrixTTC </th>                      
                        <th> Action </th>
                        
                    </tr>
                </thead> 

                <tbody>
                   @foreach(auth()->user()->reservations as $reservation)
                   <tr>
                        <td> {{App\Voiture::findOrFail($reservation->Voiture_id)->marque}} </td>
                        <td> {{App\Voiture::findOrFail($reservation->Voiture_id)->catégorie}}</td>
                        <td> {{App\Voiture::findOrFail($reservation->Voiture_id)->PrixJ}}</td>
                        <td> {{$reservation->nb_jours}}</td>
                        <td> {{$reservation->date_debut_location}}</td>
                        <td> {{$reservation->date_fin_location}}</td>
                        <td> {{$reservation->PrixTTC}}</td>
                        
                        
                        
                        <td>

                        <form action="{{route('reservation.delete',[$reservation->id,$reservation->Voiture_id])}}"  > 
                        @csrf
                      
                              <button type="submit" class="btn btn-danger" > <i class="fa fa-trash"> </i> </button>
                            </form>

                         </td>

                    </tr> 
                   @endforeach
                </tbody>
          </table>
          </div>
          </div>
@endsection