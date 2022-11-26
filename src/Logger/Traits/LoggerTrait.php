<?php

namespace Jtrw\DevUtils\Logger\Traits;

use Jtrw\DevUtils\Logger\Exception\LoggerException;
use Psr\Log\LoggerInterface;
use Throwable;

trait LoggerTrait
{
    use ParentExceptionTrait;
    
    /**
     * Default exception message template.
     *
     * @var string
     */
    protected string $exceptionMessageTemplate = 'Uncaught PHP Exception %s: "%s" at %s line %s';
    
    /**
     * Logger service.
     *
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;
    
    /**
     * ExceptionListener constructor.
     *
     * @return $this
     *
     * @required
     */
    public function setLogger(LoggerInterface $logger): self
    {
        $this->logger = $logger;
        
        return $this;
    }
    
    /**
     * @param string $message
     * @param int $level
     * @param array $context
     * @return $this
     * @throws LoggerException
     */
    public function logMessage(string $message, int $level, array $context = []): self
    {
        switch ($level) {
            case LOG_DEBUG:
                $this->d($message, $context);
                break;
            
            case LOG_INFO:
                $this->i($message, $context);
                break;
            
            case LOG_NOTICE:
                $this->logger->notice($message, $context);
                break;
            
            case LOG_WARNING:
                $this->logger->warning($message, $context);
                break;
            
            default:
                throw new LoggerException(sprintf("Try to log invalid message level type '%s'", $level));
        }
        
        return $this;
    }
    
    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public function i(string $message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }
    
    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public function d(string $message, array $context = []): void
    {
        $this->logger->debug($message, $context);
    }
    
    /**
     * @param string $message
     * @param array $context
     * @return void
     */
    public function e(string $message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }
    
    /**
     * @param Throwable $exception
     * @param int $level
     * @param string $message
     * @return $this
     * @throws LoggerException
     */
    public function logException(Throwable $exception, int $level, string $message): self
    {
        $context = ['exception' => $exception];
        $this->parentException = $exception;
        $context = $this->getParentExceptionContext($context, ParentExceptionInterface::CONTEXT_SELIALIZE_PRINTR);
        
        switch ($level) {
            case LOG_EMERG:
                $this->logger->emergency($message, $context);
                break;
            
            case LOG_ALERT:
                $this->logger->alert($message, $context);
                break;
            
            case LOG_CRIT:
                $this->logger->critical($message, $context);
                break;
            
            case LOG_ERR:
                $this->e($message, $context);
                break;
            
            default:
                throw new LoggerException(sprintf("Try to log invalid error level type '%s'", $level));
        }
        
        return $this;
    }
}
