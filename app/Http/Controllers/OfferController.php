<?php


namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\ImageOffer;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('id', 'DESC')->paginate(9);
        return view('offers.index', compact('offers'));
    }

    public function add()
    {
        return view('offers/add');
    }

    public function addSubmit(OfferRequest $request)
    {
        $title = $request->input('title');
        $price = $request->input('price');
        $description = $request->input('description');

        $offer = new Offer();
        $offer->title = $title;
        $offer->price = $price;
        $offer->description = $description;
        $offer->user_id = Auth::user()->id;
        $offer->save();
        if ($request->isMethod('post')) {
            if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $path = 'public/offers/' . $offer->id;
                    if (!Storage::exists($path)) {
                        Storage::makeDirectory($path);
                    }
                    $file->move(storage_path("app/$path"), $name);
                    $offerImages = new ImageOffer();
                    $offerImages->offer_id = $offer->id;
                    $offerImages->name = $name;
                    $offerImages->save();
                }
            }
        }
        session()->flash('success', 'offer #' . $offer->id . 'succes added');
        return redirect()->route('offers');
    }

    public function edit(Offer $offer)
    {
        return view('offers/edit', compact('offer'));
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

        if ($request->isMethod('post')) {
            if ($request->hasFile('images')) {
                $files = $request->file('images');
                foreach ($files as $file) {
                    $name = $file->getClientOriginalName();
                    $path = 'public/offers/' . $offer->id;
                    if (!Storage::exists($path)) {
                        Storage::makeDirectory($path);
                    }
                    $file->move(storage_path("app/$path"), $name);
                    $offerImages = new ImageOffer();
                    $offerImages->offer_id = $offer->id;
                    $offerImages->name = $name;
                    $offerImages->save();
                }
            }
        }

        session()->flash('warning', 'offer # ' . $offer->id . 'edited');
        return redirect()->route('offers');
    }

    public function delete(Offer $offer)
    {
        $images = $offer->images;
        $directoryPath = 'public/offers/' . $offer->id;
        $offer->delete();
        if (Storage::exists($directoryPath)) {
            Storage::deleteDirectory($directoryPath);
        }
        session()->flash('danger', 'offer #' . $offer->id . 'removed');
        return redirect()->route('offers');
    }

    public function view(Offer $offer)
    {
        return view('offers/view', compact('offer'));
    }

    public function deleteImage(Offer $offer, ImageOffer $imageOffer)
    {

        $pathDir = 'app/public/offers/' . $offer->id . '/';
        $imgName = $imageOffer->name;

        $imageOffer->delete();

        if (is_file(storage_path($pathDir . $imgName))) {
            unlink(storage_path($pathDir . $imgName));
        }
        return redirect()->route('offers-edit', $offer->id);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $offers = Offer::where('title', 'like', "%$search%")->get();
        return view('offers/search', compact('offers'));
    }
}
