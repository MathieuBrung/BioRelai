<?php

    abstract class OrderedStatus
    {
        use Hydrate;

        protected $_OSCode;
        protected $_OSName;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getOSCode()
        {
            return $this->_OSCode;
        }
        public function setOSCode($OSCode)
        {
            $this->_OSCode = $OSCode;
        }

        public function getOSName()
        {
            return $this->_OSName;
        }
        public function setOSName($OSName)
        {
            $this->_OSName = $OSName;
        }
    }