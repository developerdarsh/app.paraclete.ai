<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\GiftCard;
use App\Models\GiftCardUsage;
use App\Models\GiftCardTransfer;
use App\Models\User;
use DataTables;

class FinanceGiftCardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $data = GiftCard::orderBy('created_at', 'DESC')->get();        
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $actionBtn = '<div>                                            
                                        <a href="'. route("admin.finance.gifts.show", $row["id"] ). '"><i class="fa-solid fa-file-invoice-dollar table-action-buttons edit-action-button" title="'. __('View Gift Card') .'"></i></a>
                                        <a href="'. route("admin.finance.gifts.edit", $row["id"] ). '"><i class="fa-solid fa-file-pen table-action-buttons view-action-button" title="'. __('Update Gift Card') .'"></i></a>
                                        <a class="deleteButton" id="'. $row["id"] .'" href="#"><i class="fa-solid fa-trash-xmark table-action-buttons delete-action-button" title="'. __('Delete Gift Card') .'"></i></a>
                                    </div>';
                        return $actionBtn;
                    })
                    ->addColumn('created-on', function($row){
                        $created_on = '<span>'.date_format($row["created_at"], 'M d Y').'</span><br><span class="text-muted">'.date_format($row["created_at"], 'H:i A').'</span>';
                        return $created_on;
                    })
                    ->addColumn('valid-until', function($row){
                        $created_on = '<span>'.date_format($row["valid_until"], 'M d Y').'</span><br><span class="text-muted">'.date_format($row["valid_until"], 'H:i A').'</span>';
                        return $created_on;
                    })
                    ->addColumn('custom-code', function($row){
                        $name = '<span class="font-weight-bold text-info">'.$row['code'].'</span>';
                        return $name;
                    })
                    ->addColumn('custom-value', function($row){
                        $name = '<span class="font-weight-bold">'.$row['amount']. config('payment.default_system_currency') . '</span>';
                        return $name;
                    })
                    ->addColumn('custom-status', function($row){
                        $status = ($row['status']) ? 'active' : 'inactive';
                        $custom_priority = '<span class="cell-box gift-'.strtolower($status).'">'.ucfirst($status).'</span>';
                        return $custom_priority;
                    })
                    ->rawColumns(['actions', 'custom-status', 'custom-code', 'created-on', 'valid-until', 'custom-value'])
                    ->make(true);
                    
        }

        $cards = GiftCard::all()->count();
        $active = GiftCard::where('status', true)->count();
        $redeemed = GiftCardUsage::all()->count();
        $funds = GiftCardUsage::sum('amount');

        $total = [];
        $total['cards'] = $cards;
        $total['active'] = $active;
        $total['redeemed'] = $redeemed;
        $total['funds'] = $funds;



        return view('admin.finance.gifts.finance_gift_index', compact('total'));
    }


    public function redeemed(Request $request)
    {
        if ($request->ajax()) {
            $data = GiftCardUsage::orderBy('created_at', 'DESC')->get();        
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $actionBtn = '<div>                                       
                                        <a class="deleteUsageButton" id="'. $row["id"] .'" href="#"><i class="fa-solid fa-trash-xmark table-action-buttons delete-action-button" title="'. __('Delete Record') .'"></i></a>
                                    </div>';
                        return $actionBtn;
                    })
                    ->addColumn('created-on', function($row){
                        $created_on = '<span>'.date_format($row["created_at"], 'M d Y').'</span><br><span class="text-muted">'.date_format($row["created_at"], 'H:i A').'</span>';
                        return $created_on;
                    })
                    ->addColumn('user', function($row){
                        $user = '<div class="d-flex">
                                <div class="widget-user-name"><span class="font-weight-bold">'. $row['username'] .'</span> <br> <span class="text-muted">'.$row["email"].'</span></div>
                            </div>';                        
                        
                        return $user;
                    })
                    ->addColumn('custom-code', function($row){
                        $name = '<span class="font-weight-bold text-info">'.$row['code'].'</span>';
                        return $name;
                    })
                    ->addColumn('custom-value', function($row){
                        $name = '<span class="font-weight-bold">'.$row['amount']. config('payment.default_system_currency') . '</span>';
                        return $name;
                    })
                    ->addColumn('custom-status', function($row){
                        $status = ($row['status']) ? 'redeemed' : 'failed';
                        $custom_priority = '<span class="cell-box gift-'.strtolower($status).'">'.ucfirst($status).'</span>';
                        return $custom_priority;
                    })
                    ->rawColumns(['actions', 'custom-status', 'custom-code', 'created-on', 'custom-value', 'user'])
                    ->make(true);
                    
        }
    }


    public function transfer(Request $request)
    {
        if ($request->ajax()) {
            $data = GiftCardTransfer::orderBy('created_at', 'DESC')->get();        
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('actions', function($row){
                        $actionBtn = '<div>                                       
                                        <a href="'. route("admin.finance.gifts.transfer.show", $row["id"] ). '"><i class="fa-solid fa-file-invoice-dollar table-action-buttons edit-action-button" title="'. __('View Record') .'"></i></a>
                                    </div>';
                        return $actionBtn;
                    })
                    ->addColumn('created-on', function($row){
                        $created_on = '<span>'.date_format($row["created_at"], 'M d Y').'</span><br><span class="text-muted">'.date_format($row["created_at"], 'H:i A').'</span>';
                        return $created_on;
                    })
                    ->addColumn('sender', function($row){
                        $user = '<div class="d-flex">
                                <div class="widget-user-name"><span class="font-weight-bold">'. $row['sender_username'] .'</span> <br> <span class="text-muted">'.$row["sender_email"].'</span></div>
                            </div>';                        
                        
                        return $user;
                    })
                    ->addColumn('receiver', function($row){
                        $user = '<div class="d-flex">
                                <div class="widget-user-name"><span class="font-weight-bold">'. $row['receiver_username'] .'</span> <br> <span class="text-muted">'.$row["receiver_email"].'</span></div>
                            </div>';                        
                        
                        return $user;
                    })
                    ->addColumn('custom-value', function($row){
                        $name = '<span class="font-weight-bold">'.$row['amount']. config('payment.default_system_currency') . '</span>';
                        return $name;
                    })
                    ->addColumn('custom-status', function($row){
                        $status = ($row['status']) ? 'transfered' : 'failed';
                        $custom_priority = '<span class="cell-box gift-'.strtolower($status).'">'.ucfirst($status).'</span>';
                        return $custom_priority;
                    })
                    ->rawColumns(['custom-status', 'created-on', 'custom-value', 'sender', 'receiver', 'actions'])
                    ->make(true);
                    
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.finance.gifts.finance_gift_create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'name' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'valid-until' => 'required',
        ]);

       
        for ($j=0; $j < request('total'); $j++) { 

            $date = date("Y-m-d H:i:s", strtotime(request('valid-until')));
            $valid_until = Carbon::createFromDate($date);

            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $code = '';
            
            // Generate first segment (5 chars)
            for ($i = 0; $i < 5; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }
            
            $code .= '-';
            
            // Generate second segment (5 chars)
            for ($i = 0; $i < 5; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }
            
            $code .= '-';
            
            // Generate third segment (5 chars)
            for ($i = 0; $i < 5; $i++) {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }

            GiftCard::create([
                'name' => request('name'),
                'code' => $code,
                'amount' => request('amount'),
                'status' => request('status') == 'active' ? 1 : 0,
                'reusable' => request('usage'),
                'usages_left' => request('quantity'),
                'details' => request('notes'),
                'valid_until' => $valid_until
            ]);
        }
                         
        toastr()->success(__('New gift cards has been created successfully'));
        return redirect()->route('admin.finance.gifts');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GiftCard $id)
    {   
        return view('admin.finance.gifts.finance_gift_show', compact('id'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTransfer(GiftCardTransfer $id)
    {   
        $sender = User::where('id', $id->sender_user_id)->first();
        $receiver = User::where('id', $id->receiver_user_id)->first();
        return view('admin.finance.gifts.finance_gift_transfer_show', compact('id', 'sender', 'receiver'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftCard $id)
    {
        return view('admin.finance.gifts.finance_gift_edit', compact('id'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GiftCard $id)
    {
        request()->validate([
            'name' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'quantity' => 'required',
            'valid-until' => 'required',
        ]);

        $date = date("Y-m-d H:i:s", strtotime(request('valid-until')));
        $valid_until = Carbon::createFromDate($date);

        $id->update([
            'name' => request('name'),
            'amount' => request('amount'),
            'status' => request('status') == 'active' ? 1 : 0,
            'reusable' => request('usage'),
            'usages_left' => request('quantity'),
            'details' => request('notes'),
            'valid_until' => $valid_until
        ]);

        $id->save();

        toastr()->success(__('Selected gift card has been updated successfully'));
        return redirect()->route('admin.finance.gifts');
    }


    public function delete(Request $request)
    {   
        if ($request->ajax()) {

            $plan = GiftCard::find(request('id'));

            if($plan) {

                $plan->delete();

                return response()->json('success');

            } else{
                return response()->json('error');
            } 
        } 
    }


    public function deleteRedeemed(Request $request)
    {   
        if ($request->ajax()) {

            $plan = GiftCardUsage::find(request('id'));

            if($plan) {

                $plan->delete();

                return response()->json('success');

            } else{
                return response()->json('error');
            } 
        } 
    }
}
