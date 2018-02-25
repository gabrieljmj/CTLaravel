<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PersonType;

class Person extends Model
{
    /**
     * @var string
     */
    protected $table = 'people';

    /**
     * @var array
     */
    protected $fillable = ['person_type'];

    /**
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * A person can be fisical or legal, so this verifies what it is and returns 
     * all the data from it
     *
     * @return \App\FisicalPerson|\App\LegalPerson
     */
    public function data()
    {
        $model = $this->person_type === PersonType::FISICAL
            ? 'FisicalPerson'
            : 'LegalPerson';

        return $this->hasOne('App\\' . $model, 'person_id');
    }

    public function fisicalPerson()
    {
        return $this->hasOne('App\FisicalPerson', 'person_id');
    }

    public function legalPerson()
    {
        return $this->hasOne('App\LegalPerson', 'person_id');
    }

    public function getData(array $where = [])
    {
        $map = function ($person) {
            return $person->data;
        };

        if (count($where) > 0) {
            return parent::where($where)->get()->map($map);
        }

        return parent::all()->map($map);
    }

    public function delete()
    {
        $this->data->delete();

        return parent::delete();
    }
}
