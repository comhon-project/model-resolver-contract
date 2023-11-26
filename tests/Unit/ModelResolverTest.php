<?php

namespace Comhon\ModelResolverContract\Tests\Unit;

use Comhon\ModelResolverContract\ModelResolverInterface;
use Comhon\ModelResolverContract\Tests\Resolver\ModelResolver;
use PHPUnit\Framework\TestCase;

class ModelResolverTest extends TestCase
{
    public function testModelResolver()
    {
        $resolver = new ModelResolver();
        $this->assertInstanceOf(ModelResolverInterface::class, $resolver);
        $this->assertEquals('\MyApp\Models\User', $resolver->getClass('user'));
        $this->assertEquals('invoice', $resolver->getUniqueName('\MyApp\Models\Invoice'));
        $this->assertNull($resolver->getClass('foo'));
        $this->assertNull($resolver->getUniqueName('bar'));
        $this->assertTrue($resolver->isAllowed('user', 'my-scope'));
        $this->assertFalse($resolver->isAllowed('invoice', 'my-scope'));
        $this->assertEquals(['user', 'company'], $resolver->getUniqueNames('my-scope'));
        $this->assertEquals([
            '\MyApp\Models\User',
            '\MyApp\Models\Company',
        ], $resolver->getClasses('my-scope'));
    }
}
