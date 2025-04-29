<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'phone',
        'email',
        'city',
        'province',
        'current_status',
        'education_level',
        'field_of_study',
        'motivation',
        'previously_participated',
        'hear_about_us',
        'receive_newsletter',
        'interests',
        'cv_path',
        'cin_path',
        'motivation_letter_path',
        'data_consent',
        'values_consent',
        'registration_date',
        'status',
        'has_paid', 
        'current_status_other',
'other_interest',
'previous_participation_details',
'project_idea',
'newsletter_preference',

    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'interests' => 'array',
        'hear_about_us' => 'array',
        'previously_participated' => 'boolean',
        'receive_newsletter' => 'boolean',
        'data_consent' => 'boolean',
        'values_consent' => 'boolean'
    ];

    // Options pour les selects
    public static function genderOptions()
    {
        return [
            'male' => 'Male',
            'female' => 'Female',
            'other' => 'Other',
            'prefer_not_to_say' => 'Prefer not to say'
        ];
    }

    public static function currentStatusOptions()
    {
        return [
            'student' => 'Student',
            'graduate_seeking_employment' => 'Graduate seeking employment',
            'employee' => 'Employee',
            'entrepreneur' => 'Entrepreneur',
            'other' => 'Other'
        ];
    }

    public static function educationLevelOptions()
    {
        return [
            'no_diploma' => 'No diploma',
            'middle_school' => 'Middle school level',
            'high_school' => 'High school diploma (Baccalaureate)',
            'bac_plus_2' => 'Bac+2 (DEUG, BTS, DUT, etc.)',
            'bachelor' => 'Bachelor\'s degree / Bac+3',
            'master' => 'Master\'s degree / Bac+5',
            'phd' => 'PhD',
            'other' => 'Other'
        ];
    }

    public static function interestOptions()
    {
        return [
            'personal_development' => 'Personal development / Soft skills',
            'professional_training' => 'Professional training',
            'job_search' => 'Job search / Career integration',
            'business_creation' => 'Business creation',
            'community_projects' => 'Community projects',
            'environment' => 'Environment / Sustainable development',
            'other' => 'Other'
        ];
    }

    public static function hearAboutUsOptions()
    {
        return [
            'social_media' => 'Social media (Facebook, Instagram...)',
            'friend_referral' => 'Referred by a friend',
            'poster' => 'Poster or flyer',
            'event' => 'During an event',
            'other' => 'Other'
        ];
    }

    // Accessors
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getAgeAttribute()
    {
        return $this->date_of_birth?->age;
    }

    // Scopes
    public function scopeStudents($query)
    {
        return $query->where('current_status', 'student');
    }

    public function scopeWithConsent($query)
    {
        return $query->where('data_consent', true)
                    ->where('values_consent', true);
    }

    // Relations (si nécessaire)
    // public function projects()
    // {
    //     return $this->hasMany(Project::class);
    // }


    

}
