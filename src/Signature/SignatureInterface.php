<?php declare(strict_types=1);

namespace kornrunner\Signature;

use ricco381\Ecc\Crypto\Signature\SignatureInterface as EccSignatureInterface;

interface SignatureInterface extends EccSignatureInterface {
    public function getRecoveryParam(): int;
}
