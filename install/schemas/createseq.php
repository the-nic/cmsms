<?php

if (isset($CMS_INSTALL_CREATE_TABLES)) {
    $table_ids = array(
        'additional_users'          => array('id' => 'additional_users_id'),
        'admin_bookmarks'           => array('id' => 'bookmark_id'),
        'content'                   => array('id' => 'content_id'),
        'content_props'             => array('id' => 'content_id'),
        'events'                    => array('id' => 'event_id'),
        'event_handlers'            => array('id' => 'handler_id', 'seq' => 'event_handler_seq'),
        'group_perms'               => array('id' => 'group_perm_id'),
        'groups'                    => array('id' => 'group_id'),
        'users'                     => array('id' => 'user_id'),
        'userplugins'               => array('id' => 'userplugin_id')
    );

    foreach ($table_ids as $tablename => $tableinfo)
    {
        echo '<p>' . ilang('install_admin_db_create_seq', $tablename);
        $max = $db->Execute(
            'SELECT max(' . $tableinfo['id'] . ') AS maxid FROM '.$db_prefix.$tablename
        );
        $max = ($max && $row = $max->FetchRow()) ? $row['maxid']+1 : 1;
        $tableinfo['seq'] = isset($tableinfo['seq']) ? $tableinfo['seq'] : $tablename . '_seq';
        $db->CreateSequence($db_prefix.$tableinfo['seq'], $max);
        echo " [" . ilang('done') . "]</p>";
    }
}

# vim:ts=4 sw=4 noet
?>
