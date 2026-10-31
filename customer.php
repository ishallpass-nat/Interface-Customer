<?php
    class customer{
        private string $name;
        private string $email;
        private string $number;
        private string $nik;
        private string $address;
        private string $province;
        private string $city;        // Kota/Kabupaten
        private string $postalCode;
        private string $birthPlace;
        private string $birthDate;
        private string $parentName;

        public function __construct(string $name, 
        string $email, 
        string $number, 
        string $nik,
        string $address,
        string $province,
        string $city,
        string $postalCode,
        string $birthPlace,
        string $birthDate,
        string $parentName)
        {
            $this->name = trim($name);
            $this->email = trim($email);
            $this->number = trim($number);
            $this->nik        = trim($nik);
            $this->address    = trim($address);
            $this->province   = trim($province);
            $this->city       = trim($city);
            $this->postalCode = trim($postalCode);
            $this->birthPlace = trim($birthPlace);
            $this->birthDate  = trim($birthDate);
            $this->parentName = trim($parentName);

        }
        public function getname(){
        return $this->name;

        }
        public function getEmail(){
        return $this->email;

        }
        public function getNumber(){
        return $this->number;

        }
        public function getNik(){
        return $this->nik; 

        }
        public function getAddress(){
        return $this->address; 

        }
        public function getProvince(){ 
        return $this->province; 

        }
        public function getCity(){
        return $this->city; 

        }
        public function getPostalCode(){
        return $this->postalCode; 

        }
        public function getBirthPlace(){
        return $this->birthPlace; 

        }
        public function getBirthDate(){
        return $this->birthDate;
        
        }
        public function getParentName(){
        return $this->parentName;
        }
    }

?>