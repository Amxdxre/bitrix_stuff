<?php

namespace amadare\example\controller;

use amadare\example\entity\PerfumeTable;

class PerfumeRepository
{
    public function getById(int $id)
    {
        $result = PerfumeTable::getById($id);
        if (empty($result)) {
            throw new \Exception('Элемент по ID не обнаружен.');
        };
        return $result;
    }

    public function delete(int $id)
    {
        $deleteResult = PerfumeTable::delete($id);
        $isSuccess = $deleteResult->isSuccess();
        if (!$isSuccess) {
            throw new \Exception('Элемент не удалось удалить. (Ты хуйло)');
        }
        return true;
    }

    public function update(int $id, ?string $producer = null, ?string $name = null, ?float $value = null, ?float $price = null, ?string $producerCountry = null)
    {
        $data = array();
        if (!empty($producer)) {
            $data['PRODUCER'] = $producer;
        }
        if (!empty($name)) {
            $data['NAME'] = $name;
        }
        if (!empty($producerCountry)) {
            $data['PRODUCER_COUNTRY'] = $producerCountry;
        }
        if (!empty($value)) {
            $data['VALUE'] = $value;
        }
        if (!empty($price)) {
            $data['PRICE'] = $price;
        }
        $updateResult = PerfumeTable::update($id, $data);
        if (!$updateResult->isSuccess()) {
            throw new \Exception('Не удалось обновить поля.');
        }
        return $updateResult->getId();
    }

    public function create(string $producer, string $name, float $value, float $price, ?string $producerCountry = null)
    {
        $addResult = PerfumeTable::add(array('fields' => array(
            'PRODUCER' => $producer,
            'NAME' => $name,
            'PRODUCER_COUNTRY' => $producerCountry,
            'VALUE' => $value,
            'PRICE' => $price
        )));

        if (!empty($addResult->getErrors())) {
            throw new \Exception('Не удалось создать.');
        }
        return $addResult->getId();
    }

}