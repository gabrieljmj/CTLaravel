<?php
namespace App\Http\Controllers\Person;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\{Person, PersonType, FisicalPerson, LegalPerson};

/**
 * This API can be used both user and this own app
 */
class PersonApiController extends Controller
{
    /**
     * Creates a person fisical or legal
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        // Validates the request (CPF, age, etc)
        // If fails, returns a JSON response with an error
        if (is_array(($validate = app('App\Services\PersonRequestValidatorService')
            ->validateCreation($request)))) {
            return response()->json($validate);
        }

        $person = new Person();
        $personType = $request->input('person_type');
        $person->person_type = $personType;
        $person->save();

        $personData = $request->all();
        unset($personData['person_type']);

        // Creates a fisical or legal person model
        $personDataModel = $personType === PersonType::FISICAL
            ? new FisicalPerson($personData)
            : new LegalPerson($personData);

        $person->data()->save($personDataModel);

        return response()->json(['success' => true]);
    }

    /**
     * If the id parameter is not null, returns especific person
     * if not, all people
     *
     * @param \Illuminate\Http\Request $request
     * @param int|null                 $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function read(Request $request, $id = null): JsonResponse
    {
        $result = $id ? Person::find($id)->data : (new Person)->getData();

        return response()->json($result);
    }

    public function readFisical(): JsonResponse
    {
        $result = (new Person)->getData(['person_type' => 'fisical']);

        return response()->json($result);
    }

    public function readLegal(): JsonResponse
    {
        $result = (new Person)->getData(['person_type' => 'legal']);

        return response()->json($result);
    }

    /**
     * Updates the informations of a person
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        if (is_array(($validate = app('App\Services\PersonRequestValidatorService')
            ->validate($request)))) {
            return response()->json($validate);
        }

        $data = $request->all();
        unset($data['id']);
        
        $person = Person::find($request->input('id'))
            ->data->update($data);

        return response()->json(['success' => true]);
    }

    /**
     * Deletes the informations of a person
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request): JsonResponse
    {
        $delete = Person::find($request->input('id'))->delete();

        return response()->json(['success' => $delete]);
    }
}
