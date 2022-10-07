<?php

namespace App\Http\Controllers;

 use App\Enum\TypeEnum;
use App\Models\Project;
use App\Enum\StatusEnum;
use App\Models\Transection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TransectionRequest;
use App\Models\TransectionCategory;

class ProjectTransectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,Project $project)
    {
        $transection = new Transection($request->old());
        $types = TypeEnum::cases();

        return view('transection.form',compact('transection','project','types'));
    }

    public function create2(Request $request,Project $project)
    {
        $transection = new Transection($request->old());

        $types = TypeEnum::cases();
        $categories = TransectionCategory::all();

        return view('transection.form2',compact('transection','project','types','categories'));
    }

    public function createPayBack(Request $request,Project $project,Transection $transection)
    {
        $types = TypeEnum::cases();

        return view('transection.paybackform',compact('transection','project','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransectionRequest $request,Project $project,Transection $transection)
    {
        $data = $request->validated();
        $transection = Transection::create([
            'project_id' => $project->id,
            'category_id' => null,
            'status' => 'beklemede',
            'price' => $data['price'],
            'is_income' => $data['is_income'],
            'is_completed' => $data['is_completed'],
            'type' => $data['type'],
        ]);
        if($transection->is_income == 0) {
            $transection->price = $transection->price * -1;
            $transection->update();
        }

        return redirect()->route('admin.project.show',$project)->with('success', 'Transection created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transection  $transection
     * @return \Illuminate\Http\Response
     */
    public function show(Transection $transection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transection  $transection
     * @return \Illuminate\Http\Response
     */
    public function edit(Transection $transection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transection  $transection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transection $transection)
    {
        //
    }

    public function approve(Transection $transection)
    {
        $transection->status = StatusEnum::cases()[1]->value; //onaylandı
        $transection->payer = Auth::user()->name;
        $transection->update();

        $user = $transection->project->user;

        if($transection->type->value == 'Masraf Talebi') {
        $user->balance = $transection->project->user->balance + $transection->price;
        $user->update();
        }

        $project = $transection->project;
    
        return redirect()->route('admin.project.show',$project);
    }

    public function complete(Transection $transection)
    {
        $transection->status = StatusEnum::cases()[2]->value; //tamamlandı
        $transection->payer = Auth::user()->name;
        $transection->update();

        $user = $transection->project->user;
    
        $user->balance = $transection->project->user->balance + $transection->price;
        $user->save();

        $project = $transection->project;
    
        return redirect()->route('admin.project.show',$project);
    }

    public function reject(Transection $transection)
    {
        $transection->status = StatusEnum::cases()[3]->value; //iptal edildi
        $transection->payer = Auth::user()->name;
        $transection->update();

        $project = $transection->project;

        return redirect()->route('admin.project.show',$project);
    }

    public function reverse(Transection $transection)
    {
        if($transection->status->name == 'COMPLETED') {
            $transection->status = StatusEnum::cases()[0]->value; //beklemede
            $transection->save();

            $user = $transection->project->user;
            $user->balance = $transection->project->user->balance - $transection->price;
            $user->save();
        }elseif($transection->status->name == 'APPROVED'){
            $transection->status = StatusEnum::cases()[0]->value; //beklemede
            $transection->save();
        }
        elseif($transection->status->name == 'CANCELLED') {
            $transection->status = StatusEnum::cases()[0]->value;
            $transection->save();
        }

        $project = $transection->project;

        return redirect()->route('admin.project.show',$project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transection  $transection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transection $transection)
    {
        $transection->delete();

        return redirect()->route('admin.front.index');
    }
}
