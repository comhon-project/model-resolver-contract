<?php

namespace Comhon\ModelResolverContract\Tests\Resolver;

use Comhon\ModelResolverContract\ModelResolverInterface;

/**
 * A basic implementation of a model resolver
 */
class ModelResolver implements ModelResolverInterface
{
    CONST MAP = [
        'user' => '\MyApp\Models\User',
        'company' => '\MyApp\Models\Company',
        'invoice' => '\MyApp\Models\Invoice',
    ];
    CONST SCOPES = [
        'my-scope' => ['user', 'company']
    ];

    /**
     * get model unique name according given class
     */
    public function getUniqueName(string $class): ?string
    {
        return array_search($class, self::MAP) ?: null;
    }

    /**
     * get model class according unique name
     */
    public function getClass(string $uniqueName): ?string
    {
        return self::MAP[$uniqueName] ?? null;
    }

    /**
     * verify if model is allowed in given scope
     */
    public function isAllowed(string $uniqueName, string $scope): bool
    {
        return isset(self::SCOPES[$scope]) && in_array($uniqueName, self::SCOPES[$scope]);
    }

    /**
     * get all models unique names allowed in given scope
     */
    public function getUniqueNames(string $scope): array
    {
        return self::SCOPES[$scope] ?? [];
    }

    /**
     * get all models classes allowed in given scope
     */
    public function getClasses(string $scope): array
    {
        if (!isset(self::SCOPES[$scope])) {
            return [];
        }
        $classes = [];
        foreach (self::SCOPES[$scope] as $uniqueName) {
            $classes[] = $this->getClass($uniqueName);
        }
        return $classes;
    }
}
