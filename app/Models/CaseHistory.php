<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseHistory extends Model
{
    protected $fillable = [
        'lawyer_id',
        'case_description',
        'filing_date',
        'registration_date',
        'hearing_date',
        'status',
    ];

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }

}
