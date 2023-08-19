<?php
/***************************************************
 * Hubspot File
 * Version 0.1
 * 16-02-2022
 ***************************************************/
namespace App\Library\Hubspot\Object;

use App\Library\Hubspot\Object\ObjectAbstract;
use Exception;
use Storage;

class File extends ObjectAbstract
{
    /***************************************************
     * Create contact
     */
    public function createFile($properties) {

        if(isset($properties['file'])) {
            $file = new \SplFileObject($properties['file']);
        }
        else if(isset($properties['raw'])) {
            $file = $properties['raw'];
        }

        $fileName = null;
        if($properties['fileName']) {
            $fileName = $properties['fileName'];
        }

        $this->response = $this->hubspot->files()->filesApi()->upload($file, null, $properties['path'], $fileName, null, json_encode([
            'access' => 'PRIVATE',
            'overwrite' => false,
            'duplicateValidationStrategy' => 'NONE',
            'duplicateValidationScope' => 'EXACT_FOLDER'
        ]) );

        $this->id = $this->response->getId();
    }
}
