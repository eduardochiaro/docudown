<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class File extends Model
{
    protected $_file = null;
    protected $_html = null;
    protected $_parse = null;

    public function prepareData(){

        $path = base_path();
        $this->_file = $path.'/documents/'.$this->folder.'/'.$this->reference.'.md';
        $file_content = file_get_contents($this->_file);

        $this->_parse = new Parsedown();

        $this->_html =  $this->_parse->text($file_content);
    }

    public function generateTree(){
      $dom = new \DOMDocument();
      $dom->LoadHTML($this->_html);
      $xpath = new \DOMXPath($dom);
      $nodelist = $xpath->query("//h2|//h3");
      $tree_markdown = [];
      foreach($nodelist as $node){
          $append = '* ';
          if($node->nodeName == 'h3'){
            $append = ' * ';
          }
          $tree_markdown[] = $append.$node->nodeValue; //gives you the text inside
      }

      return $this->_parse->text(implode("\n",$tree_markdown));
    }
    public function generateHTML(){
      return $this->_html;
    }
}
