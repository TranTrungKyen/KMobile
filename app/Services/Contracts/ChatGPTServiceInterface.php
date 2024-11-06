<?php

namespace App\Services\Contracts;

/**
 * Interface ChatGPTServiceInterface.
 *
 * @package namespace App\Services\Contracts;
 */
interface ChatGPTServiceInterface
{
    public function getResponse($prompt);
}
