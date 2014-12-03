<?php

namespace Sise\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SiseUserBundle extends Bundle
{

    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
