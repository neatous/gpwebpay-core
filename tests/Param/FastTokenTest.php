<?php declare(strict_types=1);

namespace Pixidos\GPWebPay\Tests\Param;

use PHPUnit\Framework\TestCase;
use Pixidos\GPWebPay\Enum\Param;
use Pixidos\GPWebPay\Exceptions\InvalidArgumentException;
use Pixidos\GPWebPay\Param\FastToken;
use Pixidos\GPWebPay\Tests\TestHelpers;

/**
 * Class FastTokenTest
 * @package Pixidos\GPWebPay\Tests\Param
 * @author Ondra Votava <ondra@votava.it>
 */
class FastTokenTest extends TestCase
{

    /**
     * @throws InvalidArgumentException
     */
    public function testCreate(): void
    {
        $token = new FastToken('token');

        self::assertSame('token', (string)$token);
        self::assertSame('token', $token->getValue());
        self::assertSame(Param::FAST_TOKEN, $token->getParamName());
    }


    /**
     * @throws InvalidArgumentException
     */
    public function testFailedCreateWithLongText(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('FASTTOKEN max. length is 64! "300" given.');

        new FastToken(TestHelpers::getLongText300());
    }
}
