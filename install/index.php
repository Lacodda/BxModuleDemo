<?php

    use Bitrix\Main\Application;
    use Bitrix\Main\ModuleManager;
    use Bitrix\Main\Localization\Loc;
    use Bitrix\Main\Loader;
    use Lacodda\StaffTools\User\UserTable;

    IncludeModuleLangFile (__FILE__);

    class lacodda_stafftools
        extends CModule
    {
        var $MODULE_ID = 'lacodda.stafftools';

        function __construct ()
        {
            $arModuleVersion = array ();

            include (__DIR__ . '/version.php');

            if (is_array ($arModuleVersion) && array_key_exists ('VERSION', $arModuleVersion))
            {
                $this->MODULE_VERSION = $arModuleVersion['VERSION'];
                $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
            }

            $this->MODULE_NAME = Loc::getMessage ('LCST_NAME');
            $this->MODULE_DESCRIPTION = Loc::getMessage ('LCST_DESCRIPTION');
            $this->PARTNER_NAME = Loc::getMessage ('LCST_PARTNER_NAME');
            $this->PARTNER_URI = 'http://lacodda.com';
        }

        public function DoInstall ()
        {
            ModuleManager::registerModule ($this->MODULE_ID);

            $this->installDB ();
        }

        public function installDB ()
        {
            if (Loader::includeModule ($this->MODULE_ID))
            {
                UserTable::getEntity ()->createDbTable ();
                //                COption::SetOptionString ($this->MODULE_ID, 'CUR_FILE_LOG', Helper::getVariable ('curFileLog'));
            }
        }

        public function DoUninstall ()
        {
            $this->uninstallDB ();

            ModuleManager::unRegisterModule ($this->MODULE_ID);
        }

        public function uninstallDB ()
        {
            if (Loader::includeModule ($this->MODULE_ID))
            {
                //                $this->GetConnection ()->dropTable (UserTable::getTableName ());
                //                COption::RemoveOption ($this->MODULE_ID);
            }
        }

        protected function GetConnection ()
        {
            return Application::getInstance ()->getConnection ();
        }
    }