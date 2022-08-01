<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Voiture;
use Illuminate\Http\Request;
use DateTime;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservation.index')->with (['reservations' => Reservation::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //

        return view('reservations.create')->withVoiture(Voiture::findOrFail($id));
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
          
            'Voiture_id' => 'required',
           'date_debut_location' => 'required',
           'date_fin_location' => 'required',
           
           
           
      ]);
         
        $voiture = Voiture::findOrFail($request->Voiture_id);
        $dateLocation = new DateTime($request->date_debut_location);
        $dateRetour = new DateTime ($request->date_fin_location);
        $jours = date_diff($dateLocation,$dateRetour);
        $prixTtc = $voiture->PrixJ * $jours->format('%d');
      
       
     


        Reservation::create([
          'user_id' => auth()->user()->id,
           'Voiture_id' => $request->Voiture_id,
            'date_debut_location' => $request->date_debut_location,
            'date_fin_location' => $request->date_fin_location,
            'nb_jours' => $jours->format('%d days'),
             'PrixTTC' => $prixTtc,
           
           


       ]);

       $voiture->update([
        'dispo' => 0
       ]);

        return redirect()->route('voitures.index')->with([
            'success' => 'Réservation Ajoutée'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show')->withReservation ($reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function deleteUserReservations($reservationId,$voitureId){
       $reservation = Reservation::findOrFail($reservationId);
       if ($reservation->Voiture_id == $voitureId){
        $reservation->delete();
        return redirect()->route('voitures.index')->with([
            'success' => 'Réservation Supprimée'
        ]);

       }
    }
}

