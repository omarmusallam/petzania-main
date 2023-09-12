<?php

namespace Modules\Petcare\Interfaces;

interface SettingRepositoryInterface
{

    public function getSettings();

    public function updateSettings(array $data);
}
