<?php

declare(strict_types=1);

namespace GatoGraphQL\TestingSchema\ModuleResolvers;

use GatoGraphQL\TestingSchema\GatoGraphQLExtension;
use GatoGraphQL\GatoGraphQL\ContentProcessors\MarkdownContentParserInterface;
use GatoGraphQL\GatoGraphQL\ModuleResolvers\AbstractModuleResolver;
use GatoGraphQL\GatoGraphQL\ModuleResolvers\SchemaTypeModuleResolverTrait;

class SchemaTypeModuleResolver extends AbstractModuleResolver
{
    use ModuleResolverTrait;
    use SchemaTypeModuleResolverTrait;

    public const SCHEMA_TESTING = GatoGraphQLExtension::NAMESPACE . '\schema-testing';

    /**
     * @var \GatoGraphQL\GatoGraphQL\ContentProcessors\MarkdownContentParserInterface|null
     */
    private $markdownContentParser;

    final protected function getMarkdownContentParser(): MarkdownContentParserInterface
    {
        if ($this->markdownContentParser === null) {
            /** @var MarkdownContentParserInterface */
            $markdownContentParser = $this->instanceManager->getInstance(MarkdownContentParserInterface::class);
            $this->markdownContentParser = $markdownContentParser;
        }
        return $this->markdownContentParser;
    }

    /**
     * @return string[]
     */
    public function getModulesToResolve(): array
    {
        return [
            self::SCHEMA_TESTING,
        ];
    }

    public function getName(string $module): string
    {
        switch ($module) {
            case self::SCHEMA_TESTING:
                return \__('Schema Testing', 'gatographql-testing-schema');
            default:
                return $module;
        }
    }

    public function getDescription(string $module): string
    {
        switch ($module) {
            case self::SCHEMA_TESTING:
                return \__('Addition of elements to the GraphQL schema to test the Gato GraphQL plugin', 'gatographql-testing-schema');
            default:
                return parent::getDescription($module);
        }
    }

    public function isHidden(string $module): bool
    {
        switch ($module) {
            case self::SCHEMA_TESTING:
                return true;
            default:
                return parent::isHidden($module);
        }
    }

    public function hasDocumentation(string $module): bool
    {
        switch ($module) {
            case self::SCHEMA_TESTING:
                return false;
            default:
                return parent::hasDocumentation($module);
        }
    }
}
