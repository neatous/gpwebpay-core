<?php declare(strict_types=1);

namespace Pixidos\GPWebPay\Param;

use Pixidos\GPWebPay\Enum\Param;
use Pixidos\GPWebPay\Exceptions\InvalidArgumentException;
use function Pixidos\GPWebPay\assertMaxLenght;
use function Pixidos\GPWebPay\assertUrl;

/**
 * Class ResponseUrl
 * @package Pixidos\GPWebPay\Param
 * @author Ondra Votava <ondra@votava.it>
 */
class ResponseUrl implements IParam
{

    /**
     * @var string
     */
    private $value;

    /**
     * ResponseUrl constructor.
     *
     * @param string $value
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getParamName(): string
    {
        return Param::RESPONSE_URL;
    }

    /**
     * @param string $value
     *
     * @throws InvalidArgumentException
     */
    protected function validate(string $value): void
    {
        assertMaxLenght($value, 300, 'URL');
        assertUrl($value);
    }

}
