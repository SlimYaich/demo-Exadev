@extends ('layouts.master')

@section ('content')
   <div class="row my-4">
        <div class="col-md-12">
            <div class="form-group">
               <button class="btn btn-primary" data-toggle="modal" data-target="#ajouterVoiture"> <i class="fa fa-plus"> </i> </button>
            </div>
          <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id </th>
                            <th>Marque </th>
                            <th>Catégorie </th>
                            <th>nbPlace </th>
                            <th>vitesse </th>
                            <th>kilometrage </th>
                            <th>Prix journée </th>
                            <th>Disponibilité </th>
                            <th>Image </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($voitures as $voiture)
                        <tr>
                            <td > {{$voiture->id}} </td>
                            <td> {{$voiture->marque}} </td>
                            <td> {{$voiture->catégorie}} </td>

                            <td > {{$voiture->nbPlace}} </td>
                            <td> {{$voiture->vitesse}} </td>
                            <td> {{$voiture->kilometrage}} </td>
                            <td> {{$voiture->PrixJ}} </td>
                            
                            <td> 
                                @if($voiture->dispo)

                                <span class="badge badge-success">
                                    Disponible
                                </span>

                            
                                @else

                                <span class="badge badge-danger">
                                Réservé
                                </span>


                                @endif
                            </td>
                            <td> 
                                <img src="{{$voiture->image}}"
                                width="60"
                                height="60"
                                class="img-fluid rounded"
                                alt="" srcset="">
                            </td>

                            <td class="d-flex flex-row justify-content-center">
                            <a href="{{route('voitures.edit', $voiture->id)}}" class="btn btn-warning mr-2" > <i class="fa fa-edit"> </i> </a>
                            <form action="{{route('voitures.destroy',$voiture->id)}}" method="post"> 
                              @csrf 
                              {{method_field('delete')}}
                              <button type="submit" class="btn btn-danger" > <i class="fa fa-trash"> </i> </button>
                            </form>
                            </td>

                           </tr>
                        @endforeach
                           </tbody>
                           </table>

                           <div class="d-flex justify-content-center">
                            {!! $voitures->links() !!}
                           </div>
        </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="ajouterVoiture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une Voiture</h5>
        <button type="button" class="btn-close" aria-label="Close"></button>

      </div>
      
      <div class="modal-body">
      <form action="{{route('voitures.store')}}" method="post" enctype="multipart/form-data"> 
        @csrf
      <div class="form-group">
        <label for=""> Marque* </label>
        <input type="text" name="marque" id="" class="form-control" placeholder="Marque" aria-describedby="helpId">

        </div>

        <div class="form-group">
        <label for=""> Couleur* </label>
        <input type="text" name="couleur" id="" class="form-control" placeholder="Couleur" aria-describedby="helpId">

        </div>

        <div class="form-group">
        <label for=""> Catégorie* </label>
        <select name="catégorie" class="form-control" name="" id="">
          <option value="" selected disabled> Veuillez choisir une catégorie </option>
          <option value="Diesel"> Diesel</option>
          <option value="Essence"> Essence </option>
          </select>
        </div>



        <div class="form-group">
        <label for=""> nbPlace* </label>
        <select name="nbPlace"class="form-control" name="" id="">
          <option value="" selected disabled> Veuillez choisir le nombre de Place </option>
          <option value="5"> 5 Places</option>
          <option value="6"> 6 Places </option>
          </select>
        </div>

        <div class="form-group">
        <label for=""> Vitesse* </label>
        <input type="text" name="vitesse" id="" class="form-control" placeholder="Vitesse" aria-describedby="helpId">

        </div>

        <div class="form-group">
        <label for=""> Kilometrage* </label>
        <input type="text" name="kilometrage" id="" class="form-control" placeholder="Kilometrage" aria-describedby="helpId">

        </div>

        <div class="form-group">
        <label for=""> Prix journée* </label>
        <input type="number" name="PrixJ" id="" class="form-control" placeholder="Prix journée" aria-describedby="helpId">

        </div>

        <div class="form-group">
        <label for=""> Disponibilité* </label>
        <select name="dispo" class="form-control" name="" id="">
          <option value="" selected disabled> Veuillez choisir une option </option>
          <option value="1"> Oui</option>
          <option value="0"> Non </option>
          </select>
        </div>

        <div class="form-group">
        <label for=""> Photo* </label>
        <input type="file" name="image" id="" class="form-control" aria-describedby="helpId">

        </div>

        <button type="submit" class="btn btn-primary">Valider </button>

      </form>  


      </div>
      
    </div>
  </div>
</div>

@endsection