<?php

function CreateTreeView($tablename, $primaryKeyField = 'id', $titleFieldName = 'title', $parentRelationFieldName = 'parent_id', $container='')
{
    //`id`, `parent_id`, `type`, `code_mid`, `code_masah`, `nom`, `abbreviation`, `observations`, `creation_date`, `code_localisation`
    // $tablename, $primaryKeyField = 'id', $titleFieldName = 'title', $parentRelationFieldName = 'parent_id'
    $queryArray = func_get_args();
    return $queryArray ;
}

function GenerateTreeList()
{

}
