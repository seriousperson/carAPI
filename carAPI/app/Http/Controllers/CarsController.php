<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CarResource;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cars = [];

      $carResults = DB::table('cars')->get();

      if(!(\is_null($carResults))){
        foreach($carResults as $car){
          \array_push($cars, [
            'data' => [
              'id' => $car->id,
              'attributes' =>[
                'colour'=> $car->colour,
                'price' => $car->price,
                'fuel' => $car->fuel,
                'transmission' => $car->transmission
              ]
            ]
          ]);
        }
      }else{
        return response()->json(['error' => [
          'message' => 'No car was found'
        ]]);
      }

      return response()->json($cars);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {

      $params = [
        'colour' => null,
        'id' => null,
        'fuel' => null,
        'transmission' => null
      ];
      
      foreach(\explode('&', $request) as $p){
        $paramSplit = \explode('=', $p);
        if($paramSplit[0] == 'colour'){
          $params['colour'] = $paramSplit[1];
        }else if($paramSplit[0] == 'id'){
          $params['id'] = $paramSplit[1];
        } else if($paramSplit[0] == 'fuel'){
          $params['fuel'] = $paramSplit[1];
        } else if($paramSplit[0] == 'transmission'){
          $params['transmission'] = $paramSplit[1];
        }
      }

      
      
      //filter by parameters
      $carsQuery = Car::query();
      
      if($params['id'] != null){
        $carsQuery = $carsQuery->where('id', $params['id']);
      }
      
      if($params['colour'] != null){
        $carsQuery = $carsQuery->where('colour', $params['colour']);
      }

      if($params['fuel'] != null){
        $carsQuery = $carsQuery->where('fuel', $params['fuel']);
      }

      if($params['transmission'] != null){
        $carsQuery = $carsQuery->where('transmission', $params['transmission']);
      }

      $cars = $carsQuery->get();

      
      
      if(\is_null($cars) || empty($cars)){
        return response()->json(['error' => [
          'message' => 'No car with this id was found'
        ]]);
      }


      $carsResponse = [];
      foreach($cars as $c){
        array_push($carsResponse, [
        'data' => [
          'id' => $c->id,
          'attributes' =>[
            'colour'=> $c->colour,
            'price' => $c->price,
            'fuel' => $c->fuel,
            'transmission' => $c->transmission
          ]
        ]
      ]);
      }


      return response()->json($carsResponse);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
