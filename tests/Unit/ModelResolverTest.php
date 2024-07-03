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
        $resolver->bind('user', '\MyApp\Models\User');
        $resolver->bind('company', '\MyApp\Models\Company');
        $resolver->bind('invoice', '\MyApp\Models\Invoice');

        $this->assertInstanceOf(ModelResolverInterface::class, $resolver);
        $this->assertEquals('\MyApp\Models\User', $resolver->getClass('user'));
        $this->assertEquals('invoice', $resolver->getUniqueName('\MyApp\Models\Invoice'));
        $this->assertNull($resolver->getClass('foo'));
        $this->assertNull($resolver->getUniqueName('bar'));
    }
}
