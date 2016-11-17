<?php

    namespace Lacodda\BxModuleDemo\User\AdminInterface;

    use Lacodda\BxModule\Helper\AdminEditHelper;

    /**
     * Хелпер описывает интерфейс, выводящий форму редактирования новости.
     *
     * {@inheritdoc}
     */
    class UserEditHelper
        extends AdminEditHelper
    {
        protected static $model = '\Lacodda\BxModuleDemo\User\UserTable';
    }