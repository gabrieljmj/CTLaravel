<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Person, PersonType};

/**
 * The application main controller
 */
class AppController extends Controller
{
    /**
     * Homepage with the list of people
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fisicalPeople = [];
        $legalPeople = [];

        foreach (Person::where('person_type', PersonType::FISICAL)->get() as $person) {
            $fisicalPeople[] = $person->data;
        }

        foreach (Person::where('person_type', PersonType::LEGAL)->get() as $person) {
            $legalPeople[] = $person->data;
        }

        return view('index', [
            'fisicalPeople' => $fisicalPeople,
            'legalPeople' => $legalPeople
        ]);
    }

    /**
     * Page to register person
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Update person data
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $person = \App\Person::find($id);

        return view('people.edit', [
            'person_type' => $person->person_type,
            'person' => $person->data,
            'id' => $id
        ]);
    }
}
