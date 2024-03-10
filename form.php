<?php
class Form{
    public $nom;
    public $mail;
    public $adr;
    public $num;
    public $age;
    public $ed;
    public $exp;
    public $skills;
    public $lang;
    public $target_file;
    

    public function __construct($nom,$mail,$adr,$num,$age,$ed,$exp,$skills,$lang,$target_file){
        $this->nom=$nom;
        $this->mail=$mail;
        $this->adr=$adr;
        $this->num=$num;
        $this->age=$age;
        $this->ed=$ed;
        $this->exp=$exp;
        $this->skills=$skills;
        $this->lang=$lang;
        $this->target_file=$target_file;
    }
}
?>