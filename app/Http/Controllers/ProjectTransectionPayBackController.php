<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Transection;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TransectionRequest;

class ProjectTransectionPayBackController extends Controller
{
    public function storePayBack(TransectionRequest $request,Project $project,Transection $transection)
    {
        $transection->status = 'tamamlandı';
        $transection->update();

        $data = $request->validated();
        $transection = Transection::create([
            'project_id' => $project->id,
            'category_id' => null,
            'payer' => Auth::user()->name,
            'status' => 'tamamlandı',
            'price' => $data['price'],
            'is_income' => $data['is_income'],
            'is_completed' => $data['is_completed'],
            'type' => $data['type'],
        ]);

        if($data['type'] == 'Ödeme'){
            $project->user->balance = $project->user->balance + $transection->price;
            $project->user->update();
        }

        return redirect()->route('admin.project.show',$project)->with('success', 'Transection created successfully');
    }


}
