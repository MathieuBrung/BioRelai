<?php

    final class Client extends User
    {
        private $_clientId;

        public function __construct(array $data)
        {
            $this->hydrate($data);
        }

        public function getClientId()
        {
            return $this->_clientId;
        }
        public function setClientId($clientId)
        {
            $this->_clientId = $clientId;
        }
    }