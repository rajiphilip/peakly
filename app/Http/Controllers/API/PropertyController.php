<?php

namespace App\Http\Controllers\API;

use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PropertyResource;
use App\Http\Resources\PropertyCollection;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;

class PropertyController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$properties = Property::all()->with('images');

        $properties = Property::paginate();

        return $this->sendResponse(new PropertyCollection($properties), 'Properties fetched');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {
        $validatedData = $request->validated();
        // $images = [];
        $count = 0;

        $id = Auth::user()->id;
        $brochure = $request->file('brochure')->store('brochures', 'public');
        $image = $request->file('image')->store('property_images', 'public');


        $validatedData['user_id'] = $id;
        $validatedData['status'] = 'On Sale';
        $validatedData['brochure'] = $brochure;
        $validatedData['image'] = $image;

        $property = Property::create($validatedData);

        // if ($request->file('images')) {
        //     return response()->json([ 'foo' => 'available', 'Name' => count($request->file('images'))]);
        // }


      //  foreach ($request->file('images') as $pimage) {

            //$p_image = $pimage->store('property_images', 'public');

            // $images[][] = [
            //     "property_id" => 2,
            //     //"image" => $p_image,
            //     "number" => $pimage->getClientOriginalName()
            // ];
            // $count++;
            // PropertyImage::create([
            //     "property_id" => $property->id,
            //     "image" => $p_image
            // ]);
       // }

        //return response()->json(['foo' => $count]);

        return $this->sendResponse(new PropertyResource($property), 'Property created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
