<?php

namespace Coderello\DynamicRenderer\Support;

class RenderingResult
{
    /**
     * @var string
     */
    private $content = '';

    /**
     * @var int
     */
    private $statusCode = 200;

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return RenderingResult
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return RenderingResult
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }
}
