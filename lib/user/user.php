<?php

    namespace Lacodda\StaffTools\User;

    use Bitrix\Main\Entity\DataManager;
    use Bitrix\Main\Localization\Loc;
    use Bitrix\Main\Type\DateTime;

    Loc::loadMessages (__FILE__);

    /**
     * ������ ��������.
     */
    class UserTable
        extends DataManager
    {
        /**
         * {@inheritdoc}
         */
        public static function getTableName ()
        {
            return 'lacodda_stafftools_user';
        }

        /**
         * {@inheritdoc}
         */
        public static function getMap ()
        {
            return array (
                'ID'             => array (
                    'data_type'    => 'integer',
                    'primary'      => true,
                    'autocomplete' => true,
                ),
                'DATE_CREATE'    => array (
                    'data_type'     => 'datetime',
                    'title'         => Loc::getMessage ('LCST_DATE_CREATE'),
                    'default_value' => new DateTime(),
                ),
                'CREATED_BY'     => array (
                    'data_type'     => 'integer',
                    'title'         => Loc::getMessage ('LCST_CREATED_BY'),
                    'default_value' => static::getUserId (),
                ),
                'MODIFIED_BY'    => array (
                    'data_type'     => 'integer',
                    'title'         => Loc::getMessage ('LCST_MODIFIED_BY'),
                    'default_value' => static::getUserId (),
                ),
                'TITLE'          => array (
                    'data_type' => 'string',
                    'title'     => Loc::getMessage ('LCST_TITLE'),
                ),
                'TEXT'           => array (
                    'data_type' => 'text',
                    'title'     => Loc::getMessage ('LCST_TEXT'),
                ),
                // ��� ���� �����, ������������ ���������, ����� ��������� � ������� ������� � ��������� _TEXT_TYPE.
                // � ��� ����� ��������� ���������� � ���� ������������ �������� (���� ��� ������� �����).
                'TEXT_TEXT_TYPE' => array (
                    'data_type' => 'string',
                ),
                'SOURCE'         => array (
                    'data_type' => 'string',
                    'title'     => Loc::getMessage ('LCST_SOURCE'),
                ),
                // ��������� ������ ���������� ������� (���� ��� ����� �������������, �� ������ ������� ���� ������).
                // � �������� ������� ����� �������� ������������� �����.
                'IMAGE'          => array (
                    'data_type' => 'integer',
                    'title'     => Loc::getMessage ('LCST_IMAGE'),
                ),
            );
        }

        /**
         * {@inheritdoc}
         */
        public static function update ($primary, array $data)
        {
            $data['MODIFIED_BY'] = static::getUserId ();

            return parent::update ($primary, $data);
        }

        /**
         * ���������� ������������� ������������.
         *
         * @return int|null
         */
        public static function getUserId ()
        {
            global $USER;

            return $USER->GetID ();
        }

        public static function getFilePath ()
        {
            return __FILE__;
        }
    }
