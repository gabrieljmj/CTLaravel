<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class FisicalPerson extends Model
{
    /**
     * @var string
     */
    protected $table = 'fisical_people';

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'birthday', 'cpf', 'cep',
        'address', 'number', 'complement', 'district', 'city',
        'uf', 'person_id'
    ];

    /**
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    protected $primaryKey = 'person_id';

    /**
     * @return \App\Person
     */
    public function person()
    {
        return $this->belongsTo(\App\Person::class);
    }
}
