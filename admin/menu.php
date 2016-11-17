<?php

    use Bitrix\Main\Loader;
    use Bitrix\Main\Localization\Loc;
    use Lacodda\StaffTools\User\AdminInterface\UserEditHelper;
    use Lacodda\StaffTools\User\AdminInterface\UserListHelper;

    if (!Loader::includeModule ('lacodda.stafftools'))
    {
        return;
    }

    Loc::loadMessages (__FILE__);

    return array (
        array (
            'parent_menu' => 'global_menu_services',
            'sort'        => 0,
            'icon'        => 'user_menu_icon',
            'page_icon'   => 'user_page_icon',
            'text'        => Loc::getMessage ('LCST_MODULE_NAME'),
            'title'       => Loc::getMessage ('LCST_MODULE_NAME'),
            'url'         => UserListHelper::getUrl (),
            'more_url'    => array (
                UserEditHelper::getUrl (),
            ),
            //            'items'       => array (
            //                array (
            //                    'text'     => getMessage ("LCST_RATES"),
            //                    'title'    => getMessage ("LCST_RATES"),
            //                    'url'      => $MODULE_ID . '_rates.php?lang=' . LANGUAGE_ID,
            //                    'more_url' => array ($MODULE_ID . '_rate_edit.php?lang=' . LANGUAGE_ID),
            //                ),
            //            ),
        ),
    );