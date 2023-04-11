<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    // Create
    

    public function create(Request $req)
    {
        $validated = $req->validate(['name' => 'required', 'description' => 'required', 'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048', 'status' => 'required', ]);

        // Get the file object from the image input field
        $image = $req->file('image');

        $data = ['name' => $validated['name'], 'description' => $validated['description'], 'image' => $image->getClientOriginalName() , // Store the image filename
        'status' => $validated['status'], ];

        DB::table('products')->insert($data);

        // Move the uploaded file to public directory
        $image->move(public_path('images') , $image->getClientOriginalName());

        return redirect('show')
            ->with('success', 'Product Created Successfully!');
    }

    // Read
    public function read()
    {
        $data = DB::table('products')->get();

        return view('show', ['products' => $data]);
    }

    // Update
    public function showUpdate($id)
    {
        $data = DB::table('products')->where('id', $id)->first();

        return view('edit', ['product' => $data]);
    }
    

    public function update(Request $req, $id)
    {
        $validatedData = $req->validate(['name' => 'required', 'description' => 'required', 'status' => 'required', 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);

        $data = ['name' => $validatedData['name'], 'description' => $validatedData['description'], 'status' => $validatedData['status']];

        if ($req->hasFile('image'))
        {
            $image = $req->file('image');
            $image->move(public_path('images') , $image->getClientOriginalName());
            $data['image'] = $image->getClientOriginalName();
        }

        DB::table('products')
            ->where('id', $id)->update($data);

        return redirect('/show')->with('success', 'Product Updated Successfully!');
    }

    // Delete
    public function delete($id)
    {
        DB::table('products')->where(['id' => $id])->delete();

        return redirect('/show')
            ->with('success', 'Product Deleted Successfully!');
    }

}

