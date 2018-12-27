<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subscriber;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class SubscribersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $subscribers = Subscriber::orderBy('id','desc')->get();

        // return $subscribers;

        return view('backEnd.admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    // public function show(Subscriber $subscriber)
    // {
    //     return view('backEnd.admin.subscribers.show', compact('subscriber'));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    // public function delete(Subscriber $subscriber)
    // {
    //     $subscriber->delete();

    //     Session::flash('message', 'Subscriber deleted!');
    //     Session::flash('status', 'success');

    //     return redirect('subscribers');
    // }

}
