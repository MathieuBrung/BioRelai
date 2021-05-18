<?php

    class Ordered extends OrderedStatus
    {
        private $_orderId;
        private $_orderDate;
        private $_clientId;

        private array $_orderedLines; //De type OrderedLine

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getOrderId()
        {
            return $this->_orderId;
        }
        public function setOrderId($orderId)
        {
            $this->_orderId = $orderId;
        }

        public function getOrderDate()
        {
            return $this->_orderDate;
        }
        public function setOrderDate($orderDate)
        {
            $this->_orderDate = $orderDate;
        }

        public function getClientId()
        {
            return $this->_clientId;
        }
        public function setClientId($clientId)
        {
            $this->_clientId = $clientId;
        }

        public function getOrderedLine()
        {
            return $this->_orderedLines;
        }
        public function setOrderedLine(array $orderedLines)
        {
            $this->_orderedLines = $orderedLines;
        }
    }