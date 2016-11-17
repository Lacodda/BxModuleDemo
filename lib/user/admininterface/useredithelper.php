<?php

    namespace Lacodda\StaffTools\User\AdminInterface;

    use Lacodda\BxModule\Helper\AdminEditHelper;

    /**
     * Хелпер описывает интерфейс, выводящий форму редактирования новости.
     *
     * {@inheritdoc}
     */
    class UserEditHelper
        extends AdminEditHelper
    {
        protected static $model = '\Lacodda\StaffTools\User\UserTable';
    }