<?php

namespace App\Controllers;

use App\Models\ContactModel;

class Contact extends BaseController
{
    protected $contactModel;
	public function __construct()
	{
		$this->contactModel = new ContactModel();
	}

    public function create()
    {
        // pass validation method for filling the form
        $data['validation'] = \Config\Services::validation();
        // return to create form
        return view('contact/create', $data);
    }

    public function save()
    {
        // all validation criteria is set within here
        // Check for if form validate any criteria
        if(!$this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'contact'=> [
                    'rules' => 'required|is_unique[contacts.contact]|numeric',
                    'errors' => [
                        'required' => 'The {field} field is required.',
                        'is_unique' => 'The {field} number have already existed.',
                        'numeric' => 'The contact field must contain only numbers.'
                    ]
                ]
        ])) {
            // return message errors for validation
            $validation = \Config\Services::validation();
            return redirect()->to('/create')->withInput()->with('validation', $validation);
        }
        // if no invalid information proceed to save contact information into contacts table
        $this->contactModel->save([
            'name' => $this->request->getVar('name'),
            'contact' => $this->request->getVar('contact'),
        ]);
        // send session to homepage in notifying the create method is succesfull
        session()->setFlashdata('message', 'Contact number have been created');

        return redirect('/');
    }

    public function edit($id)
    {
        // pass validation method for filling the form
        // pass in information about the contact being edited
        $data = [
            'validation' => \Config\Services::validation(),
            'contact' => $this->contactModel->getContacts($id),
        ];

        return view('contact/edit', $data);
    }

    public function update($id)
    {
        // get information about a specific contact
        $oldContact = $this->contactModel->getContacts($id);
        // check if the same contact number was inserted 
        if($oldContact['contact'] == $this->request->getVar('contact')) {
            // true: update this rule
            $contact_rule = 'required';
        } else {
            // false: update this rule
            $contact_rule = 'required|is_unique[contacts.contact]|numeric';
        }

         // all validation criteria is set within here
        // Check for if form validate any criteria
        // can update name without changing the contact because of the new rule created
        if(!$this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
            'contact'=> [
                    'rules' => $contact_rule,
                    'errors' => [
                        'required' => 'The {field} field is required.',
                        'is_unique' => 'The {field} number have already existed.',
                        'numeric' => 'The contact field must contain only numbers.'
                    ]
                ]
        ])) {
             // return message errors for validation
            $validation = \Config\Services::validation();
            return redirect()->to('/edit/' . $id)->withInput()->with('validation', $validation);
        }
        // if no invalid information proceed to update contact information into contacts table
        $this->contactModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'contact' => $this->request->getVar('contact'),
        ]);
        // send session to homepage in notifying the update method is succesfull
        session()->setFlashdata('message', 'Contact number have been edited');

        return redirect('/');
    }

    public function delete($id)
    {
        // find the contact based on id and delete it
        $this->contactModel->delete($id);
        // send session to homepage in notifying the delete method is succesfull
        session()->setFlashdata('message', 'Contact number have been deleted');

        return redirect('/');
    }
}
