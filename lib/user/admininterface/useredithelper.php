<?php

    namespace Lacodda\StaffTools\User\AdminInterface;

    use Lacodda\BxModule\Helper\AdminEditHelper;

    /**
     * ������ ��������� ���������, ��������� ����� �������������� �������.
     *
     * {@inheritdoc}
     */
    class UserEditHelper
        extends AdminEditHelper
    {
        protected static $model = '\Lacodda\StaffTools\User\UserTable';
    }