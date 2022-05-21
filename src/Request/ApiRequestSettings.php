<?php

namespace LisDev\Request;

final class ApiRequestSettings
{
    /**
     * @param string $apiUrl
     * @param string $key
     * @param string $language
     * @param bool $throwErrors
     * @param string $format
     * @param string $responseFormat
     * @param int $timeout
     */
    public function __construct(
        private string $apiUrl,
        private string $key,
        private string $language = 'ru',
        private bool $throwErrors = false,
        private string $format = 'json',
        private string $responseFormat = 'array',
        private int $timeout = 0
    ) {
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function getThrowErrors(): bool
    {
        return $this->throwErrors;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @return string
     */
    public function getResponseFormat(): string
    {
        return $this->responseFormat;
    }

    /**
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }
}
