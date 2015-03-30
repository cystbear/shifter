<?php

namespace Sleepness;

class Shifter
{
    public function fromDto($dto, $domain)
    {
        $domainFiller = function($domainObject, $dto) {
            $fetcher = function($object) {
                $setter = function($name, $value) {
                    if (property_exists($this, $name)) {
                        $this->$name = $value;
                    }
                };

                return $setter->bindTo($object, $object);
            };
            $transmitter = function(\Closure $setter, $dto) {
                foreach(get_object_vars($dto) as $name => $value) {
                    $setter($name, $value);
                }
            };
            $transmitter($fetcher($domainObject), $dto);

            return $domainObject;
        };

        return $domainFiller($domain, $dto);
    }

    public function toDto($domain, $dto)
    {
        $dtoFiller = function($domainObject, $dto) {
            $fetcher = function($object) {
                $getter = function() {
                    return get_object_vars($this);
                };

                return $getter->bindTo($object, $object);
            };
            $transmitter = function(\Closure $getter, $dto) {
                foreach ($getter() as $property => $value) {
                    if (property_exists($dto, $property)) {
                        $dto->$property = $value;
                    }
                }

                return $dto;
            };

            return $transmitter($fetcher($domainObject), $dto);
        };

        return $dtoFiller($domain, $dto);
    }
}
