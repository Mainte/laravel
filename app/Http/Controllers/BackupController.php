<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

class BackupController extends Controller
{
    public function index(){

    	$backups=Storage::disk('backups')->allFiles();
    	rsort($backups);

    	$r['backups']=array();
    	foreach($backups as $kb => $b){
    		$r['backups'][$kb]['nome']=$b;
    		$r['backups'][$kb]['link']=Storage::disk('backups')->getDriver()->getAdapter()->applyPathPrefix($b);
    		$r['backups'][$kb]['size']=Storage::disk('backups')->size($b);
    		$r['backups'][$kb]['date']=gmdate('d/m/Y H:i:s', Storage::disk('backups')->lastModified($b)+3600);
    	}

    	return view('admin.backup.index', $r);
    }
}
