<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Distribution;
use App\Models\Product;
use App\Models\Production;
use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    // add a new branch to a company
    public function add(Request $request){
        $request->validate([
            'name'=>'required',
            'location'=>'required',
            'type'=>'required|in:primary,secondary',
            'company_id'=>['required','numeric'],
            'major_branch_id'=>'numeric'
        ]);
        $mb=Branch::find($request->major_branch_id);
        //adding a secondary branch
        if($request->has('major_branch_id')&&$mb!=null){
            if($mb->company_id!=$request->company_id){
                return 'failed';
            }
            $branch=Branch::create([
                'name'=>$request->name,
                'location'=>$request->location,
                'type'=>$request->type,
                'major_branch_id'=>$request->major_branch_id,
                'company_id'=>$request->company_id
            ]);
            if($branch==null){
                return 'failed';
            }
        }
        //adding a primary branch    
        else{
            $branch=Branch::create([
                'name'=>$request->name,
                'location'=>$request->location,
                'type'=>$request->type,
                'company_id'=>$request->company_id
            ]);
            if($branch==null){
                return 'failed';
            }
        }
        return 'success';
    }
    //produce a product from a primary branch
    public function produce(Request $request){
        $request->validate([
            'branch_id'=>['required','numeric'],
            'quantity'=>['required','numeric'],
            'production_date'=>['required','date'],
            'product_id'=>'numeric',
        ]);
        $id=1;
        $mb=Branch::find($request->branch_id);
        //if the corresponding branch id isn't a primary branch id or the branch doesn't exist return failed
        if($mb==null||$mb->type!='primary'){
            return 'failed';
        }
        //if the Request has a product id 
        else if($request->has('product_id')){
            $id=$request->product_id;
            //making sure that a product with this id exists
            $product=Product::find($id);
            if($product==null)return 'failed';
            Production::create([
                'branch_id'=>$request->branch_id,
                'product_id'=>$request->product_id,
                'quantity'=>$request->quantity,
                'production_date'=>$request->production_date
            ]);
        }else if($request->has('product_name')&&$request->has('product_type')){
                    $product=Product::create([
                        'name'=>$request->product_name,
                        'type'=>$request->product_type
                    ]); 
                    $id=$product->id;
                    Production::create([
                        'branch_id'=>$request->branch_id,
                        'product_id'=>$product->id,
                        'quantity'=>$request->quantity,
                        'production_date'=>$request->production_date
                        ]);
        }else{
            return 'failed';
        }
        //storing the produced products in the repository in case of future distirbutions 
        $repository=Repository::where('branch_id',$request->branch_id)
        ->where('product_id',$id)->first();
        if($repository!=null){
            // dd($repository);
            $repository->quantity=$repository->quantity+$request->quantity;
            $repository->save();
        }else{
                    Repository::create([
                        'product_id'=>$id,
                        'quantity'=>$request->quantity,
                        'branch_id'=>$request->branch_id,
                    ]);
                
        }
        return 'success';
    }
    //get production record 
    public function getProductionRecord(Request $request){
        $request->validate([
            'branch_id'=>['required','numeric'],
            'start_date'=>['required','date'],
            'end_date'=>['required','date']
        ]);
        $branch=Branch::where('id',$request->branch_id)->first();
        if($branch!=null && $branch->major_branch_id==null){
            $record=Production::where('branch_id', $request->branch_id)  
            ->whereBetween('production_date', [$request->start_date, $request->end_date])  
            ->sum('quantity');
            return $record;
        }
        return 'no records found';
    }
    //distirbute products from a major branch to a secondary branch
    public function distirbute(Request $request){
        $request->validate([
            'source_branch'=>['required','numeric'],
            'distination_branch'=>['required','numeric'],
            'quantity'=>['required','numeric'],
            'product_id'=>['required','numeric'],
            'distribution_date'=>['required','date']
        ]);
        $source=Branch::find($request->source_branch);
        $dist=Branch::find($request->distination_branch);
        $product=Product::find($request->product_id);
        if($product!=null&&$dist!=null&&$source!=null){
            if($source->type!='primary'||$source->id!=$dist->major_branch_id||$dist->type!='secondary'||$source->company_id!=$dist->company_id||$request->quantity<=0){
                return 'failed';
            }
            $availableQuantity=Repository::where('branch_id',$source->id)
            ->where('product_id',$product->id)->first();
            if($availableQuantity!=null){
                if($availableQuantity->quantity<$request->quantity){
                    return 'failed';
                }else{
                    $availableQuantity->quantity=$availableQuantity->quantity-$request->quantity;
                    $availableQuantity->save();
                    $distRepository=Repository::where('branch_id',$dist->id)
                    ->where('product_id',$product->id)->first();
                    if($distRepository!=null){
                        $distRepository->quantity=$distRepository->quantity+$request->quantity;
                        $distRepository->save();
                    }else{
                        Repository::create([
                            'branch_id'=>$request->distination_branch,
                            'product_id'=>$request->product_id,
                            'quantity'=>$request->quantity
                        ]);
                    }
                    Distribution::create([
                        'distribution_date'=>$request->distribution_date,
                        'source_branch_id'=>$request->source_branch,
                        'destination_branch_id'=>$request->distination_branch,
                        'product_id'=>$request->product_id,
                        'quantity'=>$request->quantity
                    ]);
                    return 'success';
                }
            }else{
                return 'failed';
            }

        }
        else{
            return 'failed';
        }
    }
}
