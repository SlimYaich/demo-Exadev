@extends ('layouts.master')

@section('content')

<div class ="container">
    <div class="row my-5">
        <div class="col-md-8 mx-auto">
            <div class="card bg-light">
                <h3 class="card-header">Modifier une voiture </h3>
                <div class="card-body">
                <form action="{{route('voitures.update',$voiture->id)}}" method="post" enctype="multipart/form-data"> 
        @csrf
        {{method_field('put')}}
      <div class="form-group">
        <label for=""> Marque* </label>
        <input type="text" name="marque" id="" class="form-control" value="{{$voiture->marque}}" placeholder="Marque" aria-describedby="helpId">

        </div>

        <div class="form-group">
        <label for=""> Couleur* </label>
        <input type="text" name="couleur"  id="" class="form-control" value="{{$voiture->couleur}}" placeholder="Couleur" aria-describedby="helpId">

        </div>

        <div class="form-group">
        <label for=""> Catégorie* </label>
        <select name="catégorie" class="form-control"  name="" id="">
          <option value="" selected disabled> Veuillez choisir une catégorie </option>
          <option value="Diesel" {{$voiture->catégorie == 'Diesel' ? 'selected' : ''}}>Diesel</option>
          <option value="Essence" {{$voiture->catégorie == 'Essence' ? 'selected' : ''}}> Essence </option>
          </select>
        </div>



        <div class="form-group">
        <label for=""> nbPlace* </label>
        <select name="nbPlace"class="form-control"  name="" id="">
          <option value="" selected disabled> Veuillez choisir le nombre de Place </option>
          <option value="5" {{$voiture->nbPlace == '5' ? 'selected' : ''}}> 5 Places</option>
          <option value="6" {{$voiture->nbPlace == '6' ? 'selected' : ''}}> 6 Places </option>
          </select>
        </div>

        <div class="form-group">
        <label for=""> Vitesse* </label>
        <input type="text" name="vitesse" id="" class="form-control" value="{{$voiture->vitesse}}" placeholder="Vitesse" aria-describedby="helpId">

        </div>

        <div class="form-group">
        <label for=""> Kilometrage* </label>
        <input type="text" name="kilometrage" id="" class="form-control" value="{{$voiture->kilometrage}}" placeholder="Kilometrage" aria-describedby="helpId">

        </div>

        <div class="form-group">
        <label for=""> Prix journée* </label>
        <input type="number" name="PrixJ" id="" class="form-control" value="{{$voiture->PrixJ}}" placeholder="Prix journée" aria-describedby="helpId">

        </div>

        <div class="form-group">
        <label for=""> Disponibilité* </label>
        <select name="dispo" class="form-control"  name="" id="">
          <option value="" selected disabled> Veuillez choisir une option </option>
          <option value="1" {{$voiture->dispo ? 'selected' : ''}}> Oui</option>
          <option value="0" {{!$voiture->dispo ? 'selected' : ''}}> Non </option>
          </select>
        </div>

        <div class="form-group">
        <img src="{{$voiture->image}}" width="100" height="100" alt="" class="img-fluid rounded">
        </div>

        <div class="form-group">
        <label for=""> Photo* </label>
        <input type="file" name="image" id="" class="form-control"  aria-describedby="helpId">

        </div>

        <button type="submit" class="btn btn-primary">Valider </button>

      </form>  
                </div>
                </div>
                </div>
                </div>
                </div>
@endsection
