<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('categories.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryName = $request->get('name');
        $categorySlug = Str::slug($categoryName, '-');

        $categories = new Category();
        $categories->name = $categoryName;
        $categories->slug = $categorySlug;
        $categories->parent_id = $request->get('parent_id');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('image'), $filename);

            list($width, $height) = getimagesize(public_path('image/' . $filename));


            if ($width < 510 || $height < 510 || $width > 1000  || $height > 1000) {
                return redirect()->back()->withInput()->withErrors(['image' => 'Image dimensions must be between 530x530 and 600x600 pixels.']);
            }

            $categories->image = $filename;
        }
        $categories->save();

        return redirect('categories')->with('success', 'Data entered successfully');
    }



    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        $category = Category::whereNull('parent_id')->get();
        return view('categories.edit', ['categories' => $categories, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $categories = Category::find($id);

        $categoryName = $request->get('name');
//        $categorySlug = Str::slug($categoryName, '-');

        $categories->name = $categoryName;
//        $categories->slug = $categorySlug;
//        $categories->url = $request->get('url');

        $categories->parent_id = $request->get('parent_id');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move(public_path('image'), $filename);
            $categories->image = $filename;
        }


        $categories->update();

        return redirect('categories')->with('success', 'Data updated sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getcategory()
    {

        $data = Category::select('*');


        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('parent_id', function ($data) {
                return @$data->parent->name;
            })
            ->addColumn('action', function (Category $category) {

                $actionBtn =
                    '';
                $actionBtn .= '<a  href="' . route('categories.edit', $category->id) . '"  title="Edit User" class="btn btn-sm px-2 job-link" style="color: #fff;background-color: #3DCB3A;border-color: #8ad3d3;margin-left: 1px"> <i class="fa fa-edit"></i> </a>';
                $actionBtn .= '<a  class="btn btn-danger btn-sm px-2" style="color:white; background-color : red;margin-left: 1px"  data-id = "' . $category['id'] . '" id="deletecategorybutton" ><i class="fa fa-trash" ></i></a>';

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function deletecategory(Request $request)
    {
        $category_id = $request->category_id;
        $query = Category::find($category_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'user has deleted']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'wrong']);
        }
    }


    public function parent(Request $request)
    {
        $parent_id = $request->cat_id;
        $subcategories = Category::where('parent_id', $parent_id)->get();
        return response()->json(['subcategories' => $subcategories]);
    }




//    for contact


    public function sendMessage(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone_number' => 'required',
        ]);


        $submission = new Contact();
        $submission->name = $validatedData['name'];
        $submission->email = $validatedData['email'];
        $submission->message = $validatedData['message'];
        $submission->phone_number = $validatedData['phone_number'];
        $submission->save();

        $request->session()->flash('success', 'Message sent successfully!');

        return redirect()->back();
    }




    public function getcontact()
    {

        $data = Contact::select('*');

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('created_at', function (Contact $contact) {
                return Carbon::parse($contact->created_at)->format('Y-m-d H:i:s');
            })
            ->addColumn('action', function (Contact $contact) {

                $actionBtn =
                    '';
                $actionBtn .= '';
                $actionBtn .= '<a  class="btn btn-danger btn-sm px-2" style="color:white; background-color : red;margin-left: 1px"  data-id = "' . $contact['id'] . '" id="deletecontactbutton" ><i class="fa fa-trash" ></i></a>';

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function deletecontact(Request $request)
    {
        $contact_id = $request->contact_id;
        $query = Contact::find($contact_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'user has deleted']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'wrong']);
        }
    }

    public function showSubmissions(Request $request)
    {
        $submissions = Contact::orderBy('created_at', 'desc')->get();
        $successMessage = $request->session()->get('success');
        $request->session()->forget('success');


        return view('Contact.index', compact('submissions', 'successMessage'));
    }


}
