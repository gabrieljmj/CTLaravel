<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\{Person, PersonType, FisicalPerson, LegalPerson};

class PersonRequestValidatorService
{
    /**
     * Validates the request to register a person
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|boolean
     */
    public function validate(Request $request)
    {
        $errorResponse = ['success' => false];

        // Looks for empty fields
        foreach ($request->all() as $input => $value) {
            // 'Complement' field may be empty
            if ($input !== 'complement' && trim($value) === '') {
                return $this->getErrorJsonData('Campos obrigatórios não podem estar vazios!');
            }
        }

        if ($request->input('person_type') && ($personType = $request->input('person_type')) !== PersonType::FISICAL
            && $personType !==  PersonType::LEGAL) {
            return $this->getErrorJsonData('Tipo de pessoa inválido');
        }

        // If it is a fisical person, verifies if is at least 19 years old
        // and validates the CPF
        if ($request->input('person_type') === PersonType::FISICAL) {
            $birthday = new \DateTime($request->input('birthday'));
            $now = new \DateTime();

            if ($now->diff($birthday)->y < 19) {
                return $this->getErrorJsonData('É necessário ter pelo menos 19 anos!');
            }

            $validator = \Validator::make(['cpf' => $request->input('cpf')], ['cpf' => 'required']);

            if ($validator->fails()) {
                return $this->getErrorJsonData('CPF inválido!');
            }
        }

        return true;
    }

    /**
     * Validates request for new entries
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|boolean
     */
    public function validateCreation(Request $request)
    {
        if (is_array($firstValidation = $this->validate($request))) {
            return $firstValidation;
        }

        if ($request->input('person_type') === PersonType::FISICAL) {
            if (FisicalPerson::where('cpf', $request->input('cpf'))->get()) {
                return $this->getErrorJsonData('CPF já cadastrado!');
            }
        } else {
            if (LegalPerson::where('cnpj', $request->input('cnpj'))->get()) {
                return $this->getErrorJsonData('CNPJ já cadastrado!');
            }
        }

        return true;
    }

    private function getErrorJsonData($message)
    {
        return ['success' => false, 'message' => $message];
    }
}
