<?php

namespace App\Http\Controllers;

use App\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search !== null){
            $voitures = Voiture::orderBy('created_at','DESC')->whereMarque($request->search)->paginate(5);
            return view('voitures.index')->with([
                'voitures' => $voitures,
                'title' => "Resultat trouvés pour :" . $request->search ,
                'count' => $voitures->count()
            ]);
        }else{
            $voitures = Voiture::all();
        return view('voitures.index')->with([
            'voitures' => Voiture::paginate(5),
            'title' => "Toutes les voitures" ,
            'count' => $voitures->count()
            
        ]);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[

        
        'marque' => 'required' ,
        'couleur' => 'required' ,
        'catégorie' => 'required' ,
        'nbPlace' => 'required' ,
        'vitesse' => 'required' ,
        'kilometrage' => 'required' ,
        'PrixJ' => 'required' ,
        'dispo' => 'required' ,
        'image' => 'required' ,

        ]);

        $name = '';
        if ($request->hasFile('image')){
            $file = $request->image;
            $name = $file->getClientOriginalName();
            $file->move(public_path('images'), $name);
           
        }
        Voiture::create([

            'marque' => $request->marque ,
          'couleur' => $request->couleur ,
           'catégorie' => $request->catégorie ,
            'nbPlace' => $request->nbPlace ,
           'vitesse' => $request->vitesse ,
            'kilometrage' => $request->kilometrage ,
            'PrixJ' => $request->PrixJ ,
            'dispo' => $request->dispo ,
            'image' => '/images/' . $name

        ]);
        return redirect()->route('admins.index')->withSuccess('Voiture ajoutée');

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function show(Voiture $voiture)
    {
        return view('voitures.show')->withVoiture($voiture);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function edit(Voiture $voiture)
    {
        //
        return view('voitures.edit')->withVoiture($voiture);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voiture $voiture)
    {
        //
        $this->validate($request,[

        
            'marque' => 'required' ,
            'couleur' => 'required' ,
            'catégorie' => 'required' ,
            'nbPlace' => 'required' ,
            'vitesse' => 'required' ,
            'kilometrage' => 'required' ,
            'PrixJ' => 'required' ,
            'dispo' => 'required' ,
            'image' => 'required' ,
    
            ]);
            
            $image= $voiture->image;
            if ($request->hasFile('image')){
                $file = $request->image;
                $name = $file->getClientOriginalName();
                $file->move(public_path('images'), $name);
                $image = '/images/' .$name;              
            }
            $voiture->update([
    
                'marque' => $request->marque ,
              'couleur' => $request->couleur ,
               'catégorie' => $request->catégorie ,
                'nbPlace' => $request->nbPlace ,
               'vitesse' => $request->vitesse ,
                'kilometrage' => $request->kilometrage ,
                'PrixJ' => $request->PrixJ ,
                'dispo' => $request->dispo ,
                'image' => $image
                
    
            ]);
            return redirect()->route('admins.index')->withSuccess('Voiture modifiée');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voiture $voiture)
    {
        //
        $voiture->delete();
        return redirect()->route('admins.index')->withSuccess('Voiture supprimée');

    }
}
