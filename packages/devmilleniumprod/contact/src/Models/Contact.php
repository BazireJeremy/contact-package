<?php

namespace Milleniumprod\Contact\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','email','subject','company','phone','content','status','create_at'
    ];
     /**
     * retourne le Prénom NOM de l'utilisateur
     * PARAM: inverse Prénom NOM par NOM Prénom si true 
     */
    public function getName($inverse = false)
    {
        if($inverse)
        {
            return $this->getLASTNAME().' '.$this->getFirstName();
        }
        return $this->getFirstName(). ' ' .$this->getLASTNAME();
    }
     /**
     * retourne le Prénom de l'utilsateur
     */
    public function getFirstName()
    {
        // On découpe selon les tirets
        $prenoms = explode('-',$this->firstname);
        // si prénom composé 
        if(count($prenoms) > 1)
        {
            // on mets en minuscule les prénoms
            $prenoms = array_map('mb_strtolower',$prenoms);
            // On mets une majuscule à chaque élément
            $prenoms = array_map('ucfirst', $prenoms);
            // On retourne le prénom recomposé
            return implode('-', $prenoms);
        }
        return mb_strtoupper(mb_substr($this->firstname, 0, 1), 'UTF-8') . mb_strtolower(mb_substr($this->firstname, 1), 'UTF-8');
    }
    
    /**
     * retourne le NOM de l'utisateur
     */
    public function getLASTNAME()
    {
        return mb_strtoupper($this->lastname, 'UTF-8');
    }
}
