<?php

    namespace Lacodda\StaffTools\User\AdminInterface;

    use Lacodda\BxModule\Helper\AdminListHelper;

    /**
     * ������ ��������� ���������, ��������� ������ ��������.
     *
     * {@inheritdoc}
     */
    class UserListHelper
        extends AdminListHelper
    {
        protected static $model = '\Lacodda\StaffTools\User\UserTable';
    }