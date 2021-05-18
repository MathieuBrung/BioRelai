<?php

    final class Grower extends User
    {
        private $_growerId;
        private $_growerStreet;
        private $_growerCity;
        private $_growerPostalCode;
        private $_growerCompanyName;
        private $_growerCompanyPresentation;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getGrowerId()
        {
            return $this->_growerId;
        }
        public function setGrowerId($growerId)
        {
            $this->_growerId = $growerId;
        }

        public function getGrowerStreet()
        {
            return $this->_growerStreet;
        }
        public function setGrowerStreet($growerStreet)
        {
            $this->_growerStreet = $growerStreet;
        }

        public function getGrowerCity()
        {
            return $this->_growerCity;
        }
        public function setGrowerCity($growerCity)
        {
            $this->_growerCity = $growerCity;
        }

        public function getGrowerPostalCode()
        {
            return $this->_growerPostalCode;
        }
        public function setGrowerPostalCode($growerPostalCode)
        {
            $this->_growerPostalCode = $growerPostalCode;
        }

        public function getGrowerCompanyName()
        {
            return $this->_growerCompanyName;
        }
        public function setGrowerCompanyName($growerCompanyName)
        {
            $this->_growerCompanyName = $growerCompanyName;
        }

        public function getGrowerCompanyPresentation()
        {
            return $this->_growerCompanyPresentation;
        }
        public function setGrowerCompanyPresentation($growerCompanyPresentation)
        {
            $this->_growerCompanyPresentation = $growerCompanyPresentation;
        }
    }