<?php

namespace App\Http\Controllers;

use App\Models\InventoryApproval; // Assuming you have a model for inventory approvals
use Illuminate\Http\Request;

class InventoryApprovalController extends Controller
{
    // View all pending inventory updates
    public function index()
    {
        // Fetch pending inventory update requests from the database
        $requests = InventoryApproval::where('status', 'pending')->get();
        
        // Return the view with the requests data
        return view('inventory-approvals.index', compact('requests'));
    }

    // Approve an inventory update request
    public function approve(InventoryApproval $request)
    {
        // Update the status of the request to 'approved'
        $request->update(['status' => 'approved']);
        
        // Redirect back with a success message
        return redirect()->route('inventory-approvals.index')->with('success', 'Inventory update approved.');
    }

    // Reject an inventory update request
    public function reject(InventoryApproval $request)
    {
        // Update the status of the request to 'rejected'
        $request->update(['status' => 'rejected']);
        
        // Redirect back with a success message
        return redirect()->route('inventory-approvals.index')->with('success', 'Inventory update rejected.');
    }
}
