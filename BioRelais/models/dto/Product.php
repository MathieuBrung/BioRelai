<?php

    class Product extends ProductsCategories
    {
        private $_productsId;
        private $_productsName;
        private $_productsPresentation;
        private $_productsTVA;
        private $_growerId;
        private $_SLQuantity;
        private $_SLUnitPrice;
        private $_SLProductUnit;
        private $_saleId;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getProductsId()
        {
            return $this->_productsId;
        }
        public function setProductsId($productsId)
        {
            $this->_productsId = $productsId;
        }

        public function getProductsName()
        {
            return $this->_productsName;
        }
        public function setProductsName($productsName)
        {
            $this->_productsName = $productsName;
        }

        public function getProductsPresentation()
        {
            return $this->_productsPresentation;
        }
        public function setProductsPresentation($productsPresentation)
        {
            $this->_productsPresentation = $productsPresentation;
        }

        public function getProductsTVA()
        {
            return $this->_productsTVA;
        }
        public function setProductsTVA($productsTVA)
        {
            $this->_productsTVA = $productsTVA;
        }


        public function getGrowerId()
        {
            return $this->_growerId;
        }
        public function setGrowerId($growerId)
        {
            $this->_growerId = $growerId;
        }

        public function getSLQuantity()
        {
            return $this->_SLQuantity;
        }
        public function setSLQuantity($SLQuantity)
        {
            $this->_SLQuantity = $SLQuantity;
        }

        public function getSLUnitPrice()
        {
            return $this->_SLUnitPrice;
        }
        public function setSLUnitPrice($SLUnitPrice)
        {
            $this->_SLUnitPrice = $SLUnitPrice;
        }

        public function getSLProductUnit()
        {
            return $this->_SLProductUnit;
        }
        public function setSLProductUnit($SLProductUnit)
        {
            $this->_SLProductUnit = $SLProductUnit;
        }

        public function getSaleId()
        {
            return $this->_saleId;
        }
        public function setSaleId($saleId)
        {
            $this->_saleId = $saleId;
        }

    }