<?php

    namespace Lacodda\StaffTools\User\AdminInterface;

    use Bitrix\Main\Localization\Loc;
    use Lacodda\BxModule\Helper\AdminInterface;
    use Lacodda\BxModule\Widget\DateTimeWidget;
    use Lacodda\BxModule\Widget\FileWidget;
    use Lacodda\BxModule\Widget\NumberWidget;
    use Lacodda\BxModule\Widget\StringWidget;
    use Lacodda\BxModule\Widget\UrlWidget;
    use Lacodda\BxModule\Widget\UserWidget;
    use Lacodda\BxModule\Widget\VisualEditorWidget;

    Loc::loadMessages (__FILE__);

    /**
     * Описание интерфейса (табок и полей) админки новостей.
     *
     * {@inheritdoc}
     */
    class UserAdminInterface
        extends AdminInterface
    {
        /**
         * {@inheritdoc}
         */
        public function fields ()
        {
            return array (
                'MAIN' => array (
                    'NAME'   => Loc::getMessage ('LCST_USER'),
                    'FIELDS' => array (
                        'ID'          => array (
                            'WIDGET'           => new NumberWidget(),
                            'READONLY'         => true,
                            'FILTER'           => true,
                            'HIDE_WHEN_CREATE' => true,
                        ),
                        'TITLE'       => array (
                            'WIDGET'   => new StringWidget(),
                            'SIZE'     => '80',
                            'FILTER'   => '%',
                            'REQUIRED' => true,
                        ),
                        'TEXT'        => array (
                            'WIDGET'   => new VisualEditorWidget(),
                            'HEADER'   => false,
                            'REQUIRED' => true,
                        ),
                        'SOURCE'      => array (
                            'WIDGET'            => new UrlWidget(),
                            'HEADER'            => false,
                            'PROTOCOL_REQUIRED' => true,
                        ),
                        'IMAGE'       => array (
                            'WIDGET' => new FileWidget(),
                            'IMAGE'  => true,
                            'HEADER' => false,
                        ),
                        'DATE_CREATE' => array (
                            'WIDGET'           => new DateTimeWidget(),
                            'READONLY'         => true,
                            'HIDE_WHEN_CREATE' => true,
                        ),
                        'CREATED_BY'  => array (
                            'WIDGET'           => new UserWidget(),
                            'READONLY'         => true,
                            'HIDE_WHEN_CREATE' => true,
                        ),
                        'MODIFIED_BY' => array (
                            'WIDGET'           => new UserWidget(),
                            'READONLY'         => true,
                            'HIDE_WHEN_CREATE' => true,
                        ),
                    ),
                ),
            );
        }

        /**
         * {@inheritdoc}
         */
        public function helpers ()
        {
            return array (
                '\Lacodda\StaffTools\User\AdminInterface\UserListHelper',
                '\Lacodda\StaffTools\User\AdminInterface\UserEditHelper',
            );
        }
    }