<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Guest\GuestRepository;

class GuestController extends Controller
{

    protected $guestRepository;

    public function __construct(GuestRepository $guestRepository)
    {
        $this->guestRepository = $guestRepository;
    }

    public function index()
    {
        $guests = $this->guestRepository->getAll();
        return view('guest.index',compact('guests'));
    }

    public function getSearch(Request $request)
    {
       $guests = $this->guestRepository->search($request->id);
       return view('guest.index',compact('guests'));
    }

    public function update()
    {

    }

    public function show($id)
    {
        $guest = $this->guestRepository->find($id);
        if(!$guest){
            return redirect()->route('guest.index');
        }else{
            return view('guest.show', compact('guest'));
        }
    }
}
