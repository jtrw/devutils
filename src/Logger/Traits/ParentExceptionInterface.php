<?php

namespace Jtrw\DevUtils\Logger\Traits;

use Exception;

interface ParentExceptionInterface
{
    public const CONTEXT_SELIALIZE_NONE    = 'none';
    public const CONTEXT_SELIALIZE_BASIC   = 'serialize';
    public const CONTEXT_SELIALIZE_JSON    = 'json';
    public const CONTEXT_SELIALIZE_PRINTR  = 'printr';
    
    /**
     * Return parent exception
     *
     * @return Exception
     */
    public function getParentException(): Exception;
    
    /**
     * Return context exception array from parent exception object
     *
     * @param array $context
     * @param string $contextSerializeType
     *
     * @return array
     */
    public function getParentExceptionContext(array $context = [], string $contextSerializeType = ParentExceptionInterface::CONTEXT_SELIALIZE_NONE): array;
}