<?php

namespace Noesis\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Noesis\Http\Requests;
use Log;
use Noesis\Contact;

class ContactsController extends Controller
{
     /**
     * Store a new contact details.
     *
     * @param  Request  $request
     * @return Response view with params
     */
    public function store(Request $request)
    {
        try{

        	//Validation conditions for the Form
	        $validator = Validator::make($request->all(), [
	            'first_name' => 'required|max:255',
	            'last_name' => 'required|max:255',
	            'email' => 'email|max:255|unique:users',
	            'mobile_number' => 'max:10|regex:/[0-9]{10}/',
	            'landline_number' => 'max:11|regex:/[0-9]{11}/',
	        ]);

	        if ($validator->fails()) {//Invalid Form

	            return redirect('/add-contacts')
	                        ->withErrors($validator)
	                        ->withInput();

	        } else { //Valid Form
	        	
	        	$data = $request->all();
	        	if (!empty($data['image'])) {

	        		# If Image is available.
	        		$destination = 'uploads/photos/'; // your upload folder
					$image       = $request->file('image');
					$filename    = $image->getClientOriginalName(); // get the filename
					$image->move($destination, $filename); // move file to destination
					Contact::create([
			            'first_name' => $data['first_name'],
			            'middle_name' => $data['middle_name'],
			            'last_name' => $data['last_name'],
			            'email' => $data['email'],
			            'mobile_number' => $data['mobile_number'],
			            'landline_number' => $data['landline_number'],
			            'notes' => $data['notes'],
			            'image' => '/public/uploads/photos/'.$filename
			        ]);

	        	} else {

	        		# If Image is not available
	        		Contact::create([
			            'first_name' => $data['first_name'],
			            'middle_name' => $data['middle_name'],
			            'last_name' => $data['last_name'],
			            'email' => $data['email'],
			            'mobile_number' => $data['mobile_number'],
			            'landline_number' => $data['landline_number'],
			            'notes' => $data['notes'],
			            'image' => ''
			        ]);

	        	}

		        return redirect('/add-contacts')->with('status', 'Contact Details Added successfully!!');
	        }

          } catch (\Exception $e) {

            return view('addContact')->withErrors(['notSave' => $e->getMessage()]);

        }

    }

     /**
     * show all contacts.
     *
     * @param  Request  $request
     * @return Response view with DATA
     */
    public function show(Request $request)
    {
        try {

        	$contacts = Contact::all();
        	$url = $_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?');
           	return view('home')
           			->with('all_contacts', $contacts)
           			->with('baseurl',$url)
           			->with('status', 'Contact Details Added successfully!!');

        } catch (\Exception $e) {

            return view('home')->withErrors(['notSave' => $e->getMessage()]);

        }

    }
}
