<?php


// Disallow direct access to this file for security reasons
if(!defined("IN_MYBB")) {
    die("Direct initialization of this file is not allowed.");
}

// link function to file hook // only uncomment if there is a function to link to
// $plugins->add_hook("hook", "function");

function warnings_info(){
    return array(
        "name"			=> "Verwarnsystem",
        "description"	=> "Dieses Plugin setzt die im Teammeeting besprochenen Vorgänge für Verwarnungen (\"Strikes\") im Storming Gates-Forum um.",
        "website"		=> "http://github.com/user/its-sparks-fly",
        "author"		=> "sparks fly",
        "authorsite"	=> "http://github.com/user/its-sparks-fly",
        "version"		=> "1.0",
        "compatibility" => "*"
    );
}

function warnings_install() {
    global $db;    
    if(!$db->table_exists('warnings')) {
        $db->query("CREATE TABLE `mybb_warnings` (
  				`wid` int(11) NOT NULL AUTO_INCREMENT,
  				`uid` int(11) NOT NULL,
  				`pid` int(11) NOT NULL,
  				`reason` text NOT NULL,
  				`timestamp` text NOT NULL,
  				`accepted` int(1) NOT NULL,
  				`tuid` int(11) NOT NULL,
  				PRIMARY KEY (`wid`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;");
    }
}

function warnings_is_installed() {
    global $db;   
    if($db->table_exists('warnings')) {
        return true;
    }
    return false;
}

function warnings_uninstall() {
    global $mybb, $db;        
    if($db->table_exists("warnings")) {
        $db->query("DROP TABLE `mybb_warnings`");
    }
}

function warnings_activate() {
    global $mybb, $templates;    
}

function warnings_deactivate() {
    global $mybb, $templates;    
}
