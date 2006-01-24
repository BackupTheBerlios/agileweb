<?php

/**
 *
 * only for php 5
 *
 */
class ExtensionFilter extends FilterIterator {
    
    private $ext;
    private $it;
    
    public function __construct(DirectoryIterator $it, $ext) { 
        parent::__construct($it);
        $this->it = $it;
        $this->ext = $ext;
    }
    
    public function accept() {
        if ( ! $this->it->isDir() ) {
            $ext = array_pop(explode('.', $this->current()));
            return $ext == $this->ext;
        }
        return false;
    }
}



?>