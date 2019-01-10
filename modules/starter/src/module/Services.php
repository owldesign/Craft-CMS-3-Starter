<?php

namespace modules\starter\module;


use modules\starter\services\StarterService;

trait Services
{
    // Public Methods
    // =========================================================================

    /**
     * Get starter
     *
     * @return StarterService
     */
    public function getReviews(): StarterService
    {
        return $this->get('starter');
    }

    // Private Methods
    // =========================================================================

    /**
     * Set components
     */
    private function _setPluginComponents()
    {
        $this->setComponents([
            'starter' => StarterService::class,
        ]);
    }
}