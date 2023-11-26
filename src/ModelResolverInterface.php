<?php

namespace Comhon\ModelResolverContract;

/**
 * A basic contract that makes a bridge between application layer 
 * and any API by binding unique names and PHP classes.
 */
interface ModelResolverInterface
{
    /**
     * get model unique name according given class
     */
    public function getUniqueName(string $class): ?string;

    /**
     * get model class according unique name
     */
    public function getClass(string $uniqueName): ?string;

    /**
     * verify if model is allowed in given scope
     */
    public function isAllowed(string $uniqueName, string $scope): bool;

    /**
     * get all models unique names allowed in given scope
     */
    public function getUniqueNames(string $scope): array;

    /**
     * get all models classes allowed in given scope
     */
    public function getClasses(string $scope): array;
}
