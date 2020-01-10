<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

if(CModule::IncludeModule("iblock"))
{

$IBLOCK_ID = 13;        //здесь необходимо указать ID Вашего инфоблока
$arOrder = Array("SORT"=>"ASC");   
$arSelect = Array("ID", "NAME", "IBLOCK_ID", "DETAIL_PAGE_URL");
$arFilter = Array("IBLOCK_ID"=>$IBLOCK_ID, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement())
    {
    $arFields = $ob->GetFields();  
    //print_r($arFields);          
    $aMenuLinksExt[] = Array(
                $arFields['NAME'],
                $arFields['DETAIL_PAGE_URL']="/news/news_on_main/?ELEMENT_ID=$arFields[ID]",
                Array(),
                Array(),
                ""
                );
    
    }       
    
}   

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
?>