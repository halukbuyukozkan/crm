<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Enum\TypeEnum;
use App\Models\Project;
use App\Enum\StatusEnum;
use App\Events\TransectionApproved;
use App\Models\Transection;
use Illuminate\Http\Request;
use App\Models\TransectionItem;
use App\Models\TransectionCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\TransectionRequest;

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
    public function create(Request $request,Project $project,$type)
    {
        $transection = new Transection($request->old());
        $categories = TransectionCategory::all();

        $transectiontypes = TypeEnum::cases();

        return view('transection.form',compact('transection','project','categories','type','transectiontypes'));
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

        $categories = $data['transection_category_id'];
        $prices = $data['price'];

        foreach($categories as $key => $category) {
            $transections[] = Transection::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'project_id' => $project->id,
                'transection_category_id' => ($category ? $category : null),
                'status' => 'beklemede',
                'price' => $prices[$key],
                'is_income' => $data['is_income'],
                'is_completed' => $data['is_completed'],
                'type' => $data['type'],
            ]);
        }
        

        foreach($transections as $transection){
            if(Auth::user()->hasAnyPermission('??deme Ger??ekle??tirme')){
                $transection->status = 'onayland??';
            }
    
            if($transection->is_income == 0) {
                $transection->price = $transection->price * -1;
                $transection->update();
            }
        }

        if($request->hasfile('filename')) {
            foreach($request->file('filename') as $file)
            {
                $name=$file->getClientOriginalName();
                $filename = pathinfo($name, PATHINFO_FILENAME);
                $slugname = str_replace(' ', '', $transection->project->name);
                $name = '('.$slugname.')' . $filename . md5($name) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path().'/files/', $name);   
                
                foreach($transections as $transection) {
                    $file= new TransectionItem();
                    $file->transection_id=$transection->id;
                    $file->filename= $name;

                    $file->save();
                }
                 
            }}
        
        return redirect()->route('admin.project.show',$project)->with('success', __('Transection created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transection  $transection
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project,Transection $transection)
    {
        return view('transection.show',compact('transection'));
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
        $transection->status = StatusEnum::APPROVED->value; //onayland??
        $transection->payer = Auth::user()->name;
        $transection->approved_at = Carbon::now();
        $transection->update();

        $project = $transection->project;

        event(new TransectionApproved($transection));
    
        return redirect()->route('admin.project.show',$project);
    }

    public function accounting(Transection $transection)
    {
        $transection->status = StatusEnum::ACCOUNT??NG->value;
        $transection->payer = Auth::user()->name;
        $transection->approved_at = Carbon::now();
        $transection->update();

        $user = $transection->project->user;

        $user->balance = $transection->project->user->balance + $transection->price;
        $user->save();

        $project = $transection->project;
        
        return redirect()->route('admin.project.show',$project);
    }

    public function complete(Transection $transection)
    {
        $transection->status = StatusEnum::COMPLETED->value; //tamamland??
        $transection->payer = Auth::user()->name;
        $transection->completed_at = Carbon::now();
        $transection->update();

        $user = $transection->project->user;

        $transectiontypes = TypeEnum::cases();
        $user->balance = $transection->project->user->balance + $transection->price;
        $user->save();
        
        $project = $transection->project;
    
        return redirect()->route('admin.project.show',$project);
    }

    public function amount(Request $request,Transection $transection)
    {
        $data = $request->validate([
            'price' => 'integer|required',
        ]);

        $types = TypeEnum::cases();

        Transection::create([
            'name' => $transection->name,
            'description' => $transection->description,
            'payer' => Auth::user()->name,
            'project_id' => $transection->project->id,
            'transection_category_id' => null,
            'status' => 'tamamland??',
            'price' => $data['price'],
            'is_income' => 0,
            'is_completed' => 1,
            'type' => $types[3],
        ]);

        $user = $transection->project->user;
        $user->balance = $user->balance + $data['price'];
        $user->update();        

        $project = $transection->project;
        
        return redirect()->route('admin.project.show',$project);
    }

    public function reject(Transection $transection)
    {
        $transection->status = StatusEnum::CANCELLED->value; //iptal edildi
        $transection->payer = Auth::user()->name;
        $transection->update();

        $project = $transection->project;

        return redirect()->route('admin.project.show',$project);
    }

    public function reverse(Transection $transection)
    {
        if($transection->status->name == 'COMPLETED') {
                $user = $transection->project->user;
                $user->balance = $transection->project->user->balance - $transection->price;
                $user->save();

                $transection->status = StatusEnum::APPROVED->value; //onayland??
                $transection->save();
        }

        elseif($transection->status->name == 'APPROVED'){
            $transection->status = StatusEnum::WAITING->value; //beklemede
            $transection->save();

        }

        elseif($transection->status->name == 'ACCOUNT??NG') {
            $transection->status = StatusEnum::APPROVED->value; //beklemede
            $transection->save();

            if($transection->type->value == 'Masraf Talebi' || $transection->type->value == '??ade') {
                $user = $transection->project->user;
                $user->balance = $transection->project->user->balance - $transection->price;
                $user->save();
            }
        }

        elseif($transection->status->name == 'CANCELLED') {
            $transection->status = StatusEnum::WAITING->value;
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
    public function destroy(Project $project,Transection $transection)
    {
        if($transection->type->value == '??deme') {
            $user = $transection->project->user;
            $user->balance = $user->balance - $transection->price;
            $user->update();
        }

        foreach($transection->transection_items as $item)
        {   
            if(File::exists(public_path('files/'. $item->filename))){
                File::delete(public_path('files/'. $item->filename));
            }
        }

        $transection->delete();

        return redirect()->route('admin.project.show',$project)->with('success', __('Transection deleted successfully.'));
    }
}
