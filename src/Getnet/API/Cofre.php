<?php

namespace Getnet\API;

/**
 * Class Cofre
 *
 * @package Getnet\API
 */
class Cofre implements \JsonSerializable
{

    private $number_token;
    private $brand;
    private $cardholder_name;
    private $expiration_month;
    private $expiration_year;
    private $customer_id;
    private $cardholder_identification;
    private $verify_card = false;
    private $security_code;


    /**
     *
     * @return string
     */
    public function toJSON()
    {

        $vars = get_object_vars($this);
        $vars_clear = array_filter($vars, function ($value) {
            return null !== $value;
        });

        return json_encode($vars_clear, JSON_PRETTY_PRINT);
    }

    /**
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        $vars_clear = array_filter($vars, function ($value) {
            return null !== $value;
        });

        return $vars_clear;
    }

    /**
     *
     * @param $tokenCard
     * @return Cofre
     */
    public function setCardInfo(Card $card)
    {
        $this->number_token = $card->getNumberToken();
        $this->brand = $card->getBrand();
        $this->cardholder_name = $card->getCardholderName();
        $this->expiration_month = $card->getExpirationMonth();
        $this->expiration_year = $card->getExpirationYear();
        $this->security_code = $card->getSecurityCode();

        return $this;
    }

    /**
     * @return Cofre
     */
    public function setIdentification($cpf_cnpj)
    {
        $this->cardholder_identification = $cpf_cnpj;
        return $this;
    }

    /**
     * @return Cofre
     */
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
        return $this;
    }

    /**
     * @return Cofre
     */
    public function getCofre()
    {
        return $this->cofre;
    }
}
