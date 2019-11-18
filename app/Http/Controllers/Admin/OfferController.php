<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageOffer;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('id','DESC')->paginate(9);
        return view('admin/offers/index',compact('offers'));
    }

    public function edit(Offer $offer)
    {
        return view('admin/offers/edit',compact('offer'));
    }

    public function editSubmit(Request $request, Offer $offer)
    {
        $title = $request->input('title');
        $price = $request->input('price');
        $description = $request->input('description');

        $offer->title = $title;
        $offer->price = $price;
        $offer->description = $description;
        $offer->save();

        if($request->isMethod('post')) {
            if($request->hasFile('images')) {
                $files = $request->file('images');
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $path = 'public/offers/' . $offer->id;
                    if(!Storage::exists($path)) {
                        Storage::makeDirectory($path);
                    }
                    $file->move(storage_path("app/$path"), $name);
                    $offerImage = new ImageOffer();
                    $offerImage->offer_id = $offer->id;
                    $offerImage->name = $name;
                    $offerImage->save();
                }
            }
        }

        session()->flash('warning', 'offer #'.$offer->id.' edited');
        return redirect()->route('admin-offers');
    }

    public function delete(Offer $offer)
    {
        $directoryPath = 'public/offers/'.$offer->id;
        $offer->delete();
        if(Storage::exists($directoryPath)) {
            Storage::deleteDirectory($directoryPath);
        }
        session()->flash('danger', 'offer #'.$offer->id.' removed');
        return redirect()->route('admin-offers');
    }

    public function deleteImage(Offer $offer, ImageOffer $imageOffer)
    {
        $pathDir = 'app/public/offers/'.$offer->id.'/';
        $imgName = $imageOffer->name;

        $imageOffer->delete();

        if (is_file(storage_path($pathDir . $imgName))) {
            unlink(storage_path($pathDir . $imgName));
        }
        return redirect()->route('admin-offers-edit',$offer->id);
    }
}
