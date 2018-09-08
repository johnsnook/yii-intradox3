<?php

/* @var $this DocumentController */
/* @var $docsGridDP CActiveDataProvider */
Yii::import('ext.phpexcel.XPHPExcel');
$filename = 'id3-' . SnookTools::sanitize($this->Project->title) . '.xls';
#/*
// Redirect output to a clientâ€™s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.0
# */

$attrLabels = Document::model()->attributeLabels();

$data = [];
$data[] = [
    $attrLabels['id'],
    $attrLabels['title'],
    $attrLabels['project_id'],
    $attrLabels['file_extension'],
    $attrLabels['corporate_author'],
    $attrLabels['topic'],
    $attrLabels['type'],
    $attrLabels['catalog_number'],
    $attrLabels['page_count'],
    $attrLabels['bates_start'],
    $attrLabels['bates_end'],
    $attrLabels['original_date'],
    $attrLabels['notes'],
    $attrLabels['created_info'],
    $attrLabels['modified_info'],
    # $attrLabels['documents'],
];
$docs = $docsGridDP->getData();
foreach ($docs as $doc) {
    $data[] = [
        $doc->id,
        $doc->title,
        $doc->project_id,
        $doc->file_extension,
        $doc->corporate_author,
        $doc->topic,
        $doc->type,
        $doc->catalog_number,
        $doc->page_count,
        $doc->bates_start,
        $doc->bates_end,
        $doc->original_date,
        $doc->notes,
        $doc->created_info,
        $doc->modified_info,
        #[$doc->documents],
    ];
}

//echo '<pre>' . json_encode($data, JSON_PRETTY_PRINT) . '</pre>';

  $objPHPExcel = XPHPExcel::createPHPExcel();
  $objPHPExcel->getProperties()->setCreator($this->userData->title)
  ->setLastModifiedBy($this->userData->title)
  ->setTitle('Intradox 3 Export - Project:' . $this->Project->title)
  ->setSubject('Project:' . $this->Project->title);
  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $objPHPExcel->setActiveSheetIndex(0);
  $objPHPExcel->getActiveSheet()->fromArray($data, null, 'A1');
  // Rename worksheet
  $objPHPExcel->getActiveSheet()->setTitle($this->Project->title);
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
  $objWriter->save('php://output');

Yii::app()->end();
?>

