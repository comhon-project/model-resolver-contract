<?php

namespace Comhon\ModelResolverContract;

/**
 * A basic contract that makes a bridge between application layer 
 * and any API by binding unique names and PHP classes.
 */
interface ModelResolverInterface
{
    /**
     * Bind a unique name to a class.
     */
    public function bind(string $uniqueName, string $class);

    /**
     * Get unique name according given class.
     */
    public function getUniqueName(string $class): ?string;

    /**
     * Get class according given unique name.
     */
    public function getClass(string $uniqueName): ?string;
}
