<?php declare(strict_types=1);

namespace kornrunner\Serializer;

use ricco381\Ecc\Crypto\Key\PrivateKeyInterface;
use ricco381\Ecc\Primitives\Point;
use ricco381\Ecc\Serializer\PrivateKey\PrivateKeySerializerInterface;

class HexPrivateKeySerializer implements PrivateKeySerializerInterface
{
    protected $generator;

    public function __construct(Point $generator) {
        $this->generator = $generator;
    }

    public function serialize(PrivateKeyInterface $key): string {
        return gmp_strval($key->getSecret(), 16);
    }

    public function parse(string $formattedKey): PrivateKeyInterface {
        $key = gmp_init($formattedKey, 16);

        return $this->generator->getPrivateKeyFrom($key);
    }
}
