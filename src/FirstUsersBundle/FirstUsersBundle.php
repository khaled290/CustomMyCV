<?php

namespace FirstUsersBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FirstUsersBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
