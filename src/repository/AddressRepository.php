<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Address.php';

class AddressRepository extends Repository
{

    public function getAddresses(): ?array
    {
        $db = $this->database->connect();
        $result = [];

        $statement = $db->prepare('
            SELECT * FROM public.address
        ');
        $statement->execute();
        $addresses = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(!$addresses){
            //TODO optional exception
            return null;
        }

        foreach ($addresses as $address) {
            $result[] = new Address(
                $address['country'],
                $address['city'],
                $address['id_address']
            );
        }

        return $result;
    }

    public function getAddress(string $country, string $city): ?Address
    {
        $db = $this->database->connect();

        $statement = $db->prepare('
            SELECT * FROM public.address WHERE country = :country AND city = :city ORDER BY country, city
        ');
        $statement->bindParam(':country', $country, PDO::PARAM_STR);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        $statement->execute();
        $address = $statement->fetch(PDO::FETCH_ASSOC);

        if(!$address){
            //TODO optional exception
            return null;
        }

        return new Address(
            $address['country'],
            $address['city'],
            $address['id_address']
        );
    }

    public function addAddress(Address $address): int
    {
        $db = $this->database->connect();

        $statement = $db->prepare('
        INSERT INTO public.address (country, city) VALUES (?, ?) ON CONFLICT DO NOTHING 
        ');
        $statement->execute([
            $address->getCountry(),
            $address->getCity()
        ]);

        return $db->lastInsertId();
    }

}