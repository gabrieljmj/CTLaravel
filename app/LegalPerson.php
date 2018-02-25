<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalPerson extends Model
{
    /**
     * @var string
     */
    protected $table = 'legal_people';

    /**
     * @var array
     */
    protected $fillable = [
        'social_reason', 'fantasy_name', 'cnpj', 'cep',
        'address', 'number', 'complement', 'district',
        'city', 'uf', 'person_id'
    ];

    /**
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @return \App\Person
     */
    public function person()
    {
        return $this->belongsToOne(App\Person::class);
    }
}
