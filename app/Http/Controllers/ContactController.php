<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class ContactController extends Controller
{
    protected $database;
    protected $tablename;

    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename = 'contacts';
    }

   public function index(Request $request)
{
    // user ka search query get karo
    $search = $request->input('query');

    if ($search) {
        // agar search hai to fname ke base par filter karo
        $contacts = $this->database->getReference($this->tablename)
            ->orderByChild('fname')
            ->startAt($search)
            ->endAt($search . "\uf8ff")
            ->getValue();
    } else {
        // agar search nahi hai to saare contacts le lo
        $contacts = $this->database->getReference($this->tablename)->getValue();
    }

    // agar null ho to empty array bana do
    $contacts = $contacts ?? [];

    return view('firebase.contact.index', compact('contacts', 'search'));
}



    public function showform()
    {
        return view('firebase.contact.create');
    }

    public function insertdata(Request $request)
    {
        $postData = [
            'fname' => $request->input('first-name'),  // agar form field ka name="first-name"
            'lname' => $request->input('last-name'),      // agar form field ka name="lname"
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ];

        $postRef = $this->database
                        ->getReference($this->tablename)
                        ->push($postData);

        if ($postRef) {
            return redirect('contacts')->with('status', 'Contact added Successfully');
        } else {
            return redirect('contacts')->with('status', 'Contact Not added Successfully');
        }
    }
public function edit($id)
{
    $contact = $this->database->getReference($this->tablename)
                              ->getChild($id)
                              ->getValue();

    if ($contact) {
        return view('firebase.contact.edit', compact('contact','id'));
    }
else{
    return redirect('contacts')->with('status', 'Contact ID not found');
}
}
public function update(Request $request, $id){
      $updateData = [
            'fname' => $request->input('first-name'),  // agar form field ka name="first-name"
            'lname' => $request->input('last-name'),      // agar form field ka name="lname"
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ];

   $updated= $this->database->getReference($this->tablename.'/'.$id) 
    ->update($updateData);
    if($updated){
        return redirect('contacts')->with('status','Contact Updated Successfully');
    }
    else{
       return redirect('contacts')->with('status','Contact NOT Updated Successfully');
  
    }
}

public function delete($id){
   $del= $this->database->getReference($this->tablename.'/'.$id)->remove();
if($del){
return redirect('contacts')->with('status','Contact Deleted Successfully');
}
else{
return redirect('contacts')->with('status','Contact NOT deleted Successfully');
}

}


}

