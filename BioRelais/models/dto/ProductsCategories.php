<?php

    abstract class ProductsCategories
    {
        use hydrate;

        protected $_PCCode;
        protected $_PCName;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getPCCode()
        {
            return $this->_PCCode;
        }
        public function setPCCode($PCCode)
        {
            $this->_PCCode = $PCCode;
        }

        public function getPCName()
        {
            return $this->_PCName;
        }
        public function setPCName($PCName)
        {
            $this->_PCName = $PCName;
        }
    }