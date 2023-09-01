<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lend;
use App\Models\Fine;
use Mockery\Undefined;

class FineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fines = Fine::All();
        
        return view('admin.fines.index', ['fines' => $fines]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $lend = Lend::Where('lend_status', '=', '0')->get();

        for($i = 0 ; $i < $lend->count(); $i++){
            
            $lend[$i]->lend_status = app(Controller::class)->lateCheck($lend[$i]->return_date);

            if($lend[$i]->lend_status == 3){
                $fine_amount = app(Controller::class)->countFine($lend[$i]->return_date);
                
                $fine = Fine::where('lend_id', $lend[$i]->id)->get();
                
                if(isset($fine[0]) == true){
                    if($fine[0]->fine_status == '0'){
                        $fine[0]->fine_amount = $fine_amount;
                    }
                }else{
                    Fine::create([
                        'lend_id'       => $lend[$i]->id,
                        'user_id'       => $lend[$i]->user_id,
                        'book_id'       => $lend[$i]->book_id,
                        'fine_amount'   => $fine_amount
                    ]);
                }
            }

        }

        $fines = Fine::All();

        return redirect()->route('fines.index')->with([ 'fines' => $fines ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pay = Fine::where('id', $id)->update(['fine_status' => '1']);
        
        $fines = Fine::All();

        return redirect('/admin/fines')->with('success', [
            'message'   => 'Alhamdulillah Lunas!',
            'fines'     => $fines]);;
    }
}
