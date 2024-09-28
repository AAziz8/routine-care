<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'category_id' => 'required',
                'time' => 'required',
                'status' => 'required',
                'subcategory_id' => 'nullable|exists:categories,id',
                'price' => 'nullable',
                'name' => 'required',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);



            $product = new Product();
            $product->name = $validatedData['name'];
            $product->slug = Str::slug($validatedData['name'], '-');
            $product->price = $validatedData['price'];
            $product->category_id = $validatedData['category_id'];
            $product->user_id = Auth::id();
            $product->description = $request->get('description');
            $product->time = $validatedData['time'];
            $product->status = $validatedData['status'];
            $product->meta_code = $request->get('meta_code');
            $product->alt = $request->get('alt');
            $product->subcategory_id = $request->input('subcategory_id');

            // Save the product first
            $product->save();

            if ($request->hasfile('images')) {
                $files = $request->file('images');
                $img = [];

                foreach ($files as $file) {
                    if ($file->isValid()) {
                        $filenameWithExt = $file->getClientOriginalName();
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                        $filename = preg_replace("/\s+/", '-', $filename);
                        $extension = $file->getClientOriginalExtension();
                        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                        $destinationPath = public_path('image');
                        $file->move($destinationPath, $fileNameToStore);

                        $img[] = 'image/' . $fileNameToStore;
                    } else {
                        return redirect()->back()->withInput()->withErrors(['images' => 'Invalid image file.']);
                    }
                }

                // Attach the images to the product
                $product->image = json_encode($img);
                $product->save();
            }

            return redirect()->route('products.index')->with('success', 'Product created successfully');
        }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        // Retrieve the images associated with the product and decode them
        $productImages = json_decode($product->image, true);

        $categories = Category::whereNull('parent_id')->get();
        $subcategories = [];

        if ($product->category_id) {
            $subcategories = Category::where('parent_id', $product->category_id)->get();
        }

        $users = User::all();

        return view('products.edit', [
            'product' => $product,
            'productImages' => $productImages,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'users' => $users
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id); // Find the product by ID

        $validatedData = $request->validate([
            'category_id' => 'required',
            'time' => 'required',
            'status' => 'required',
            'subcategory_id' => 'nullable|exists:categories,id',
            'price' => 'nullable',
            'name' => 'required',
        ]);

        // Update the product attributes
        $product->name = $validatedData['name'];
        $product->slug = Str::slug($validatedData['name'], '-');
        $product->price = $validatedData['price'];
        $product->category_id = $validatedData['category_id'];
        $product->time = $validatedData['time'];
        $product->status = $validatedData['status'];
        $product->meta_code = $request->input('meta_code');
        $product->alt = $request->input('alt');
        $product->subcategory_id = $request->input('subcategory_id');
        $product->description = $request->input('description');

        // Save the updated product
        $product->save();

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            $img = []; // Create an array to store the image file paths

            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
                $filename = preg_replace("/\s+/", '-', $filename);
                $extension = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;

                // Ensure the 'image' directory exists
                $destinationPath = public_path('image'); // Use public_path to specify the public directory
                $file->move($destinationPath, $fileNameToStore);

                // Store the image path in the array
                $img[] = 'image/' . $fileNameToStore;
            }

            // Attach the images to the product
            $product->image = json_encode($img);
            $product->save();
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('upload'),$fileName);


            $url = asset('image/'.$fileName);
            return response()->json(['filename' => $fileName , 'uploaded' => 1 , 'url' => $url ]);

        }
    }



    public function getproduct()
    {
        $data = Product::with('category' , 'user')->select('*')->orderBy('created_at' , 'desc');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('category_name', function ($data) {
                return @$data->category->name;
            })
            ->addColumn('user_name', function ($data) {
                return @$data->user->name;
            })
            ->addColumn('action', function (Product $product) {
                $actionBtn = '';
                $actionBtn .= '<a href="' . route('products.edit', $product->id) . '" title="Edit User" class="btn btn-sm px-2 job-link" style="color: #fff;background-color: #3DCB3A;border-color: #8ad3d3;margin-left: 1px"> <i class="fa fa-edit"></i> </a>';
                $actionBtn .= '<a class="btn btn-danger btn-sm px-2" style="color:white; background-color : red;margin-left: 1px"  data-id="' . $product['id'] . '" id="deleteproductbutton"><i class="fa fa-trash"></i></a>';

                return $actionBtn;
            })
            ->filter(function ($query) {
                if (request()->has('search')) {
                    $search = request()->get('search')['value'];
                    $query->where(function ($query) use ($search) {
                        $query->whereHas('category', function ($query) use ($search) {
                            $query->where('name', 'like', '%' . $search . '%');
                        })
                            ->orWhereHas('user', function ($query) use ($search) {
                                $query->where('name', 'like', '%' . $search . '%');
                            })
                            ->orWhere('created_at', 'like', '%' . $search . '%');
                    });
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function deleteproduct(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::find($product_id);

        if ($product) {
            // Delete the associated images
            $product->images()->delete();

            // Delete the product itself
            $product->delete();

            return response()->json(['code' => 1, 'msg' => 'Product and associated images deleted successfully']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Product not found']);
        }
    }




    public function list_product($slug, $id)
    {

        $categoryOrSubcategory = Category::where('slug', $slug)->where('id', $id)->firstOrFail();

        $categoryId = $categoryOrSubcategory->id;

        $data = Product::with('category')
            ->where(function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId)
                    ->orWhere('subcategory_id', $categoryId);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $categories = Category::with('product')->get();

        $category_image = Category::where('slug', $slug)->where('id', $id)->firstOrFail();


        return view('detail.list', ['data' => $data , 'categories' => $categories , 'category_image' => $category_image]);
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $prod = DB::table('products')
            ->where('name', 'like', "%$query%")
            ->orderBy('created_at', 'desc')
            ->paginate(9);

//dd([$query , $products]);

        if ($prod->isNotEmpty()) {
            return view('detail.search', compact('prod'));
        } else {

            return view('detail.search', compact('prod'));
        }
    }



    public function detail($slug) {
        $details = Product::with('category')->where('slug', $slug)->first();

        if ($details) {
            return view('detail.detail', compact('details'));
        } else {
            return "No product";
        }
    }



    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }



    public function filterByPrice(Request $request)
    {
        // Get the minimum and maximum price from the request
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        // Query the products based on the price range
        $filteredProducts = Product::whereBetween('price', [$minPrice, $maxPrice])->get();

        // Return the filtered products as JSON
        return response()->json($filteredProducts);
    }

    public function cart_form(){
        return view('faheem');
    }



    public function countProducts()
    {
        $startDate = Carbon::now()->startOfYear()->month(1); // Start date set to January of the current year
        $endDate = Carbon::now()->endOfYear()->month(12); // End date set to December of the current year

        $postsData = Product::selectRaw('MONTH(time) as month, COUNT(*) as total_posts')
            ->whereBetween('time', [$startDate, $endDate])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $totalPosts = [];

        // Prepare the data for the chart
        for ($month = 1; $month <= 12; $month++) {
            $monthName = Carbon::create(null, $month, null)->format('F');
            $months[] = $monthName;

            $matchingData = $postsData->firstWhere('month', $month);
            $totalPosts[] = $matchingData ? $matchingData->total_posts : 0;
        }

        return response()->json([
            'months' => $months,
            'totalPosts' => $totalPosts,
        ]);
    }


    public function getPostsData()
    {
        $postsData = Product::selectRaw('YEAR(created_at) as year, COUNT(*) as count')
            ->groupBy('year')
            ->get();

        return response()->json($postsData);
    }



}
