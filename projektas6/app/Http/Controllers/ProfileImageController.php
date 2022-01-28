<?php

namespace App\Http\Controllers;

use App\Models\ProfileImage;
use App\Http\Requests\StoreProfileImageRequest;
use App\Http\Requests\UpdateProfileImageRequest;
use Illuminate\Http\Request;

class ProfileImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileImage = ProfileImage::all();
        return view('profileimage.index', ['profileImages' => $profileImage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profileImage.create'); //grazina vaizda i
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profileImage = new ProfileImage;

        $profileImage->alt = $request->image_alt;

        // time(); grazina unikalu skaiciu kuris skirtas laikui, nera imanoma kad dviems kelimais sugeneruotu ta pati laika
        //panaudosim si koda prisege prie pic pavadinimo, del to nesikirs vienodi pavadinimai.

        $imageName = 'image' . time() . '.' . $request->image_src->extension(); // kreipiames i pic varda ir pridedame pletini

        $request->image_src->move(public_path('images'), $imageName);
        //paimti faila is web laukelio i serveri

        $profileImage->src = $imageName;
        //iraso i serva

        //pic.jpg
        // $imageName = image5645468168487.jpg


        //pacio paveikslelio talpinimas i serverio ir jo pavadinimo pasiemimas/sudarymas
        //paveiksliuku/aplankas
        //pic.png
        //pic.png
        //nera svarbu kad vienodi pavadinimai, nes eis pagal didejanti id
        //bet aplanke jie negali dubliuotis
        //pic123.png
        //pic136.png
        //kiekvienam paveiksliukui reik sudaryti pavadinima

        $profileImage->width = $request->image_width;
        $profileImage->height = $request->image_height;
        $profileImage->class = $request->image_class;

        $profileImage->save();

        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileImage $profileImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileImage $profileImage)
    {
        return view('profileImage.edit', ['profileImage' => $profileImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileImageRequest  $request
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileImage $profileImage)
    {
        //jeigu file yra tuscias duombazej nieko nedaro
        //jeigu nauja pasirinkome reikia irasyti pic

        //ta pati daro ka kodas isset($POST['image_src] $$ !empty($_POST['image_src]))
        if ($request->has('image_src')) {
            $imageName = 'image' . time() . '.' . $request->image_src->extension();
            $request->image_src->move(public_path('images'), $imageName);
            $profileImage->src = $imageName;
        }

        //$profileImage->alt = kokia yra duombazeje
        $profileImage->alt = $request->image_alt;
        $profileImage->width = $request->image_width;
        $profileImage->height = $request->image_height;
        $profileImage->class = $request->image_class;

        $profileImage->save();

        return view('profileimage.edit', ['profileImage' => $profileImage]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileImage $profileImage)
    {
        //
    }
}
