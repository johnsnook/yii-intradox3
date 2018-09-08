<?php

/**
 * Description of LegacyImport
 *
 * @author John
 */
class LegacyImport {

    public static function LegacyAuthors() {
        $i = 0;
        $return = [];
        $sql = "SELECT * from il_author";
        $sql = urlencode($sql);
        $recordsJson = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");
        $records = json_decode($recordsJson);
        if (!is_array($records)) {
            return ['status' => 'fail', 'recordsJson' => $recordsJson];
        }
        foreach ($records as $record) {
            $model = new Author;
            $model->legacy_id = $record->id;
            $model->title = $record->author;
            $model->editor = $record->editor;
            $record->notes = $record->notes;

            if (!$model->save()) {
                $errs = [];
                foreach ($model->errors as $field => $error) {
                    $errs[] = ['field' => $field, 'error' => $error[0]];
                }
                $return[] = ['status' => 'fail', 'legacy_id' => $model->legacy_id, 'errors' => $errs];
            } else {
                $return[] = ['status' => 'success', 'legacy_id' => $model->legacy_id];
                $i++;
            }
        }
        return $return;
    }

    public static function LegacyCorporateAuthors() {
        $i = 0;
        $return = [];
        $sql = "SELECT * from il_corporate_author";
        $sql = urlencode($sql);
        $recordsJson = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");
        $records = json_decode($recordsJson);
        foreach ($records as $record) {
            $model = new CorporateAuthor;
            $model->legacy_id = $record->id;
            $model->title = $record->corporate_author;
            $model->division = $record->division;
            $record->notes = $record->notes;

            if (!$model->save()) {
                $errs = [];
                foreach ($model->errors as $field => $error) {
                    $errs[] = ['field' => $field, 'error' => $error[0]];
                }
                $return[] = ['status' => 'fail', 'legacy_id' => $model->legacy_id, 'errors' => $errs];
            } else {
                $return[] = ['status' => 'success', 'legacy_id' => $model->legacy_id];
                $i++;
            }
        }
        return $return;
    }

    public static function LegacySubjects() {
        $i = 0;
        $return = [];
        $sql = "SELECT * from il_subject";
        $sql = urlencode($sql);
        $recordsJson = file_get_contents("http://intradox.newfields.com/IntraDox/imports/lilly/db.js.php?SQL=$sql");
        $records = json_decode($recordsJson);
        foreach ($records as $record) {
            $model = new Subject;
            $model->legacy_id = $record->id;
            $model->title = $record->subject;
            $model->general_classification = $record->general_classification;

            if (!$model->save()) {
                $errs = [];
                foreach ($model->errors as $field => $error) {
                    $errs[] = ['field' => $field, 'error' => $error[0]];
                }
                $return[] = ['status' => 'fail', 'legacy_id' => $model->legacy_id, 'errors' => $errs];
            } else {
                $return[] = ['status' => 'success', 'legacy_id' => $model->legacy_id];
                $i++;
            }
        }
        return $return;
    }

}
