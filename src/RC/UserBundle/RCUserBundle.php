<?php

namespace RC\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RCUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
