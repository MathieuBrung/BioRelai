<?php

    class OrderedLine
    {
        use Hydrate;

        private $_OLQuantity;
        private $_OLPrice;
        private $_OLDiscount = 0;
        private $_productsId;
        private $_saleId;
        private $_orderId;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getOLQuantity()
        {
            return $this->_OLQuantity;
        }
        public function setOLQuantity($OLQuantity)
        {
            $this->_OLQuantity = $OLQuantity;
        }

        public function getOLPrice()
        {
            return $this->_OLPrice;
        }
        public function setOLPrice($OLPrice)
        {
            $this->_OLPrice = $OLPrice;
        }

        public function getOLDiscount()
        {
            return $this->_OLDiscount;
        }
        public function setOLDiscount($OLDiscount)
        {
            $this->_OLDiscount = $OLDiscount;
        }

        public function getProductsId()
        {
            return $this->_productsId;
        }
        public function setProductsId($productsId)
        {
            $this->_productsId = $productsId;
        }

        public function getSaleId()
        {
            return $this->_saleId;
        }
        public function setSaleId($saleId)
        {
            $this->_saleId = $saleId;
        }

        public function getOrderId()
        {
            return $this->_orderId;
        }
        public function setOrderId($orderId)
        {
            $this->_orderId = $orderId;
        }
    }